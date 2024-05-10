@extends('layouts.frontendApp')

@section('content')
    <section id="banners">

        @foreach ($banners as $banner) 
        <div class="bannerSlide">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6">
                        <h3>{{ $banner->title }} </h3>
                        <p>
                           {{ $banner->detail }}
                        </p>
                        <a class="btn btn-primary rounded-0" href="{{ route('menu.show.food', $banner->id) }}">Order Now !</a>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('storage/'. $banner->image) }}" alt="" class="d-block w-100">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
   
   
    </section>
@endsection


@push('customJs')
    <script>
        $('#banners').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            dots: false,
        })
    </script>
@endpush