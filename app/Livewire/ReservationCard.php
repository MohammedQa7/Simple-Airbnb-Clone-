<?php

namespace App\Livewire;

use App\Models\Place;
use App\Models\Reservation;
use App\Rules\DateReservationChecker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ReservationCard extends Component
{

    private $total_price_with_nights;
    private $total_reservation_days;
    private $Airbnb_Fee = 33;
    private $total_reservation_cost;
    private $max_infants = 3;
    public Place $single_place;
    #[Validate]
    public $Start_date;
    #[Validate]
    public $End_date;
    public $total_guests = 0;
    public $NumberOfAdults = 1;
    public $NumberOfChildrens = 0;
    public $NumberOfInfants = 0;


    protected function rules()
    {
        return [
            'NumberOfAdults' => ['numeric','min:0' ,'max:' .$this->single_place->guests_number],
            'NumberOfChildrens' => ['numeric' , 'min:0' ,'max:' .$this->single_place->guests_number],
            'NumberOfInfants' => ['numeric' ,'min:0' , 'max:' . $this->max_infants],
            'total_guests' => ['numeric' ,'min:0' , 'max:' . $this->single_place->guests_number],
            'Start_date' => ['required' , 'date', 
            function($attribute , $value , $fail) 
            {
                $validate_date = Reservation::where('place_id' , $this->single_place->id)->where('reservation_start_date', '<=' , $value)
                ->where('reservation_end_date', '>=' , $value)
                ->count() == 0;
                if($validate_date){
                    // $fail('good');
                }else{
                    $fail('Check in date is already reserved');
                }

                $this->CheckStartDateBeweenTwoDates($fail);
            }
        ],
            'End_date' => ['required' , 'date', 
            function($attribute , $value , $fail) 
            {
                // Validate the date within two dates
                $validate_date = Reservation::where('place_id' , $this->single_place->id)->where('reservation_start_date', '<=' , $value)
                ->where('reservation_end_date', '>=' , $value)
                ->count() == 0;
                if($validate_date){
                    // $fail('good');
                }else{
                    $fail('Check out date is already reserved');
                }

               $this->CheckStartDateBeweenTwoDates($fail);
            }
        ],
        ];

    }

    public function mount()
    {
        $this->Start_date = Carbon::now()->format('Y/m/d');
    }

   
    public function updated()
    {
        if ($this->Start_date == null || $this->End_date == null) {
        }else{
            $this->total_reservation_days = Carbon::parse(strtotime($this->Start_date))->diffInDays(Carbon::parse(strtotime($this->End_date)));
            $this->total_price_with_nights = $this->total_reservation_days * $this->single_place->price_per_night;
            $this->total_reservation_cost = $this->total_price_with_nights + $this->Airbnb_Fee;
        }  
    }

    public function incrementingSystem($typeOfIncrement)
    {
            if($typeOfIncrement == 'adult'){
                if($this->validateOnly('NumberOfAdults')){
                    $this->NumberOfAdults++;
                }
                   
            }elseif ($typeOfIncrement =='childrens') {
                if($this->validateOnly('NumberOfChildrens')){
                    $this->NumberOfChildrens++;
                }
            }
            elseif ($typeOfIncrement =='infants') {
                if($this->validateOnly('NumberOfInfants')){
                    $this->NumberOfInfants++;
                }
            }
    }
    public function decrementingSystem($typeOfIncrement)
    {
        if($typeOfIncrement == 'adult'){
            if($this->validateOnly('NumberOfAdults')){
                $this->NumberOfAdults--;
            }
               
        }elseif ($typeOfIncrement =='childrens') {
            if($this->validateOnly('NumberOfChildrens')&& $this->NumberOfChildrens != 0){
                $this->NumberOfChildrens--;
            }
        }
        elseif ($typeOfIncrement =='infants') {
                if ($this->validateOnly('NumberOfInfants') && $this->NumberOfInfants != 0) {
                    $this->NumberOfInfants--;
                }
        }
    }

    public function CheckForTotalNumberOfGuests()
    {
  // Check for number of guests is it was the same as the total guests in the Place table
        $this->total_guests = $this->NumberOfAdults + $this->NumberOfChildrens;
        if ($this->NumberOfAdults == $this->single_place->guests_number || $this->NumberOfChildrens == $this->single_place->guests_number ||  $this->total_guests== $this->single_place->guests_number) {
            return true;
        }else{
            return false;
        }
    }


    public function Reserve()
    {
       if ($this->validate()) {
            if (Session::has('booking_place')) {
                Session::forget('booking_place');
                session()->put( 'booking_place',
                ['single_place' => $this->single_place ,
                    'total_guests' => $this->total_guests ,
                    'total_infants' => $this->NumberOfInfants ,
                    'start_date' => $this->Start_date ,
                    'end_date' => $this->End_date ,
                    'current_user' => ['user_id' => Auth::user()->id , 'user_email' => Auth::user()->email]]);
                return redirect( 'book/stays');
            }else{
                session()->put( 'booking_place',
                ['single_place' => $this->single_place ,
                    'total_guests' => $this->total_guests ,
                    'total_infants' => $this->NumberOfInfants ,
                    'start_date' => $this->Start_date ,
                    'end_date' => $this->End_date ,
                    'current_user' => ['user_id' => Auth::user()->id , 'user_email' => Auth::user()->email]]);
                return redirect( 'book/stays');
            }
       }
    }

    public function CheckStartDateBeweenTwoDates($fail)
    {
        $reservation = Reservation::where('place_id' , $this->single_place->id)->get();
        foreach ($reservation as $reservation) {
            $start_reservation_date = Carbon::parse($reservation->reservation_start_date);
            $ConvertStartDate = Carbon::parse($this->Start_date);
            $ConvertEndDate = Carbon::parse($this->End_date);
            if ($start_reservation_date->between($ConvertStartDate , $ConvertEndDate)) {
                $fail('Sorry, there are days between your dates that have already been reserved.');
                
            }

        }
    }

    public function render()
    {
      
        return view('livewire.reservation-card');
    }
}
