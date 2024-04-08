<div>
    {{-- User Modal --}}
    
    <x-place-modals.user-info-modal name="user-details">
    </x-place-modals.user-info-modal>

    <x-place-modals.filter-modal name="filter">
    </x-place-modals.filter-modal>


    @if (sizeOf($this->places) == 0 )
    <div class="place-not-found text-center mt-5 mb-5">
        <img width="165px" height="165px" src="{{asset('Assets/images/house.png')}}" alt="">
        <p class="mt-3">Sorry, We can't find any places</p>
    </div>
  
     @else
     <section class="mb-5">
        <div class="container global-container-spacing">
            <div class="row" >
                @foreach ($this->places as $place)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4" >
                    <div class="card">
                     <a wire:navigate href="{{URL('rooms/' . $place->slug )}}">
                        <div class="card-image position-relative">
                            <div id="carouselExampleControls-{{$loop->index}}" class="carousel slide card-img-top" data-bs-ride="carousel" data-bs-wrap="false" data-bs-interval="false">
                                <div class="carousel-inner">
                                    @foreach ($place->images as $image)
                                    <div class="carousel-item {{$loop->index == 0  ? 'active' : ''}}">
                                        <img src="{{$image}}" class="" wire:loading.class="placeholder">
                                    </div>
                                    @endforeach
                                </div>
    
                             
                                    @if (count($place->images) == 1)
                                    @else
                                  <div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls-{{$loop->index}}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
        
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls-{{$loop->index}}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true">
                                            
                                        </span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                                    @endif
                            </div>
                        </a>
                              <div class="favorite-btn">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; fill: rgba(0, 0, 0, 0.5); height: 24px; width: 24px; stroke: white; stroke-width: 2px; overflow: visible;" aria-hidden="true" role="presentation" focusable="false"><path d="M16 28c7-4.73 14-10 14-17a6.98 6.98 0 0 0-7-7c-1.8 0-3.58.68-4.95 2.05L16 8.1l-2.05-2.05a6.98 6.98 0 0 0-9.9 0A6.98 6.98 0 0 0 2 11c0 7 7 12.27 14 17z"></path></svg>
                                </button>
                              </div>
                             
    
                              <div class="user-deatils-info">
                                <a wire:click="GetUserInfo({{$place->user->id}})">
                                    <div class="card-user-holder">
                                        <div class="card-user-avatar">
                                            <img src="{{$place->user->profile_photo_url}}" alt="">
                                        </div>  
                                    </div>
                                </a>
                              </div>
                        </div>
                        <div class="card-house-body">
                            <div class="card-house-text">
                                <div class="loaction-rating-section d-flex justify-content-between mt-2">
                                    <p class="location ">Cotia, Brazil</p>
                                    <div class="rating-holder d-flex align-items-center">
                                        <img src="{{asset('Assets/images/Icons/rating-single-icon.svg')}}" alt="">
                                        <p  class="rating ms-1">{{$place->overall_rating ? $place->overall_rating : 'New'}}</p>
                                    </div>
                                </div>
                                <div class="host pb-2">
                                    <p class="host-name">Stay with {{$place->user->name}} <span class="">.</span> host</p>
                                    <!-- start date -->
                                    <p class="host-name host-date"> Feb 5 - 10</p>
                                    <!-- +5 days at the start date -->
                                </div>
                                
                                <div class="host-price"> 
                                    <p class="price">$ {{$place->price_per_night}} <span class="per-night">night</span></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{$this->show_per_page}}
        @if (count($this->places) >= $this->show_per_page)
        <div class="d-flex justify-content-center pb-5">
            <button class="ShowMore" wire:click="ShowMore">
                <p wire:loading.remove wire:target="ShowMore">More</p>
                <div wire:loading wire:target="ShowMore" class="dot-flashing w-25"></div> 
            </button>
        </div>
     @endif
    @endif


</div>


