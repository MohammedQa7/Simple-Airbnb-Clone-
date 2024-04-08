<x-category-component.category>
    @foreach ($all_categories as $category)
    <a wire:navigate href="{{URL('homepage?' . Arr::query(['selected_category'  => $category->slug]))}}" wire:key="{{$category->id}}">
        <div class="item category_item  3 mt-3">
            <div class="category_image d-flex justify-content-center align-items-center ">
                <img src="{{$category->ConvertImageUrl()}}" alt="">
            </div>
            <p class="mt-1 mb-2 text-center">{{$category->title}}</p>
        </div>
    </a>
    @endforeach
</x-category-component.category>