@props(['name'])
<div
x-data = "{visiable : false , name : '{{$name}}'}"
x-show = "visiable"
x-on:open-modal.window = " visiable = ($event.detail.name === name)" 
x-on:close-modal.window = "visiable = false"
x-on:keydown.escape.window = "visiable = false"
style="display: none"
>

<div class="view-user-modal ">
    <div id="user-details-holder" class="amenity-details-holder animate__animated animate__fadeIn">
        <div id="close-modal" class="container close-modal ">
            <button x-on:click = "visiable = false" class="close-modal-btn"></button>
        </div>
    
        <div class="container amenity-header">
            <h1>What this place offers</h1>
        </div>
       
        @foreach ($this->single_place->amenity as $single_amenity)
          <div class="container">
            <div class=" amenity-content border-bottom d-flex align-items-center">
                <img class="me-2" src="{{$single_amenity->ConvertImageUrl()}}" alt="">
                <p>{{$single_amenity->title}}</p>
            </div>
          </div>
        @endforeach
    </div>
</div>
</div>