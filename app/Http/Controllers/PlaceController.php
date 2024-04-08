<?php

namespace App\Http\Controllers;

use App\Mail\EmailInvoiceNotification;
use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use OpenSpout\Reader\SheetWithVisibilityInterface;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;
use Tests\Feature\CreateApiTokenTest;

class PlaceController extends Controller
{

    private $valid_date_flag = true;
    private $total_reservation_days;
    private $total_price_with_nights;
    private $total_reservation_cost;
    private $Airbnb_Fee = 33;
    public function index()
    {
        return view('website.setup-place');
    }

    public function show($place_slug)
    {
        $single_place = Place::with(['user','category' , 'amenity'])
        ->where('slug', $place_slug)
        ->first();
        $this->ConvertMultiplePlaceImages($single_place);
        // dd($single_place->toArray());
        // $single_place->images = collect($single_place->images);
        
        
        return view('website.house-details')->with('single_place' , $single_place);
    }



    public function showBookings()
    {
        if (Session::has('booking_place')) {
            $place = Session::get('booking_place'); 
            $place['start_date']= Carbon::parse($place['start_date'])->format('M d');
            $place['end_date']= Carbon::parse($place['end_date'])->format('M d');


            if (is_array($place['single_place']['images'])) {
            }else{
                $place['single_place']['images'] = explode(',' , $place['single_place']['images']);
            }
            $this->CalculationsForReservation($place);
            return view('website.booking-page')
            ->with(['place' => $place ,
                    'TotalReservationDays' => $this->total_reservation_days ,
                    'TotalPriceWithNights' => $this->total_price_with_nights,
                    'TotalReservationCost' => $this->total_reservation_cost
            ]); 
        }else{
            return redirect('/homepage');
        }
    }


    // payemnt with stripe api
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string',
            'card_number' => 'required|numeric|min:16',
            'expiry_date_month' => 'required|string|min:1|max:12',
            'expiry_date_year' => 'required|string|',
            'cvv' => 'required|numeric|min:3',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required',
        ]);

        if (Session::has('booking_place') && $validate){
            $place_info = Session::get('booking_place'); 
            $this->CalculationsForReservation($place_info);
            $all_reservations = Reservation::select(['place_id' , 'reservation_start_date' , 'reservation_end_date'])
            ->where('place_id' , $place_info['single_place']['id'])
            ->get();

            if (sizeof($all_reservations) === 0) {
            }else{
                foreach ($all_reservations as $reservations) {
                    if ($this->CheckForValidDates($place_info , $reservations)) {
                        // dd('flag will be false ');
                        $this->valid_date_flag = false;
                    }else{
                        // dd('flag will be true ');
                       $this->valid_date_flag = true;
                    }
                }
            }
            
            if ($this->valid_date_flag) {
                Stripe::setApiKey(config('services.stripe.secret'));
                $stripe_published = new StripeClient(config('services.stripe.published'));
                $stripe_secret = new StripeClient(config('services.stripe.secret'));
    
               try {
                $stripe_token = $stripe_published->tokens->create([
                    'card' => [
                        'number' => $request['card_number'],
                        'cvc' => $request['cvv'],
                        'exp_month' => $request['expiry_date_month'],
                        'exp_year' => $request['expiry_date_year'],
                    ]
                ]);

                
                if (isset($stripe_token)) {
                     $card_customer_id = $stripe_secret->customers->create([
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'address' => [
                            'line1' => $request['street'],
                            'postal_code' => $request['zip_code'],
                            'city' => $request['city'],
                            'state' => $request['state'],
                        ],
                        'source'=> $stripe_token,
                        ]);
    
                     $charge_payment = Charge::create([
                        'customer' => $card_customer_id,
                        'amount' => $this->total_reservation_cost*100,
                        'currency'=>"usd",
                        'description' =>'Test payment from muhammed essa',
                    ]);

                    
                if ($charge_payment){
                    $create_reservation = Reservation::create([
                        'user_id' => Auth::user()->id,
                        'place_id' => $place_info['single_place']['id'],
                        'reservation_start_date' => $place_info['start_date'],
                        'reservation_end_date' => $place_info['end_date'],
                        'total_guests' => $place_info['total_guests'],
                        'total_infants' => $place_info['total_infants'],
                        'total_price' => $this->total_reservation_cost,
                    ]);

                    Mail::to(Auth::user()->email)
                  ->queue(new EmailInvoiceNotification($place_info , $this->total_reservation_cost , Auth::user()->name));
                }else{
                    session()->flash('payment_decliend , please try again later or contact your local BANK');
                    return redirect()->back();
                }
                
                }else{
                    session()->flash('token_invalid ,token invalid, something went wrong');
                    return redirect()->back();
                }
               } catch (\Throwable $th) {
                    session()->flash('payment_failer' , 'Payment decliend , please try again later , if this is happing to use multiple times please contact the Support team ');
                    return redirect()->back();
                    // dd('Payment decliend , please try again later , if this is happing to use multiple times please contact the Support team ');
               }
            }else{
                session()->flash('fail' , 'These specific dates have already been reserved.');
                return redirect()->back();
            }

            // setup payment before creating a reservation record in the database.
            //  $stripe = new StripeClient(config('services.stripe.secret'));
           
        }else{
            return view('website.homepage');
        }
        // dd($reservation);
    }


    // payemnt with laravel cashier and stripe
    // public function store(Request $request)
    // {

    //     $validate = $request->validate([
    //         'name' => 'required|string',
    //         'card_number' => 'required|numeric|min:16',
    //         'expiry_date_month' => 'required|string',
    //         'expiry_date_year' => 'required|string',
    //         'cvv' => 'required|numeric|min:3',
    //         'street' => 'required|string',
    //         'city' => 'required|string',
    //         'state' => 'required|string',
    //         'zip_code' => 'required',
    //     ]);

    //     if (Session::has('booking_place') && $validate){
    //         $place_info = Session::get('booking_place'); 
    //         $this->CalculationsForReservation($place_info);

    //         // setup payment before creating a reservation record in the database.
    //          Stripe::setApiKey(config('services.stripe.secret'));
    //             $stripe = new StripeClient(config('services.stripe.secret'));
    //             // $stripe->paymentIntents->create([
    //             //     'amount' => 330,
    //             //     'currency' => 'usd',
    //             //     'description' => 'test11',
    //             //     'payment_method' => 'pm_card_visa',
    //             // ]);

    //             Charge::create([
    //                 'amount' => $this->total_reservation_cost*100,
    //                 'currency'=>"usd",
    //                 'source'=> $request->stripeToken,
    //                 'description' =>'Test payment from muhammed essa',
    //                 'metadata' => [
    //                     'name' => Auth::user()->name,
    //                     'email' => Auth::user()->email,
    //                 ]
    //             ]);
            


    //         // $reservation = Reservation::create([
    //         //     'user_id' => Auth::user()->id,
    //         //     'place_id' => $place_info['single_place']['id'],
    //         //     'reservation_start_date' => $place_info['start_date'],
    //         //     'reservation_end_date' => $place_info['end_date'],
    //         //     'total_guests' => $place_info['total_guests'],
    //         //     'total_infants' => $place_info['total_infants'],
    //         //     'total_price' => $this->total_reservation_cost,
    //         // ]);


    //     }else{
    //         return view('website.homepage');
    //     }
    //     // dd($reservation);
    // }
  



     // Converting array of images into url
     public function ConvertMultiplePlaceImages($places)
     {
             $places->images = explode(',' , $places->images);
             $images_array  =[];
             foreach ($places->images as $image) {
                 $images_array [] = Storage::disk('public')->url($image);
                 $places->images = $images_array;
             }
     }

     public function CalculationsForReservation($place)
     {
        $this->total_reservation_days = Carbon::parse(strtotime($place['start_date']))->diffInDays(Carbon::parse(strtotime($place['end_date'])));
        $this->total_price_with_nights = ($this->total_reservation_days * $place['single_place']['price_per_night']);
        $this->total_reservation_cost = $this->total_price_with_nights + $this->Airbnb_Fee;
     }

     public function CheckForValidDates($place , $reservations)
     {
        if ($reservations->reservation_start_date === $place['start_date'] && $reservations->reservation_end_date === $place['end_date']) {
            return true;
        }else{
            return false;
        }
     }
}
