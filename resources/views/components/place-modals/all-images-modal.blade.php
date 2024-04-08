@props(['name'])
<div
x-data = "{visiable : false , name : '{{$name}}'}"
x-show = "visiable"
x-on:open-modal.window = " visiable = ($event.detail.name === name)" 
x-on:close-modal.window = "visiable = false"
x-on:keydown.escape.window = "visiable = false"
style="display: none"
>



<div class="view-user-modal">
    <div id="user-details-holder" class="all_images_holder animate__animated animate__fadeInUpBig">
        <div id="close-modal" class="close-modal">
            <button x-on:click = "visiable = false" class="close-modal-btn"></button>
        </div>

        
        <div class="images-holder d-flex justify-content-center align-items-center">
            <div class="view_all_images w-50 ">
                @foreach ($this->single_place->images->chunk(3) as $single_image)
                <div class="row g-2 mb-2">
                @foreach ($single_image as $image)
                    <div class="col-lg-{{$loop->index  == 0 ? '12' : '6'}}">
                        <img width="100%" height="100%" style="object-fit: cover; aspect-ratio:1/0.8;" src="{{$image}}" alt="">
                    </div>
                @endforeach
                 </div>
                @endforeach
            </div>
        </div>
    </div>
    
</div>


</div>