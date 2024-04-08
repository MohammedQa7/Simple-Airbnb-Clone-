<!doctype html>
<html lang="en">

@include('layouts.includes.heading-tag')


<body>   
    <header>
        @include('layouts.includes.main-navbar')
        
        {{-- category_active when selected --}}
        @include('layouts.includes.category_nav')
    </header>

    
    {{-- All posts will be here --}}
    @livewire('place_list')

    {{-- There is a Bug about loading javascript while using LAZY --}}
    {{-- @livewire('place_list' , ['lazy' => true]) --}}

    {{-- Footer will be here --}}
    @include('layouts.includes.main-footer')



    {{-- Script --}}
    @include('layouts.includes.script')

</body>

</html>