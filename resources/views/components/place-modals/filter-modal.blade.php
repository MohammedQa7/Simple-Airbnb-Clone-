@props(['name'])
<div
x-data = "{visiable : false , name :'{{$name}}'}"
x-show = "visiable"
x-on:open-modal.window = "visiable = ($event.detail.name === name)"
x-on:close-modal.window = "visiable = false"
x-on:keydown.escape.window = "visiable = false"
style="display: none"
>

<div class="view-user-modal ">
    <div class="amenity-details-holder animate__animated animate__fadeIn">
        <div id="close-modal" class="container close-modal d-flex align-items-center">
            <button x-on:click = "visiable = false" class="close-modal-btn"></button>
            <div class="close-modal-header text-center">
              <p class="text-center">Filter</p>
            </div>
        </div>
    
        <div class="filter-header">
            <h1 class="mb-1">Price range</h1>
            <p>Nightly prices before fees and taxes</p>
             <div class="range mt-5 ">
                <div class="range-slider">
                  <span class="range-selected"></span>
                </div>
                <div class="range-input">
                  <input wire:model.defer="filter_by_min_price" type="range" class="min" min="23" max="{{$this->min_price}}"  step="1">
                  <input wire:model.defer="filter_by_max_price" type="range" class="max" min="23" max="{{$this->max_price}}"   step="1">
                </div>
                <div class="range-price">      
                  <div class="minimum-field">
                    <p for="min">Minimum</p>
                    <span class="dollar-sign">$</span>
                    <input wire:model.live="filter_by_min_price" type="text" name="min" id="input2" readonly>        
                  </div>

                  <div class="seperator d-flex justify-content-center align-items-center">
                    <span></span>
                  </div>

                  <div class="maximum-field">
                    <p for="max">Maximum</p>
                    <span class="dollar-sign">$</span>
                    <input wire:model.live="filter_by_max_price" type="text" name="max" id="input3" readonly>   
                  </div>
                </div>
              </div>  
              <hr>
        </div>

        <div class="filter-header place-basic-filter pt-0">
          <h1 class="mb-2">Rooms and beds</h1>
          <div class="room-filter mt-3">
            <p>Bedrooms</p>
            <x-filter_by_bedrooms>
            </x-filter_by_bedrooms>
          </div>

          <div class="room-filter mt-2">
            <p>Beds</p>
            <x-filter_by_beds>
            </x-filter_by_beds>
          </div>

          <div class="room-filter mt-2">
            <p>Bathrooms</p>
            <x-filter_by_bathrooms>
            </x-filter_by_bathrooms>
          </div>
        </div>

        <div class="filter-header filter-place-amenity">
            <h1>Amenities</h1>
  
            <div class="row">
                @foreach ($this->amenities as $single_amenity)
                <div class="col-lg-6 mb-2" wire:key="{{$single_amenity->id}}">
                  <div class="amenity-checkboxes mt-3">
                    <label class="amenity-checkbox">
                          <input wire:model.live="filter_by_amenity" type="checkbox" value="{{$single_amenity->title}}">
                          <span class="checkmark me-2"></span>
                          {{$single_amenity->title}}
                    </label>
                  </div>
                </div>
                @endforeach    
            </div>
        </div>



        <div class="bottom-filter-nav  ">
          <button x-on:click="$dispatch('close-modal')" wire:click="ClearFilter" class="clear-price-filter">Clear all</button>
          <button x-on:click="$dispatch('close-modal')"  wire:click.debounce.300ms="Places" class="show-place-btn">Show Places</button>
      </div>
    </div> 
</div>
</div>
