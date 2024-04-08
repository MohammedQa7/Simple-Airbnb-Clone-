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
    <div  id="user-details-holder" class="user-details-holder animate__animated animate__fadeIn">
        <div id="close-modal" class="close-modal">
            <button x-on:click = "visiable = false" class="close-modal-btn"></button>
        </div>
        
        <div  class="user-modal-content ">
            <div class="view-data-in-card ">
                <div class="row h-100" style="padding: 25px;">
                    <div class="col-lg-6 d-flex justify-content-end align-items-center">
                        <div class="user-info d-flex justify-content-center flex-column align-items-center w-100">
                            <div class="user-info-avatar"> 
                                <img class="w-100 h-100" style="object-fit: cover;" src="{{$this->user_info->profile_photo_url??''}}" alt="user-profile">
                            </div>
                            <p class="user-info-name">{{$this->user_info->name ?? '...'}}</p>
                            <p class="user-info-hosting">Host</p>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="user-info-section2">
                            <div class="Reviews pb-2">
                                <p class="total-number">7</p>
                                <p class="review-text">Reviews</p>
                            </div>
                            <div class="Rating pb-2">
                                <p class="total-number">7</p>
                                <p class="review-text">Rating</p>
                            </div>
                            <div class="time-of-hosting">
                                @isset($this->user_info->created_at)
                                @if ($this->user_info->created_at < now())
                                <p class="total-number">{{$this->user_info->created_at->diffInYears()}}</p>
                                @endif
                                @endisset
                                <p class="review-text">Years hosting</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="user-public-info mt-4 mb-4">
                    <div class="public-info">
                        <img src="/images/Icons/favorite.svg" alt="">
                        <p class="ms-2">Born asldasldknalsdnlaksndlkasndlkansldknalskdnlaksdnin the 90s</p>
                    </div>
                </div>

                <hr>

                <!-- Review Section -->
              <div class="Review-Section mt-4 mb-4" style="position: relative;">
                  <h2 class="mb-3 mt-4" style="font-size: 26px;">Valentina’s reviews</h2>
                  <div id="carouselExampleControls2" class="carousel slide review-section" data-bs-ride="carousel" data-bs-wrap="false" data-bs-interval="false" style="position: static !important;">
                    <div class="carousel-inner" style="position: static !important;">
                        <div class="carousel-item active guests-reviews ">
                            <div class="review-holder">
                                <div class="review-content">
                                    <p>“…Valentina was a very friendly and accommodating host! Her boyfriend checked me in and showed me everything I needed to know. The location of the apartment is good, ther
                                    </p>
                                </div>
                                <div class="reviews-writer d-flex mt-3">
                                        <img src="/images/image-4_1701116833890.png" alt="">
                                        <div class="review-writer-info ms-3">
                                            <p class="writet-name">Claudia</p>
                                            <p class="review-date">October 2023</p>
                                        </div>
                                </div>
                            </div>    
                        </div>

                    </div>
                    <button class="carousel-control-prev-2 " type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next-2" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true">
                        </span>
                        <span class="visually-hidden">Next</span>
                      </button>
                </div>

                

                
              </div>

              <hr>

              <div class="confirmed-information mt-4 mb-4">
                <div class="confirmed-types">
                    <h1>Valentina's confirmed information</h1>
                    @if ($this->user_info)
                    <div class="Identity d-flex mt-3 mb-3 align-items-center ">
                        <img class="me-2" width="20px" height="20px" src="{{asset('Assets/images/Icons/CheckMark.svg')}}" alt="">
                        <p>Identity</p>
                    </div>
                    @endif

                    <div class="email d-flex mb-3 align-items-center">
                        @isset($this->user_info->email_verified_at)
                        <img class="me-2" width="20px" height="20px" src="{{asset('Assets/images/Icons/CheckMark.svg')}}" alt="">
                        @else
                        <img class="me-2" width="20px" height="20px" src="{{asset('Assets/images/Icons/close-icon.svg')}}" alt="">
                        @endisset
                        <p>Email Address</p>
                    </div> 
                    <div class="phone-number d-flex mb-3 align-items-center">
                         @isset($this->user_info->phone_number)
                        <img class="me-2" width="20px" height="20px" src="{{asset('Assets/images/Icons/CheckMark.svg')}}" alt="">

                        @else
                        <img class="me-2" width="20px" height="20px" src="{{asset('Assets/images/Icons/close-icon.svg')}}" alt="">
                        @endisset
                        <p>Phone Number</p>
                    </div>
           
                </div>
              </div>
              <hr>
              <!-- House Posts Section -->
              <div class="Review-Section mt-4 mb-4" style="position: relative;">
                <h2 class="mb-3 mt-4" style="font-size: 26px;">{{$this->user_info->name ?? '...'}}’s listing</h2>
                <div id="carouselExampleControls3" class="carousel slide user-listing " data-bs-ride="carousel" data-bs-wrap="false" data-bs-interval="false" style="position: static !important;">
                  <div class="carousel-inner" style="position: static !important;">
                     
                    @isset($this->user_info->place)
                    @foreach ($this->user_info->place->chunk(2) as $place)
                    <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}} user-owned-houses">
                        <div class="row">
                            @foreach ($place as $singular_place)
                            <div class="col-6">
                                <div class="post-holder">
                                    <div class="post-card-image mb-2">
                                        <img src="{{$singular_place->images}}" alt="">
                                    </div>
    
                                    <div class="post-card-content">
                                        <div class="house-detials">
                                            <p class="category-house-name">{{$singular_place->category->title}}</p>
                                            <p class="house-title">{{$singular_place->title}}</p>
                                        </div>
                                    </div>
                                  </div>  
                            </div>
                            @endforeach
                        </div>  
                      </div>
                    @endforeach
                    @endisset
                      
                  </div>
                  <button class="carousel-control-prev-2 " type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next-2" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true">
                      </span>
                      <span class="visually-hidden">Next</span>
                    </button>
              </div>
            </div>
            </div>

        </div>
        
    </div>
    
</div>


</div>