<?php

namespace App\Livewire;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use App\Traits\TaxRate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
class SetupPlaceLivewire extends Component
{
    use WithFileUploads;
    use TaxRate;
    public $FullSteps = 13;
    public $CurrentStepValue = 1;
    public $ProgressBarValue_Steps_1 = 0;
    public $ProgressBarValue_Steps_2 = 0;
    public $ProgressBarValue_Steps_3 = 0;
    



    private $max_guests=2;
    private $max_bedrooms=2;
    private $max_beds=2;
    private $max_bathroom=2;
    private $max_placeTitle = 32;
    private $max_placeDescription = 500;
    private $max_price = 30000;
    public $total_guest_number = 1;
    public $category_selected ='1';
    public $total_bedrooms_number = 0;
    public $total_beds_number = 0;
    public $total_bathroom_number = 0;
    public $amenity_type =[];
    public $place_images = []; 
    public $images_array_holder = []; 
    #[Validate] 
    public $place_title;
    #[Validate] 
    public $place_description = "You'll always remember your time at this unique place to stay";
    #[Validate] 
    public $place_price = 23;
    private $max_rate;

    protected function rules()
    {
        return [
            'total_guest_number' => ['numeric','min:0' ,'max:' . $this->max_guests],
            'total_bedrooms_number' => ['numeric' , 'min:0' ,'max:' . $this->max_bedrooms],
            'total_beds_number' => ['numeric' , 'min:0','max:' . $this->max_beds],
            'total_bathroom_number' => [ 'numeric' , 'min:0', 'max:' . $this->max_bathroom],
            'place_title' => ['required' , 'string' , 'min:8' , 'max:' . $this->max_placeTitle],
            'place_description' => ['required' , 'string' , 'min:8' , 'max:' . $this->max_placeDescription],
            'place_price' => ['required' , 'numeric' , 'min:23' , 'max:' . $this->max_price],
            'images_array_holder' => ['required'],
            'category_selected' =>['required' , 'string']
        ];

    }
    
    public function mount()
    {
        $this->CurrentStepValue = 1;
        $this->ProgressBarValue_Steps_1 = 0;
        $this->ProgressBarValue_Steps_2 = 0;
        $this->ProgressBarValue_Steps_3 = 0;
    }
    public function NextStep()
    {
        // make sure that the gived category is valid and at not null
        // then we can go to the next step 
        $is_valid_category = Category::where('id' ,$this->category_selected)->first();
        if($this->CurrentStepValue == 3 ){
            if($this->validateOnly('category_selected') && $is_valid_category){
                $this->CurrentStepValue++;
            }
        }elseif($this->CurrentStepValue == 7){
            if ($this->validateOnly('images_array_holder')){
                $this->CurrentStepValue++;    
            }
        }else{
            $this->CurrentStepValue++;
        }

        // is it was the last step
        if($this->CurrentStepValue > $this->FullSteps){
            $this->CurrentStepValue = $this->FullSteps;
        }

        
        // Change progress bar depending on the steps value 
        switch ($this->CurrentStepValue) {
            case '2':
                $this->ProgressBarValue_Steps_1 = 25;
                break;
                case '3':
                    $this->ProgressBarValue_Steps_1 = 50;
                    break;
                case '4':
                    $this->ProgressBarValue_Steps_1 = 75;
                    break;
                    case '5':
                        $this->ProgressBarValue_Steps_1 = 100;
                        break;
                        case '6':
                            $this->ProgressBarValue_Steps_2 = 25;
                            break;
                            case '7':
                                $this->ProgressBarValue_Steps_2 = 50;
                                break;
                                case '8':
                                    $this->ProgressBarValue_Steps_2 = 75;
                                    break;
                                    case '9':
                                        $this->ProgressBarValue_Steps_2 = 100;
                                        break;  
                                        case '10':
                                            $this->ProgressBarValue_Steps_3 = 25;
                                            break;   
                                            case '11':
                                                $this->ProgressBarValue_Steps_3 = 50;
                                                break;   
                                                case '12':
                                                    $this->ProgressBarValue_Steps_3 = 75;
                                                    break;   
                                                    case '13':
                                                        $this->ProgressBarValue_Steps_3 = 100;
                                                        break;  
            default:
            $this->ProgressBarValue_Steps_1 = 0;
            $this->ProgressBarValue_Steps_2 = 0;
            $this->ProgressBarValue_Steps_3 = 0;
                break;
        }
    }
    public function PrevStep()
    {
        // dump($this->CurrentStepValue);
        $this->CurrentStepValue--;
        if($this->CurrentStepValue > $this->FullSteps){
            $this->CurrentStepValue = 1;
        }

        switch ($this->CurrentStepValue) {
                case '2':
                    $this->ProgressBarValue_Steps_1 = 25;
                    break;
                case '3':
                    $this->ProgressBarValue_Steps_1 = 50;
                    break;
                    case '4':
                        $this->ProgressBarValue_Steps_1 = 75;
                        break;
                        case '5':
                            $this->ProgressBarValue_Steps_2 = 0;
                            break;
                            case '6':
                                $this->ProgressBarValue_Steps_2 = 25;
                                break;
                                case '7':
                                    $this->ProgressBarValue_Steps_2 = 50;
                                    break;
                                    case '8':
                                        $this->ProgressBarValue_Steps_2 = 75;
                                        break;  
                                        case '9':
                                            $this->ProgressBarValue_Steps_3 = 0;
                                            break;  
                                        case '10':
                                            $this->ProgressBarValue_Steps_3 = 25;
                                            break;   
                                            case '11':
                                                $this->ProgressBarValue_Steps_3 = 50;
                                                break;   
                                                case '12':
                                                    $this->ProgressBarValue_Steps_3 = 75;
                                                    break;   
                                                    case '13':
                                                        $this->ProgressBarValue_Steps_3 = 100;
                                                        break;  
            default:
            $this->ProgressBarValue_Steps_1 = 0;
            $this->ProgressBarValue_Steps_2 = 0;
            $this->ProgressBarValue_Steps_3 = 0;
                break;
        }
    }

    public function incrementingSystem($typeOfIncrement)
    {
        if($typeOfIncrement == 'guests'){
            if($this->validateOnly('total_guest_number')){
                $this->total_guest_number++;
            }
        }elseif ($typeOfIncrement =='beds') {
            if($this->validateOnly('total_beds_number')){
                $this->total_beds_number++;
            }
        }
        elseif ($typeOfIncrement =='bedrooms') {
            if($this->validateOnly('total_bedrooms_number')){
                $this->total_bedrooms_number++;
            }
        }
        elseif ($typeOfIncrement =='bathrooms') {
            if($this->validateOnly('total_bathroom_number')){
                $this->total_bathroom_number++;
            }
        }
    }
    public function decrementingSystem($typeOfIncrement)
    {
        if($typeOfIncrement == 'guests'){
            if($this->validateOnly('total_guest_number')){
                $this->total_guest_number--;
            }
        }elseif ($typeOfIncrement =='beds') {
            if($this->validateOnly('total_beds_number')){
                $this->total_beds_number--;
            }
        }
        elseif ($typeOfIncrement =='bedrooms') {
            if($this->validateOnly('total_bedrooms_number')){
                $this->total_bedrooms_number--;
            }
        }
        elseif ($typeOfIncrement =='bathrooms') {
            if($this->validateOnly('total_bathroom_number')){
                $this->total_bathroom_number--;
            }
        }
    }


    #[Computed]
    public function Categories()
    {
        return Category::get();
    }

    #[Computed]
    public function Amenities()
    {
        return Amenity::get();
    }

    #[Computed]
    public function create_place()
    {

        $this->validate();

        if(is_array($this->images_array_holder)){
            foreach($this->images_array_holder as $images){
                $images_array []= $images->store('place_iamges/images' , 'public'); 
            }
        }
        
        if (Auth::user()) {
            $place = Place::create([
                'title' => $this->place_title,
                'description' => $this->place_description,
                'slug' => Str::slug($this->place_title),
                'images' => implode(',' , $images_array), 
                'price_per_night' => $this->place_price, 
                'category_id' => $this->category_selected, 
                'user_id' => Auth::user()->id,
                'guests_number' => $this->total_guest_number,
                'bedrooms_number' => $this->total_bedrooms_number,
                'beds_number' => $this->total_beds_number,
                'bathrooms_number' => $this->total_bathroom_number, 
            ]);


            if($place){
                foreach($this->amenity_type as $amenity){
                    $place->amenity()->attach($amenity); 
                }
                $this->CurrentStepValue++;
            }
        }
    }

    public function RemoveImageHolderIndex($image_index)
    {
        if(is_numeric($image_index)){
            $iterator = 0;
            foreach ($this->images_array_holder as $image_holder_index_place){
                if($iterator == $image_index){
                    unset($this->images_array_holder[$image_index]);
                }
                $iterator++;
            }
        }
    }

    public function render()
    {  
        if(empty($this->place_images)){
            
        }else{
            // if(!in_array($this->place_images , $this->images_array_holder)){
            //     // $this->images_array_holder[]= array_merge($this->place_images);      
            // }
            foreach($this->place_images as $image){
                $this->images_array_holder [] = $image;
            }   
            $this->place_images = [];

        }

        $this->max_rate += $this->guestTaxRatePrice($this->place_price);
        return view('livewire.setup-place-livewire');
    }
}
