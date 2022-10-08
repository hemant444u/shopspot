
@extends('frontend.layouts.app')

@section('content')
@include('frontend.inc.footer-links.style')
<body>


    <div class="container">
        <h1 class="text-center about-us py-4">About us</h1>
        {{-- <img src="./img/shopspot-about-us.jpg" class="img-fluid"> --}}
        <img src="https://shopspot.in/wp-content/uploads/2020/06/shopspot-about-us-scaled.jpg" class="img-fluid">
    </div>
    @include('frontend.inc.footer-links.site-footer')
</body>
@endsection