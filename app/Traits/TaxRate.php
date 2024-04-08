<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
/**
 * 
 */
trait TaxRate
{
    public $tax_rate = 5;
    public function guestTaxRatePrice($price)
    {
        if(is_numeric($price)){
            return $price * ($this->tax_rate / 100);
        }
    }

    
}
