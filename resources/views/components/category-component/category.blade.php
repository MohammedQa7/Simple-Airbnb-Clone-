 <div class="HomeCategories" wire:ignore>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-5  col-12 d-flex " >
                    <div class=" owl-carousel owl-theme d-flex align-items-center">
                        {{$slot}}
                    </div>
                </div>

                <div class="col-lg-1 col-1 col-md-2  d-flex align-items-center position-relative">
                    <a x-data x-on:click="$dispatch('open-modal' , {name:'filter'})">
                        <div class="filter-option {{request()->query('filter_by_min_price') || request()->query('filter_by_max_price')  ? 'filter-active' : ''}} d-flex align-items-center justify-content-end">
                            <img class="" width="16px" height="16px" src="{{asset('Assets/images/Icons/filter.svg')}}" alt="">
                            <p class="" style="font-size: 12px;">Filters</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-3 col-md-5 d-flex align-items-center justify-content-end">
                        <div class="filter-option-price d-flex align-items-center">   
                            <p class="me-2" style="font-size: 12px;">Display total prices</p>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider">
                                    <svg class="slider-icon" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation"><path fill="none" d="m4 16.5 8 8 16-16"></path></svg> 
                                </span>
                            </label>
                            
                        </div>
                        
                </div>

            </div>
        </div>
</div>