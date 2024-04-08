<?php

namespace App\Livewire;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Color\Validate;

class PlaceList extends Component
{
    use WithPagination;

    public $show_per_page = 3;
    private $max_price = 3000;
    private $min_price = 1000;

    private $user_info;

    #[Url]
    public $selected_category='';

    #[Rule('numeric|min:23|max:3000')]
    #[Url]
    public $filter_by_max_price = 700;
    #[Rule('numeric|min:23|max:1000')]
    #[Url]
    public $filter_by_min_price = 23;
    #[Url]
    #[Rule('numeric|min:0|max:8')]
    public $filter_by_bedrooms ='';
    #[Url]
    #[Rule('numeric|min:0|max:8')]
    public $filter_by_beds ='';
    #[Url]
    #[Rule('numeric|min:0|max:8')]
    public $filter_by_bathrooms ='';
    #[Url]
    public $filter_by_amenity =[];

    public function mount()
    {
        $this->show_per_page = 3;
    }

    // Get all The places that has been posted by users
    #[Computed]
    public function Places()
    {
        $this->validate();
        $places = Place::with('user' , 'category')
        ->FilterByBedrooms($this->filter_by_bedrooms)
        ->when($this->GetActiveAmenity() , function($query){
            $query->FilterByAmenity($this->filter_by_amenity);
        })
        ->when($this->CheckIfPriceEmpty() , function($query){
            $query->FilterByPrice($this->filter_by_min_price , $this->filter_by_max_price);
        })
        ->when($this->getActiveCategory() , function($query){
            $query->FilterByCategory($this->selected_category);
        })
        
        ->paginate($this->show_per_page);
        // ->get();
        $this->ConvertMultiplePlaceImages($places);
        // dd($places->toArray());
        return $places;
    }


    #[Computed]
    public function Amenities()
    {
        $amenity = Amenity::get();
        return $amenity;
    }



    public function ShowMore()
    {
        $this->show_per_page = $this->show_per_page + 3;
    }
    public function placeholder()
    {
        return view('livewire.ListPlaceholder');
    }

    // check if the selected category is in the category table
    public function getActiveCategory()
    {
        if ($this->selected_category == '' || $this->selected_category == null) {

        }else{
            return Category::where('slug' , $this->selected_category);  
        }
    }

    public function GetActiveAmenity()
    {
        if ($this->filter_by_amenity == '' || $this->filter_by_amenity == null) {

        }else{
            foreach ($this->filter_by_amenity as $single_amenity) {
                $amenity = Amenity::where('title' , $single_amenity);
                return $amenity;
            }
        }
        
    }


    // For User Card Information
    #[Computed]
    public function GetUserInfo($user_id)
    {
        $this->user_info = User::with('place' , 'place.category')
        ->find($user_id);
       
        $this->ConvertSinglePlaceImage($this->user_info->place);
        // dd($this->user_info->toArray());

        if ($this->user_info) {
            $this->dispatch('open-modal' , name:'user-details');
        }
    }


    // Converting single image into url
    public function ConvertSinglePlaceImage($user_info_place)
    {
        foreach($user_info_place as $single_place){
            $single_place->images = explode(',' , $single_place->images);
            foreach ($single_place->images as $image) {
             $images_array  = Storage::disk('public')->url($image);
                 $single_place->images = $images_array;
            }
        }
    }
    // Converting array of images into url
    public function ConvertMultiplePlaceImages($places)
    {
        foreach($places as $single_place){
            $single_place->images = explode(',' , $single_place->images);
            $images_array  =[];
            foreach ($single_place->images as $image) {
                $images_array [] = Storage::disk('public')->url($image);
                $single_place->images = $images_array;
            }
        }
    }

    public function CheckIfPriceEmpty()
    {
        $this->validate();
        if($this->filter_by_min_price == '' || $this->filter_by_min_price == null && $this->filter_by_max_price == '' || $this->filter_by_max_price == null){

        }else{
            return true;
        }
    }
    public function ClearFilter()
    {
        $this->filter_by_max_price = '';
        $this->filter_by_min_price = '';
        $this->reset();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.place-list');
    }
}
