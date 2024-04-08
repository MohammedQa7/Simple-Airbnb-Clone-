<?php

namespace App\Models;

use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'place_id',
        'reservation_start_date',
        'reservation_end_date',
        'total_price',
        'total_guests',
        'total_infants',
    ];


    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
