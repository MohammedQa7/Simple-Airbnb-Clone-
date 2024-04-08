<!doctype html>
<html lang="en">

@include('layouts.includes.heading-tag')

<body>

    <header>
        @include('layouts.includes.secondary-nav')
    </header>

    
    @livewire('setup-place-livewire')



    @livewireStyles




    {{-- <x-setup-place.step-1.choose-Category>
        <div class="col-lg-4 col-md-6 col-6">
            <a href="" class="category-btn-holder">
                <div class="category-btn ">
                    <svg id="l_d_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45 45" width="45" height="45" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);"><defs id="l_d_6"><clipPath id="__lottie_element_2"><rect id="l_d_9" width="45" height="45" x="0" y="0"></rect></clipPath></defs><g id="l_d_7" clip-path="url(#__lottie_element_2)"><g id="l_d_15" transform="matrix(1,0,0,1,0.875,8)" opacity="1" style="display: block;"><g id="l_d_19" opacity="1" transform="matrix(1,0,0,1,16,14.5)"><path id="l_d_20" fill="rgb(34,34,34)" fill-opacity="1" d=" M1.9539999961853027,-13.718999862670898 C1.9539999961853027,-13.718999862670898 2.128999948501587,-13.555000305175781 2.128999948501587,-13.555000305175781 C2.128999948501587,-13.555000305175781 15.201000213623047,-0.7129999995231628 15.201000213623047,-0.7129999995231628 C15.201000213623047,-0.7129999995231628 13.798999786376953,0.7129999995231628 13.798999786376953,0.7129999995231628 C13.798999786376953,0.7129999995231628 11.99899959564209,-1.0549999475479126 11.99899959564209,-1.0549999475479126 C11.99899959564209,-1.0549999475479126 12,12.5 12,12.5 C12,13.553999900817871 11.184000015258789,14.418000221252441 10.14900016784668,14.494000434875488 C10.14900016784668,14.494000434875488 10,14.5 10,14.5 C10,14.5 -10,14.5 -10,14.5 C-11.053999900817871,14.5 -11.918000221252441,13.684000015258789 -11.994999885559082,12.64900016784668 C-11.994999885559082,12.64900016784668 -12,12.5 -12,12.5 C-12,12.5 -12.00100040435791,-1.0540000200271606 -12.00100040435791,-1.0540000200271606 C-12.00100040435791,-1.0540000200271606 -13.798999786376953,0.7129999995231628 -13.798999786376953,0.7129999995231628 C-13.798999786376953,0.7129999995231628 -15.201000213623047,-0.7129999995231628 -15.201000213623047,-0.7129999995231628 C-15.201000213623047,-0.7129999995231628 -2.1429998874664307,-13.541999816894531 -2.1429998874664307,-13.541999816894531 C-1.0299999713897705,-14.678000450134277 0.7649999856948853,-14.741000175476074 1.9539999961853027,-13.718999862670898z M-0.6320000290870667,-12.21500015258789 C-0.6320000290870667,-12.21500015258789 -0.7279999852180481,-12.128000259399414 -0.7279999852180481,-12.128000259399414 C-0.7279999852180481,-12.128000259399414 -10.00100040435791,-3.0190000534057617 -10.00100040435791,-3.0190000534057617 C-10.00100040435791,-3.0190000534057617 -10,12.5 -10,12.5 C-10,12.5 -5.000999927520752,12.49899959564209 -5.000999927520752,12.49899959564209 C-5.000999927520752,12.49899959564209 -5,2.5 -5,2.5 C-5,1.4459999799728394 -4.184000015258789,0.5820000171661377 -3.1489999294281006,0.5049999952316284 C-3.1489999294281006,0.5049999952316284 -3,0.5 -3,0.5 C-3,0.5 3,0.5 3,0.5 C4.053999900817871,0.5 4.918000221252441,1.315999984741211 4.994999885559082,2.3510000705718994 C4.994999885559082,2.3510000705718994 5,2.5 5,2.5 C5,2.5 4.999000072479248,12.49899959564209 4.999000072479248,12.49899959564209 C4.999000072479248,12.49899959564209 10,12.5 10,12.5 C10,12.5 9.99899959564209,-3.0199999809265137 9.99899959564209,-3.0199999809265137 C9.99899959564209,-3.0199999809265137 0.699999988079071,-12.156000137329102 0.699999988079071,-12.156000137329102 C0.335999995470047,-12.512999534606934 -0.23199999332427979,-12.53499984741211 -0.6320000290870667,-12.21500015258789z M3,2.5 C3,2.5 -3,2.5 -3,2.5 C-3,2.5 -3.000999927520752,12.49899959564209 -3.000999927520752,12.49899959564209 C-3.000999927520752,12.49899959564209 2.999000072479248,12.49899959564209 2.999000072479248,12.49899959564209 C2.999000072479248,12.49899959564209 3,2.5 3,2.5z"></path></g></g><g id="l_d_10" style="display: none;"><rect id="l_d_14" width="120" height="120" fill="#ffffff"></rect></g></g></svg>
                    <p>House</p>
                </div>
            </a>
        </div>
    </x-setup-place.step-1.choose-Category>
   --}}
   
   
{{--    

    <x-setup-place.step-1.share-basics>

        <x-slot:increment_btn_guest>
            <button>
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <p class="increment-value me-3 ms-3">1</p>
            <button>
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_btn_guest>

        <x-slot:increment_btn_bedrooms>
            <button>
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <p class="increment-value me-3 ms-3">1</p>
            <button>
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_btn_bedrooms>

        <x-slot:increment_btn_beds>
                <button>
                    <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
                </button>
                <p class="increment-value me-3 ms-3">1</p>
                <button>
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
                </button>
        </x-slot:increment_btn_beds>

        <x-slot:increment_bathrooms>
            <button>
                <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m.75 6.75h10.5v-1.5h-10.5z"></path></svg>
            </button>
            <p class="increment-value me-3 ms-3">1</p>
            <button>
            <svg viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 12px; width: 12px; fill: var(--Grey);" aria-hidden="true" role="presentation" focusable="false"><path d="m6.75.75v4.5h4.5v1.5h-4.5v4.5h-1.5v-4.5h-4.5v-1.5h4.5v-4.5z"></path></svg> 
            </button>
        </x-slot:increment_bathrooms>

    </x-setup-place.step-1.share-basics>
  

    <x-setup-place.step-2.welcome-setup-2></x-setup-place.step-2.welcome-setup-2>

  
       
    <x-setup-place.step-2.upload-photos>
        <label class="custum-file-upload mt-4" for="file">
            <div class="icon d-flex justify-content-center align-items-center">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" style="display: block; height: 64px; width: 64px; fill: currentcolor;" aria-hidden="true" role="presentation" focusable="false"><path d="M41.636 8.404l1.017 7.237 17.579 4.71a5 5 0 0 1 3.587 5.914l-.051.21-6.73 25.114A5.002 5.002 0 0 1 53 55.233V56a5 5 0 0 1-4.783 4.995L48 61H16a5 5 0 0 1-4.995-4.783L11 56V44.013l-1.69.239a5 5 0 0 1-5.612-4.042l-.034-.214L.045 14.25a5 5 0 0 1 4.041-5.612l.215-.035 31.688-4.454a5 5 0 0 1 5.647 4.256zm-20.49 39.373l-.14.131L13 55.914V56a3 3 0 0 0 2.824 2.995L16 59h21.42L25.149 47.812a3 3 0 0 0-4.004-.035zm16.501-9.903l-.139.136-9.417 9.778L40.387 59H48a3 3 0 0 0 2.995-2.824L51 56v-9.561l-9.3-8.556a3 3 0 0 0-4.053-.009zM53 34.614V53.19a3.003 3.003 0 0 0 2.054-1.944l.052-.174 2.475-9.235L53 34.614zM48 27H31.991c-.283.031-.571.032-.862 0H16a3 3 0 0 0-2.995 2.824L13 30v23.084l6.592-6.59a5 5 0 0 1 6.722-.318l.182.159.117.105 9.455-9.817a5 5 0 0 1 6.802-.374l.184.162L51 43.721V30a3 3 0 0 0-2.824-2.995L48 27zm-37 5.548l-5.363 7.118.007.052a3 3 0 0 0 3.388 2.553L11 41.994v-9.446zM25.18 15.954l-.05.169-2.38 8.876h5.336a4 4 0 1 1 6.955 0L48 25.001a5 5 0 0 1 4.995 4.783L53 30v.88l5.284 8.331 3.552-13.253a3 3 0 0 0-1.953-3.624l-.169-.05L28.804 14a3 3 0 0 0-3.623 1.953zM21 31a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM36.443 6.11l-.175.019-31.69 4.453a3 3 0 0 0-2.572 3.214l.02.175 3.217 22.894 5.833-7.74a5.002 5.002 0 0 1 4.707-4.12L16 25h4.68l2.519-9.395a5 5 0 0 1 5.913-3.587l.21.051 11.232 3.01-.898-6.397a3 3 0 0 0-3.213-2.573zm-6.811 16.395a2 2 0 0 0 1.64 2.496h.593a2 2 0 1 0-2.233-2.496zM10 13a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm0 2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path></svg>                    </div>
            <div class="text text-center">
               <span>Drag your photos here</span>
                <p>Choose at least 5 photos</p>
               </div>
               <input type="file" id="file">
        </label>
    </x-setup-place.step-2.upload-photos>
 
    
   
    
<x-setup-place.step-2.create-title>
    <textarea class="mt-3" name="title_field" id="" cols="50" rows="10"></textarea>
</x-setup-place.step-2.create-title>

<x-setup-place.step-2.create-description>
    <textarea class="mt-3" name="title_field" id="" cols="50" rows="10"></textarea>
</x-setup-place.step-2.create-description>

    
    
 
<x-setup-place.step-3.finishing-proccess>
</x-setup-place.step-3.finishing-proccess>

<x-setup-place.step-3.set-price>
    <div class="price-field-section w-25 mt-5">
        <span class="input d-flex">
            &#36;
            <input data-testid="lys-base-price-input" autofocus="" maxfontsize="120" height="120"  autocomplete="off" inputmode="numeric" type="text" aria-describedby="" value="23">
        </span>
        <p class="before-tax">Guest price before tax  <span>&#36;</span>23</p>
    </div>
</x-setup-place.step-3.set-price>
      --}}

    
    <!-- step three setting your price -->
    
     @include('layouts.includes.script')


</body>

</html>