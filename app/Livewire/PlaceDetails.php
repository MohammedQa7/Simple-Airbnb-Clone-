<?php

namespace App\Livewire;

use App\Models\Place;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class PlaceDetails extends Component
{

    public $single_place;


    public function render()
    {
        $this->single_place->images = collect($this->single_place->images);
        return view('livewire.place-details');
    }
}
