<!doctype html>
<html lang="en">

    @include('layouts.includes.heading-tag')



<body>
  <div class="container mt-5">
      <div class="booking-header d-flex align-items-center">
        <div class="go-back-btn me-1">
            <a class="d-flex justify-content-center align-items-center" href="{{URL('rooms/'. $place['single_place']['slug'])}}">
                <img src="{{asset('Assets/images/Icons/back-icon.svg')}}" alt="">
            </a>
        </div>
        <h1>Request to book</h1>
      </div>

      <div class="row ms-5 mt-5">
          <div class="col-lg-6 g-0">
            @if(session()->has('fail'))
                <div class="error w-100 mb-3">
                    <div class="error__icon">
                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
                    </div>
                    <span class="text-danger" style="font-size: 14px">{{ Session::get('fail') }}</span>                     
                </div>

            @elseif(session()->has('payment_failer'))
            <div class="error w-100 mb-3">
                <div class="error__icon">
                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
                </div>
                <span class="text-danger" style="font-size: 14px">{{ Session::get('payment_failer') }}</span>                     
            </div>

            @elseif(session()->has('payment_decliend'))
            <div class="error w-100 mb-3">
                <div class="error__icon">
                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
                </div>
                <span class="text-danger" style="font-size: 14px">{{ Session::get('payment_decliend') }}</span>                     
            </div>
            @endif
            <div class="trip-details ">
                <p>Your trip</p>
                <div class="trip-dates">
                    <p class="mt-3">Dates</p>
                    <div class="from-to-dates d-flex gap-2 mt-1">
                        <p>{{$place['start_date']}}</p>
                        <p>-</p>
                        <p>{{$place['end_date']}}</p>
                    </div>
                </div>
    
                <div class="guest-number mb-4">
                    <p class="mt-3 ">Guest</p>
                    <div class="number-of-guests d-flex mt-1">
                        <p> {{$place['total_guests']}} <span class="ms-1">guests</span></p>
                    </div>
                </div>
                <hr>
                <div class="payment-container mt-4">
                    <div class="payment-header d-flex justify-content-between align-items-center">
                        <h1>Pay with</h1>
                        <div class="payment-methods gap-2">
                            <img src="{{asset('Assets/images/visa.png')}}" alt="">
                            <img src="{{asset('Assets/images/master-card.png')}}" alt="">
                            <img src="{{asset('Assets/images/paypal.png')}}" alt="">
                            <img src="{{asset('Assets/images/stripe.png')}}" alt="">
                        </div>
                    </div>

                    <div class="payment-form mt-4 mb-5"> 
                            <form
                            role="form" 
                            action="{{URL('book/store')}}" method="POST"
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ config('services.stripe.published') }}"
                            id="payment-form">
                            @csrf
                              <div class="credit-card-info--form">
                                <div class="input_container form-group">
                                  <label for="holdername_field" class="input_label">Card holder full name</label>
                                  <input id="card-name" class="input_field holder_name" type="text" name="name" title="Inpit title" placeholder="Enter your full name" @error('name') style="border-color: red" @enderror>
                                    @error('name')
                                    <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="input_container form-group">
                                  <label for="card_field" class="input_label">Card Number</label>
                                  <input id="card_field" class="input_field card-number" type="number" name="card_number" title="Inpit title" placeholder="0000 0000 0000 0000" @error('card_number') style="border-color: red" @enderror>
                                  @error('card_number')
                                  <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                  @enderror
                                </div>
                                <div class="input_container form-group">
                                  <label for="expiryDate_field" class="input_label">Expiry Date / CVV</label>
                                  <div class="split">
                                    <div>
                                        <input id="card-expiry-month" class="input_field  card-expiry-month" type="text" name="expiry_date_month" title="Expiry Date" placeholder="01/23" @error('expiry_date') style="border-color: red;" @enderror>
                                        @error('expiry_date')
                                        <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                        @enderror
                                    </div>

                                    <div>
                                        <input id="card-expiry-year" class="input_field  card-expiry-year" type="text" name="expiry_date_year" title="Expiry Date" placeholder="01/23" @error('expiry_date') style="border-color: red;" @enderror>
                                        @error('expiry_date')
                                        <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                    <div>
                                        <input id="card-cvc" class="input_field  card-cvc" type="number" name="cvv" title="CVV" placeholder="CVV" @error('cvv') style="border-color: red" @enderror>
                                        @error('cvv')
                                        <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                                </div>
                              </div>

                              <div class="credit-card-info--form billing-address">
                                  <h1>Billing address</h1>
                                <div class="input_container form-group">
                                  <label for="street_field" class="input_label">Street address</label>
                                  <input id="street_field" class="input_field" type="text" name="street" title="Inpit title" placeholder="street" @error('street') style="border-color: red" @enderror>
                                  @error('street')
                                  <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                  @enderror
                                </div>
                                <div class="input_container form-group">
                                  <label for="city_field" class="input_label">City</label>
                                  <input id="city_field" class="input_field" type="text" name="city" title="Inpit title" placeholder="City" @error('city') style="border-color: red" @enderror>
                                  @error('city')
                                  <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                  @enderror
                                </div>
                                <div class="input_container form-group">
                                  <label for="zip_code_field" class="input_label">State / ZIP code</label>
                                  <div class="split">


                                <div>
                                    <input id="zip_code_field" class="input_field" type="text" name="state" title="State" placeholder="State" @error('state') style="border-color: red" @enderror>
                                    @error('state')
                                    <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                    @enderror
                                </div>

                                <div>
                                  <input id="zip_code_field" class="input_field" type="number" name="zip_code" title="ZIP" placeholder="ZIP code" @error('zip_code') style="border-color: red" @enderror>
                                  @error('zip_code')
                                  <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
                                  @enderror
                                </div>
                                </div>
                                </div>
                              </div>

                              <button type="submit" class="purchase--btn d-flex align-items-center justify-content-center mt-3">
                                <svg fill="#ffffff"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_518_"> <path id="XMLID_519_" d="M65,330h200c8.284,0,15-6.716,15-15V145c0-8.284-6.716-15-15-15h-15V85c0-46.869-38.131-85-85-85 S80.001,38.131,80.001,85v45H65c-8.284,0-15,6.716-15,15v170C50,323.284,56.716,330,65,330z M110.001,85 c0-30.327,24.673-55,54.999-55c30.327,0,55,24.673,55,55v45H110.001V85z"></path> </g> </g></svg>
                                Book Now
                            </button>
                            </form>
                    </div>
                </div>
           
                </div>
             </div>

          <div class="col-lg-6 ">
              <div class="booking-place-container d-flex justify-content-center">
                    <div class="booking-place-details">
                        <div class="place-header-details d-flex align-items-center">
                            @foreach ($place['single_place']['images'] as $image)
                                @if ($loop->index == 0)
                                <img src="{{Storage::url($image)}}" alt="">
                                @endif
                            @endforeach
                              <div class="place-details ms-3">
                                  <p class="place-title">{{$place['single_place']['title']}}</p>
                                  <p class="place-category">{{$place['single_place']['category']['title']}}</p>
          
                                  <div class="place-rating-and-review d-flex align-items-center" >
                                      <div class="rating-star me-1">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" style="display: block; height: 9px; width: 9px; fill: var(--f-k-smk-x);" aria-hidden="true" role="presentation" focusable="false"><path fill-rule="evenodd" d="m15.1 1.58-4.13 8.88-9.86 1.27a1 1 0 0 0-.54 1.74l7.3 6.57-1.97 9.85a1 1 0 0 0 1.48 1.06l8.62-5 8.63 5a1 1 0 0 0 1.48-1.06l-1.97-9.85 7.3-6.57a1 1 0 0 0-.55-1.73l-9.86-1.28-4.12-8.88a1 1 0 0 0-1.82 0z"></path></svg>
                                      </div>
                                      <p class="place-rating me-1">4.90</p>
                                      <p class="place-review">(9 reviews)</p>
                                  </div>
                              </div>
                          </div>
                          <hr>
                          <div class="place-price">
                              <div class="fees-and-total">
                                  <h1>Price details</h1>
                                  <div class="total-with-nights d-flex justify-content-between align-items-center pt-4 pb-3">
                                      <a href="">${{$place['single_place']['price_per_night']}} x {{$TotalReservationDays}} nights</a>
                                      <p>${{$TotalPriceWithNights}}</p>
                                  </div>
                                  <div class="total-with-nights fees d-flex justify-content-between align-items-center mb-4">
                                      <a href="">Airbnb service fee</a>
                                      <p>$33</p>
                                  </div>
                                  <hr>
                                  <div class="total-cost mt-4">
                                      <div class="cost d-flex justify-content-between align-items-center">
                                          <p>Total before taxes</p>
                                          <p>${{$TotalReservationCost}}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
              </div>
          </div>
      </div>

  </div>


    {{-- Footer will be here --}}
    @include('layouts.includes.main-footer')

               


    {{-- Script --}}
    @include('layouts.includes.script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
              
    {{-- <script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');
       
            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }
      
      });
      
      function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                   
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
       
    });
    </script> --}}
   
</body>

</html>