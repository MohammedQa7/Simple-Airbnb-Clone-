<?php

namespace App\Models;

use App\Model\User;
use App\Model\Category;
use App\Model\Amenity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'images', 
        'price_per_night', 
        'amenity_type', 
        'category_id', 
        'user_id',
        'guests_number',
        'bedrooms_number',
        'beds_number',
        'bathrooms_number', 
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function amenity()
    {
        return $this->belongsToMany('App\Models\Amenity' , 'amenity_place');
    }

    public function favorite()
    {
        return $this->belongsToMany('App\Models\User' , 'favorite_place');
    }

   

    public function scopeFilterByCategory($query , $selected_category)
    {
        sleep(1);
         $query->whereHas('category' , function($query) use($selected_category){
            return $query->where('slug' , $selected_category);
        });
    }


    public function scopeFilterByPrice($query , $min_price , $max_price)
    {
        return $query->where('price_per_night' ,'>=' , $min_price)->where('price_per_night' , '<=' , $max_price);
    }

    public function scopeFilterByBedrooms($query , $number_of_bedrooms)
    {
        return $query->where('bedrooms_number' ,'>=' , $number_of_bedrooms);
    }

    public function scopeFilterByBeds($query , $number_of_beds)
    {
        return $query->where('beds_number' ,'>=' , $number_of_beds);
    }
    
    public function scopeFilterByBathrooms($query , $number_of_bathrooms)
    {
        return $query->where('bathrooms_number' ,'>=' , $number_of_bathrooms);
    }

    
    public function scopeFilterByAmenity($query , $amenity_array)
    {
        foreach ($amenity_array as $single_amenity) {
            $query->whereHas('amenity' , function($query) use($single_amenity){
                return $query->where('title' , $single_amenity);
            });
        }
    }
    

    public function scopegetExcerpt()
    {
        // we will use "strip_tags()" because when we get the content it will be in an html format
        return Str::limit($this->description, 100);   
    }

}
