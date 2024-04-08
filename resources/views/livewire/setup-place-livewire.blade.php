<div>
    @if ($this->CurrentStepValue == 1)
        <x-setup-place.getting-started></x-setup-place.getting-started>
    @elseif($this->CurrentStepValue == 2)
        <x-setup-place.step-1.welcome-step></x-setup-place.step-1.welcome-step>
    @elseif($this->CurrentStepValue == 3)
      <x-setup-place.step-1.choose-category>
            @foreach ($this->categories as $category)
            <div class="col-lg-4 col-md-6 col-6">
                   <label class="radio-wrapper" wire:key="{{$category->id}}">
                       <input wire:model.defer=category_selected type="radio" class="radio-input" value="{{$category->id}}" />
                       <div class="radio-tile">
                           <div class="radio-icon">
                               <img src="{{$category->ConvertImageUrl()}}" alt="">
                           </div>
                           <div class="radio-label">{{$category->title}}</div>
                       </div>
                   </label>
               </div>
           @endforeach
       </x-setup-place.step-1.choose-category>
       <x-setup-place.bottom-action-bar>
        <x-slot:progressBarStep1>
            <div class="progress">
                <div class="progress-bar w-{{$this->ProgressBarValue_Steps_1}}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </x-slot:progressBarStep1>

        <x-slot:progressBarStep2>
            <div class="progress">
                <div class="progress-bar  w-{{$this->ProgressBarValue_Steps_2}}"  role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </x-slot:progressBarStep2>

        <x-slot:progressBarStep3>
            <div class="progress">
                <div class="progress-bar   w-{{$this->ProgressBarValue_Steps_3}}"  role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </x-slot:progressBarStep3>
          
           <x-slot:Next_Prev_Btn>
               <div class="next-step-btn  d-flex justify-content-between align-items-center">
                   <a wire:click="PrevStep" class="d-flex justify-content-center align-items-center">
                       <div wire:loading wire:target="PrevStep" class="dot-flashing"></div> 
                       <p wire:loading.remove wire:target="PrevStep">Back</p>
                   </a>
   
                   <button  wire:click="NextStep" type="submit" class=" d-flex justify-content-center align-items-center">
                       <!-- show on loading -->
                       <div wire:loading wire:target="NextStep" class="dot-flashing"></div> 
                       <p wire:loading.remove wire:target="NextStep">Next</p>
                   </button>
               </div>
           </x-slot:Next_Prev_Btn>
       </x-setup-place.bottom-action-bar>

       @elseif($this->CurrentStepValue == 4)

    <x-setup-place.step-1.share-basics>
        <x-slot:increment_btn_guest>
            <button {{$this->total_guest_number == 0 ? 'disabled': ''}} wire:click="decrementingSystem('guests')">
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <input wire:model.defer="total_guest_number" class="increment-value guest-input me-2 ms-2" type="text"  readonly>
            {{-- <label class="pe-1" for="">+</label> --}}
            <button {{$this->total_guest_number == $this->max_guests ? 'disabled': ''}} wire:click="incrementingSystem('guests')">
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_btn_guest>

        <x-slot:increment_btn_bedrooms>
            <button {{$this->total_bedrooms_number == 0 ? 'disabled': ''}} wire:click="decrementingSystem('bedrooms')">
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <input wire:model.defer=total_bedrooms_number class="increment-value me-2 ms-2" type="text"  readonly>
            <button {{$this->total_bedrooms_number == $this->max_bedrooms ? 'disabled': ''}} wire:click="incrementingSystem('bedrooms')">
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_btn_bedrooms>

        <x-slot:increment_btn_beds>
                <button {{$this->total_beds_number == 0 ? 'disabled': ''}} wire:click="decrementingSystem('beds')">
                    <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
                </button>
                <input wire:model.defer=total_beds_number class="increment-value me-2 ms-2" type="text" readonly>
                <button {{$this->total_beds_number == $this->max_beds ? 'disabled': ''}} wire:click="incrementingSystem('beds')">
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
                </button>
        </x-slot:increment_btn_beds>

        <x-slot:increment_bathrooms>
            <button {{$this->total_bathroom_number == 0 ? 'disabled': ''}}  wire:click="decrementingSystem('bathrooms')">
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <input wire:model.defer="total_bathroom_number" class="increment-value me-2 ms-2" type="text"  readonly>
            <button {{$this->total_bathroom_number == $this->max_bathroom ? 'disabled': ''}} wire:click="incrementingSystem('bathrooms')">
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_bathrooms>

    </x-setup-place.step-1.share-basics>
  
    @elseif($this->CurrentStepValue == 5)
    <x-setup-place.step-2.welcome-setup-2></x-setup-place.step-2.welcome-setup-2>
    @elseif($this->CurrentStepValue == 6)
    <x-setup-place.step-2.choose-amenities>
        @foreach ($this->amenities as $amenity)
            <div  class="col-lg-4 animate__animated  animate__slideInUp" wire:key="{{$amenity->id.now()}}">
                <label class="checkbox-wrapper h-100">
                    <input wire:model.defer="amenity_type" type="checkbox" class="checkbox-input" value="{{$amenity->id}}" />
                    <div class="checkbox-tile d-flex flex-column justify-content-between h-100 ">
                        <div class="checkbox-icon">
                            <img src="{{$amenity->ConvertImageUrl()}}" alt="">
                        </div>
                        <div class="checkbox-label">{{$amenity->title}}</div>
                    </div>
                </label>
            </div>
        @endforeach
   </x-setup-place.step-2.choose-amenities>

   @elseif($this->CurrentStepValue == 7)
    <x-setup-place.step-2.upload-photos>
        @if (sizeOf($this->images_array_holder) > 0 )
        <div class="image-uploaded-row mt-1">
            <div class="row g-2">
                @foreach ($this->images_array_holder as $image)
                @empty($image)
                
                @else
                  <div class="col-lg-{{$loop->index == 0 ? '12' : '6'}}" style="height:350px;" wire:key={{$loop->index}}>
                    <div class="image-uploaded">
                        <img src="{{ $image->temporaryUrl() }}">
                        <button wire:click="RemoveImageHolderIndex({{$loop->index}})" class="trash-btn">
                            <img src="{{asset('Assets/images/icons/Trash.svg')}}" alt="">
                        </button>
                    </div>
                </div>
                @endempty
                @endforeach
                </div>
        </div>

        @endif
        <label x-on:dragover.prevent="dragover" x-on:drop.prevent="Drop($event)" class="custum-file-upload mt-4" for="file">
            <div class="icon d-flex justify-content-center align-items-center">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 64px; width: 64px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="M41.636 8.404l1.017 7.237 17.579 4.71a5 5 0 0 1 3.587 5.914l-.051.21-6.73 25.114A5.002 5.002 0 0 1 53 55.233V56a5 5 0 0 1-4.783 4.995L48 61H16a5 5 0 0 1-4.995-4.783L11 56V44.013l-1.69.239a5 5 0 0 1-5.612-4.042l-.034-.214L.045 14.25a5 5 0 0 1 4.041-5.612l.215-.035 31.688-4.454a5 5 0 0 1 5.647 4.256zm-20.49 39.373l-.14.131L13 55.914V56a3 3 0 0 0 2.824 2.995L16 59h21.42L25.149 47.812a3 3 0 0 0-4.004-.035zm16.501-9.903l-.139.136-9.417 9.778L40.387 59H48a3 3 0 0 0 2.995-2.824L51 56v-9.561l-9.3-8.556a3 3 0 0 0-4.053-.009zM53 34.614V53.19a3.003 3.003 0 0 0 2.054-1.944l.052-.174 2.475-9.235L53 34.614zM48 27H31.991c-.283.031-.571.032-.862 0H16a3 3 0 0 0-2.995 2.824L13 30v23.084l6.592-6.59a5 5 0 0 1 6.722-.318l.182.159.117.105 9.455-9.817a5 5 0 0 1 6.802-.374l.184.162L51 43.721V30a3 3 0 0 0-2.824-2.995L48 27zm-37 5.548l-5.363 7.118.007.052a3 3 0 0 0 3.388 2.553L11 41.994v-9.446zM25.18 15.954l-.05.169-2.38 8.876h5.336a4 4 0 1 1 6.955 0L48 25.001a5 5 0 0 1 4.995 4.783L53 30v.88l5.284 8.331 3.552-13.253a3 3 0 0 0-1.953-3.624l-.169-.05L28.804 14a3 3 0 0 0-3.623 1.953zM21 31a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM36.443 6.11l-.175.019-31.69 4.453a3 3 0 0 0-2.572 3.214l.02.175 3.217 22.894 5.833-7.74a5.002 5.002 0 0 1 4.707-4.12L16 25h4.68l2.519-9.395a5 5 0 0 1 5.913-3.587l.21.051 11.232 3.01-.898-6.397a3 3 0 0 0-3.213-2.573zm-6.811 16.395a2 2 0 0 0 1.64 2.496h.593a2 2 0 1 0-2.233-2.496zM10 13a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path></svg>                    </div>
            <div class="text text-center">
            <span>Drag your photos here</span>
                <p>Choose at least 5 photos</p>
            </div>
            <input wire:model.live="place_images" type="file" id="file"  multiple>
        </label>

    </x-setup-place.step-2.upload-photos>

    @elseif($this->CurrentStepValue == 8)
    <x-setup-place.step-2.create-title>

        <textarea wire:model.live.debounce.350ms="place_title" class="mt-3 {{Str::length($this->place_title) > $this->max_placeTitle ? 'border-danger' : ''}}" name="title_field" id="title_field" cols="50" rows="10"></textarea>
        <p> {{Str::length($this->place_title)}} / {{$this->max_placeTitle}}</p>

            @if(Str::length($this->place_title) == 0)
            @else
            @error('place_title')
            <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
            @enderror
            @endif
    </x-setup-place.step-2.create-title>

    @elseif($this->CurrentStepValue == 9)
    <x-setup-place.step-2.create-description>

        <textarea wire:model.live.debounce.350ms="place_description" class="mt-3 {{Str::length($this->place_description) > $this->max_placeDescription ? 'border-danger' : ''}}" name="description_field" id="description_field" cols="50" rows="10"></textarea>
        <p> {{Str::length($this->place_description)}} / {{$this->max_placeDescription}}</p>
    
        @if(Str::length($this->place_description) == 0)
        @else
        @error('place_description')
        <span class="text-danger" style="font-size: 14px">{{ $message }}</span> 
        @enderror
        @endif

    </x-setup-place.step-2.create-description>

    @elseif($this->CurrentStepValue == 10)
    <x-setup-place.step-3.finishing-proccess>
    </x-setup-place.step-3.finishing-proccess>

    @elseif($this->CurrentStepValue == 11)
    <x-setup-place.step-3.set-price>
        <div class="price-field-section w-25 mt-5">
            <span class="input d-flex">
                &#36;
                <input wire:model.live="place_price" data-testid="lys-base-price-input" autofocus="" maxfontsize="120" height="120"  autocomplete="off" inputmode="numeric" type="text" aria-describedby="">
            </span>
            <p class="before-tax">Guest price before tax  <span>&#36;</span>{{(float)$this->max_rate + (float)$this->place_price}}</p>
            @if ($this->place_price == 0)

               @else
               @error('place_price')
               <p class="price-error">{{$message}}</p>
               @enderror
            @endif
        </div>
    </x-setup-place.step-3.set-price>

    @elseif($this->CurrentStepValue == 12)
    <x-setup-place.step-3.publish-proccess>
        <div class="col-lg-5">
            <div class="overview-card" style="width: 22rem;">
                @foreach ($images_array_holder as $single_image)
                    @if ($loop->index == 0)
                        <img class="card-img-top" src="{{$single_image->temporaryUrl()}}" alt="Card image cap">
                    @endif
                @endforeach
                <div class="card-body mt-3">
                    <div class="place-title d-flex align-items-center justify-content-between">
                        <p>{{$this->place_title}}</p>
                        <div class="place-rating d-flex align-items-center justify-content-center">
                            <p class="me-1">New</p>
                            <img width="12px" height="12px" src="{{asset('Assets/images/Icons/rating-single-icon.svg')}}" alt="">
                        </div>
                    </div>
                    <div class="place-price-holder d-flex align-items-center mt-1">
                        <p class="place-price me-1"><span>&#36;</span>{{$this->place_price}} </p>
                        <p class="">night</p>
                    </div>
                </div>
              </div>
        </div>
    </x-setup-place.step-3.publish-proccess>

    @elseif($this->CurrentStepValue == 13)
    <x-setup-place.step-3.succsee-message>

    </x-setup-place.step-3.succsee-message>
    @endif

    @if ($this->CurrentStepValue == 1)
        <x-setup-place.bottom-action-bar>
            <x-slot:StartBtn>
                <div class="get-started-btn  d-flex justify-content-between align-items-center">
                    <button wire:click="NextStep" class="disabled d-flex justify-content-center align-items-center">
                        {{-- show on loading
                        <div class="dot-flashing"></div> --}}
                        Get started
                    </button>
                </div>
            </x-slot:StartBtn>
        </x-setup-place.bottom-action-bar>
        @elseif($this->CurrentStepValue == 13)


        @else
        <x-setup-place.bottom-action-bar>
            <x-slot:progressBarStep1>
                <div class="progress">
                    <div class="progress-bar w-{{$this->ProgressBarValue_Steps_1}}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </x-slot:progressBarStep1>

            <x-slot:progressBarStep2>
                <div class="progress">
                    <div class="progress-bar  w-{{$this->ProgressBarValue_Steps_2}}"  role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </x-slot:progressBarStep2>

            <x-slot:progressBarStep3>
                <div class="progress">
                    <div class="progress-bar   w-{{$this->ProgressBarValue_Steps_3}}"  role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </x-slot:progressBarStep3>

            <x-slot:Next_Prev_Btn>
                <div   class="next-step-btn  d-flex justify-content-between align-items-center">
                    <a wire:click="PrevStep" class="d-flex justify-content-center align-items-center">
                        <div wire:loading wire:target="PrevStep" class="dot-flashing"></div> 
                        <p wire:loading.remove wire:target="PrevStep">Back</p>
                    </a>
                    @if ($this->CurrentStepValue == 12)
                    <button wire:click="create_place" type="submit">
                        <div wire:loading wire:target="create_place" class="dot-flashing"></div> 
                        <p wire:loading.remove wire:target="create_place">Publish</p>
                    </button>
                    @else
                    <button {{ count($this->images_array_holder) < 1 && $this->CurrentStepValue == 7 ?'disabled' :''}}  
                        {{$this->CurrentStepValue == 8 && Str::length($this->place_title) == 0 || Str::length($this->place_title) > $this->max_placeTitle ? 'disabled' : '' }}
                        {{$this->CurrentStepValue == 9 && Str::length($this->place_description) == 0 || Str::length($this->place_description) > $this->max_placeDescription ? 'disabled' : '' }}
                        wire:click="NextStep"  class="d-flex justify-content-center align-items-center">
                        <!-- show on loading -->
                        <div wire:loading wire:target="NextStep" class="dot-flashing"></div> 
                        <p wire:loading.remove wire:target="NextStep">Next</p>
                    </button>
                    @endif
                </div>
            </x-slot:Next_Prev_Btn>
        </x-setup-place.bottom-action-bar>
        @endif


        <script>
            function DragAndDrop() {
              return{
                   dragover() {
                    // alert('draged');    
                  },
                  Drop(e){
                    // console.log(event.dataTransfer.files.length);
                    if(event.dataTransfer.files.length > 0){
                        const files = e.dataTransfer.files
                        this.uploadImages(files)
                    }
                  }
                  ,
                  uploadImages(files){
                      @this.uploadMultiple('place_images' , files)
                  }
              }
            }
        </script>

</div>
