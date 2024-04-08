<div>
    {{-- Modals --}}
    <x-place-modals.all-images-modal name="images">
    </x-place-modals.all-images-modal>
    <x-place-modals.amenity-modal name="amenity">
    </x-place-modals.amenity-modal>
{{--  --}}
    <div class="house-details-header d-flex justify-content-between align-items-center">
        <h1 class="house-title">
            {{$this->single_place->title}}
        </h1>
        
        <a >
            <div class="add-to-favorite d-flex align-items-center">
                <img class="me-1" width="18px" height="18px" src="{{asset('Assets/images/Icons/favorite-stroke-only.svg')}}" alt="">
                <p  class="mb-1">Save</p>
            </div>
        </a>
    </div>

    <div class="hosue-images mt-3">
        <div class="row g-2">
            @foreach ($single_place->images as $image)
                @if ($loop->index == 0)
                <div class="col-lg-6 ">
                    <a x-on:click="$dispatch('open-modal' , {name:'images'})">
                        <div class="house-image-wide">
                            <img src="{{$image}}" alt="">
                        </div>
                    </a>
                </div>
                @endif
            @endforeach

            <div class="col-lg-6 ">
                <div class="row g-2 position-relative">

            @foreach ($single_place->images as $image)
            @if ($loop->index >= 1 && $loop->index <5)
                    <div class="col-lg-6">
                        
                        <a x-on:click="$dispatch('open-modal' , {name:'images'})">
                            <div class="house-image-wide">
                                <img src="{{$image}}" alt="">
                            </div>
                        </a>
                    </div>
                                        
            @endif
            @endforeach
                    <a x-data x-on:click="$dispatch('open-modal' , {name: 'images'})" class="show-more-images-link position-absolute">
                        <div class="show-more-images d-flex justify-content-center align-items-center">
                            <img class="me-2" width="18px" height="18px" src="{{asset('Assets/images/Icons/gird-dots.svg')}}" alt="">
                            <p>Show all photos</p>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>

    <div  class="house-details-information mt-4">
        <div class="row">
            <div  class="col-lg-8">
                <div  class="house-information-header-">
                    <p class="house-location">
                        <span class="name-of-the-category">{{$single_place->category->title}}</span>
                        in  Levallois-Perret, France
                    </p>
                    <p class="house-specifications">{{$single_place->beds_number == 0 ? 'No' : "$single_place->beds_number"}} bed</p>
                </div>

                <div class="house-owner-details d-flex align-items-center pt-5 pb-3">
                    <div  class="house-owner-avatar me-3">
                    <img src="{{$single_place->user->profile_photo_url}}" alt="">
                    </div>
                    <div class="house-owner-name">
                        <p>Stay with {{$single_place->user->name}}</p>
                        <p class="user-hosting-timeline">{{$single_place->user->created_at->diffInYears()}} year hosting </p>
                    </div>
                </div>
                <hr>

                <div  class="meet-host pt-3">
                    <h1>Meet your host</h1>
                    <div class="host-info-in-single-post d-flex flex-column  mt-3">
                        <div class="host-info-card d-flex justify-content-evenly mt-5">
                            <div class="user-info d-flex justify-content-center flex-column align-items-center">
                                <div class="user-info-avatar"> 
                                    <img class="w-100 h-100" style="object-fit: cover;" src="{{$single_place->user->profile_photo_url}}" alt="">
                                </div>
                                <p class="user-info-name">{{$single_place->user->name}}</p>
                                <p class="user-info-hosting">Host</p>
                            </div>

                            <div class="user-info-section2">
                                <div class="Reviews pb-2 border-bottom">
                                    <p class="total-number">7</p>
                                    <p class="review-text">Reviews</p>
                                </div>
                                <div class="Rating pb-2 pt-2 border-bottom">
                                    <p class="total-number d-flex align-items-center">4.29
                                        <span class="ms-1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" style="display: block; height: 14px; width: 14px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="M7.57 1.1 5.51 5.24l-4.57.65a.5.5 0 0 0-.29.14l-.06.1c-.1.2-.11.27-.03.44l.1.18 3.3 3.23-.8 4.55a.5.5 0 0 0 .05.32l.07.08c.16.17.22.2.41.17l.2-.04 4.1-2.13 4.08 2.16c.1.06.21.07.33.05l.08-.04c.21-.1.26-.15.3-.34l.02-.2-.77-4.55 3.32-3.22a.5.5 0 0 0 .15-.3l-.01-.1c-.05-.3-.08-.3-.42-.46l-4.57-.68L8.47 1.1a.5.5 0 0 0-.9 0z"></path></svg></span>
                                    </p>
                                    <p class="review-text">Rating</p>
                                </div>
                                <div class="time-of-hosting pt-2">
                                    <p class="total-number">{{$single_place->user->created_at->diffInYears()}}</p>
                                    <p class="review-text">Years hosting</p>
                                </div>
                            </div>

                        </div>

                        <div class="host-single-post-Public-info mt-4">
                            <div class="public-info pb-3 w-100 d-flex">
                                <img class="me-2" src="/images/Icons/favorite.svg" alt="">
                                <p class="">Study in the aklsdmlkasmdlkamsdlkamsd lakmsdlkamsdlaksd</p>
                            </div>

                            <div class="show-more-btn pt-2">
                                <button class="d-flex align-items-center justify-content-center">
                                <p class="me-1">Show more</p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333px; overflow: visible;" aria-hidden="true" role="presentation" focusable="false"><path fill="none" d="m12 4 11.3 11.3a1 1 0 0 1 0 1.4L12 28"></path></svg>
                            </button>
                            </div>

                            <hr>
                            
                            <div class="airbnb-protection">
                                To protect your payment, never transfer money or communicate outside of the Airbnb website or app.
                            </div>
                        </div>

                    </div>
                </div>

                <div class="house-description pb-3">
                    <h1 class="mt-5 mb-3">About this place</h1>

                    <p class="description mb-2">
                        {{$single_place->getExcerpt()}}
                    </p>

                    <div class="show-more-btn pt-2 ">
                        <button class="d-flex align-items-center justify-content-center p-0">
                        <p class="me-1">Show more</p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333px; overflow: visible;" aria-hidden="true" role="presentation" focusable="false"><path fill="none" d="m12 4 11.3 11.3a1 1 0 0 1 0 1.4L12 28"></path></svg>
                    </button>
                    </div>
                </div>

                <hr>

                <div id="amenities-section" class="place-offers mt-5">
                    <h1>What this place offers</h1>
                    <div  class="offers mt-4">
                        <div class="offer-item-list mb-3">
                            <div class="row">
                                @foreach ($single_place->amenity->take(8) as $single_amenity)
                                <div class="col-lg-6 mb-3">
                                    <div class="offer-items d-flex align-items-center">
                                        <img class="me-2" src="{{$single_amenity->ConvertImageUrl()}}" alt="">
                                        <p>{{$single_amenity->title}}</p>
                                   </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="show-more-offers mt-3 mb-5">
                                <button x-data x-on:click="$dispatch('open-modal' , {name: 'amenity'})">
                                    Show all {{$single_place->amenity->count()}} amenities
                                </button>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
                @livewire('reservation_card' , ['single_place' => $this->single_place] , key($this->single_place->id.now()))
        </div>

        <hr>

        <div id="review-section" class="single-place-reviews mt-5 ">
            <div class="avrage-rating-for-place d-flex justify-content-center align-items-center flex-column">
                <div class="avg-rate-number d-flex justify-content-center">
                    <img src="{{asset('Assets/images/left-rating-image.png')}}" alt="">
                    <h1>4.22</h1>
                    <img src="{{asset('Assets/images/right-rating-image.png')}}" alt="">
                </div>
                <div class="guest-text-under-rating">
                    <p class="text-center">Guest avarage rating</p>
                    <p class="">One of the most loved homes on Airbnb based on ratings, reviews, and reliability</p>
                </div>
            </div>     
            
            <div class="review-comment-section mt-5">
                <div class="review-field d-flex">
                    <div class="review-input w-100 pe-4">
                        <input class="w-100" type="text" name="review" placeholder="Write you honest review">
                    </div>
                    <div class="review-submit-btn">
                        <button>Send</button>
                    </div>
                </div>

            
                <div class="review-messages mt-5">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="review-by-user">
                                <div class="review-author d-flex flex-column ">
                                  <div class="d-flex">
                                    <img src="/images/image-4_1701116833890.png" alt="">
                                    <div class="author-name ms-3">
                                        <p>Cathy</p>
                                        <p>France</p>
                                    </div>
                                  </div>
                                    <div class="review-reating-and-timeline d-flex align-items-center   mt-3">
                                        <div class="rating-starts d-flex me-2">
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
    
                                        </div>
    
                                        <p class="position-relative">1 Week ago</p>
                                        <p>Stayed a couple of nights </p>
                                    </div>
                                </div>
    
                                <div class="review-content mt-1">
                                    <p>alskdmalksmd</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <div class="review-by-user">
                                <div class="review-author d-flex flex-column ">
                                  <div class="d-flex">
                                    <img src="/images/image-4_1701116833890.png" alt="">
                                    <div class="author-name ms-3">
                                        <p>Cathy</p>
                                        <p>France</p>
                                    </div>
                                  </div>
                                    <div class="review-reating-and-timeline d-flex align-items-center   mt-3">
                                        <div class="rating-starts d-flex me-2">
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
    
                                        </div>
    
                                        <p class="position-relative">1 Week ago</p>
                                        <p>Stayed a couple of nights </p>
                                    </div>
                                </div>
    
                                <div class="review-content mt-1">
                                    <p>alskdmalksmd</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <div class="review-by-user">
                                <div class="review-author d-flex flex-column ">
                                  <div class="d-flex">
                                    <img src="/images/image-4_1701116833890.png" alt="">
                                    <div class="author-name ms-3">
                                        <p>Cathy</p>
                                        <p>France</p>
                                    </div>
                                  </div>
                                    <div class="review-reating-and-timeline d-flex align-items-center   mt-3">
                                        <div class="rating-starts d-flex me-2">
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
    
                                        </div>
    
                                        <p class="position-relative">1 Week ago</p>
                                        <p>Stayed a couple of nights </p>
                                    </div>
                                </div>
    
                                <div class="review-content mt-1">
                                    <p>alskdmalksmd</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
