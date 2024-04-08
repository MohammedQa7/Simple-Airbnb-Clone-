<?php

namespace App\Rules;

use App\Models\Reservation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateReservationChecker implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     protected $place_id;
     public function __construct($place_id)
     {
        $this->place_id = $place_id;
     }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $is_there_a_date =  Reservation::where('place_id' , $this->place_id)
        ->where('reservation_start_date' , '<=' ,$value)
        ->where('reservation_end_date' ,'>=' ,$value);
        
        return $is_there_a_date;
    }
}



/**
 * res 1
 * 2/2/2020    -    10/2/2020
 * 
 * 5/2/2020   -    9/2/2020   False
 * 
 * 
 * res 2
 * 1/2/2020 - 11/2/2020
 * 
 * 
 * 
 * 
 */