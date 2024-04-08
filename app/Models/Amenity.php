<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Amenity extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'title',
        'image',
    ]; 

    public function scopeConvertImageUrl()
    {
        return Storage::disk('public')->url($this->image);
    }

    public function place()
    {
        return $this->belongsToMany('App\Models\Place' , 'amenity_place');
    }
}
