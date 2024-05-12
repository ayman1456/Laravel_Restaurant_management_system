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


    <section id="latestFoods" style="margin: 60px">
        <div class="container">


            <h2 class="text-center text-white">Our New Items</h2>

            <div class="row">
                @foreach ($foods as $food)
                    
                <div class="col-lg-3">
                    <div class="card col-lg-10 mt-3 mx-auto"
                    style="background-color: black; box-shadow: 5px 5px 5px 5px rgba(43, 43, 43, 0.6)">
            
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <a href="{{ route('menu.show.food', $food->id) }}"><img  src="{{ asset('storage/'. $food->image) }}"
                                        style="width: 100%; height:200px;object-fit:cover; border-radius:7px"></a>
                            </div>
                            <div class="col-lg-12">
                                <div class="title">
                                    <a href="{{ route('menu.show.food', $food->id) }}">
                                        <h2 style="color: #f7ad1d">{{ $food->title }}</h2>
                                    </a>
                                </div>
                                <div class="dishdetails">
                                    <p style="color:rgb(167, 167, 167)">{{ str($food->detail)->substr(0, 15).'...' }}</p>
                                </div>
                                <div class="priceandbutton " style="display:flex; justify-content:space-between;">
                                    <h5 style="color: #f7ad1d"> {{ $food->price }}Tk</h5>
                                    <a href="{{ route('cart.add', $food->id) }}"
                                        style="display:inline-block; text-decoration:none;background-color:#f7ad1d; color:black; border-radius:5px;padding:10px 23px">
                                        Add Now <i class="fa-solid fa-basket-shopping"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
                @endforeach

            </div>
        </div>
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