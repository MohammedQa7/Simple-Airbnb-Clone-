    <div class="col-lg-4" >
        <div   class="reservation-container d-flex justify-content-end mb-5">
            <div class="reservatoin">
                <div class="reserv-per-night" >
                    <p class="night-price "> $ {{$this->single_place->price_per_night}}<span class="ms-1">night</span></p>
                </div>
                <div class="reservation-dates d-flex mt-3" style="{{ $errors->has('Start_date')|| $errors->has('End_date') ? 'border-color:red !important;' : '' }}">
                    <div class="row">
                        <div class="col-lg-6 checkIn-col position-relative " style="border-right: 1px solid var(--Grey);">
                            <label class="checkIn-lable mt-3" for="DateFrom" style="{{ $errors->has('Start_date') ? 'color:red !important;' : '' }}">CHECK-IN</label>
                            <input wire:model.live="Start_date" name="DateFrom" type="text" id="DateFrom" class="pt-3 pb-2">
                        </div>

                        <div  class="col-lg-6 position-relative ">
                            <label class="ms-1 mt-3" for="DateTo"  style="{{ $errors->has('End_date') ? 'color:red !important;' : '' }}">CHECKOUT</label>
                            <input wire:model.live="End_date" name="DateTo" type="text" id="DateTo" class="pt-3 pb-2">
                        </div>
           
                        <div x-data x-on:click = "$dispatch('open-modal' , {name : 'dropdown'})" class="col-lg-12">
                            <div class="dropdown border-top w-100 h-100 position-relative">
                                <a class=" guests-dropdown dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" ata-bs-auto-close="inside">
                                    GUESTS
                                </a>
                                <x-place-modals.dropdown name="dropdown">
                                </x-place-modals.dropdown>
                                <p class="total-guests"> {{$this->total_guests}} guests</p>
                              </div>
                        </div>
                    </div>
                </div>

                {{-- Error Section --}}
                @error('Start_date')
                <div class="date-error mt-2 mb-2 d-flex align-items-start">
                    <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11 13C11 13.5523 11.4477 14 12 14C12.5523 14 13 13.5523 13 13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V13ZM13 15.9888C13 15.4365 12.5523 14.9888 12 14.9888C11.4477 14.9888 11 15.4365 11 15.9888V16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16V15.9888Z" fill="#ff2600"></path> </g></svg>
                    <p class="text-danger ms-1">{{$message}}</p>
                </div>
                @enderror

                @error('End_date')
                <div class="date-error mt-2 mb-2 d-flex align-items-start">
                    <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11 13C11 13.5523 11.4477 14 12 14C12.5523 14 13 13.5523 13 13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V13ZM13 15.9888C13 15.4365 12.5523 14.9888 12 14.9888C11.4477 14.9888 11 15.4365 11 15.9888V16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16V15.9888Z" fill="#ff2600"></path> </g></svg>
                    <p class="text-danger ms-1">{{$message}}</p>
                </div>
                @enderror
                {{--  --}}

                
                    <div class="reserve-btn pt-4">
                        @if ($errors->has('Start_date') || $errors->has('End_date'))
                        <button>Change date</button>
                        @elseif(Auth::user())
                        <button wire:click="Reserve">Reserve</button>
                        @else
                        <button disabled style="background: var(--Grey) !important">Sign in</button>

                        @endif
                        <p class="text-center pt-2"><small>You won't be charged yet</small></p>
                    </div>
                
               
                <div class="fees-and-total">
                    <div class="total-with-nights d-flex justify-content-between align-items-center pt-4 pb-3">
                        <a href="">${{$this->single_place->price_per_night}} x {{$this->total_reservation_days == 0  ? '1 night' : $this->total_reservation_days  .' '.'nights'}} </a>
                        <p>${{$this->total_price_with_nights == 0 ? $this->single_place->price_per_night : $this->total_price_with_nights}}</p>
                    </div>
                    <div class="total-with-nights fees d-flex justify-content-between align-items-center">
                        <a href="">Airbnb service fee</a>
                        <p>$33</p>
                    </div>
                </div>

                <hr>

                <div class="total-cost">
                    <div class="cost d-flex justify-content-between align-items-center">
                        <p>Total before taxes</p>
                        <p>${{$this->total_reservation_cost}}</p>
                    </div>
                </div>
        </div>
    </div> 
</div> 

