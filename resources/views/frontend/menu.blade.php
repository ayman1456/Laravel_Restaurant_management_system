@extends('layouts.frontendApp')

@section('content')

<!---menu starts-->



<div class="container mt-5">

    @foreach ($foods as $food)


    <!--dish 1-->
    <div class="card col-lg-10 mt-3 mx-auto"
        style="background-color: black; box-shadow: 5px 5px 5px 5px rgba(43, 43, 43, 0.6)">

        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <a href="{{ route('menu.show.food', $food->id) }}"><img src="{{ asset('storage/'. $food->image) }}"
                            style="width: 100%; border-radius:7px"></a>
                </div>
                <div class="col-lg-9">
                    <div class="title">
                        <a href="{{ route('menu.show.food', $food->id) }}">
                            <h2 style="color: #f7ad1d">{{ $food->title }}</h2>
                        </a>
                    </div>
                    <div class="dishdetails">
                        <p style="color:rgb(167, 167, 167)">{{ $food->detail }}</p>
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
    <!--dish 1 ends-->
    @endforeach

</div>


@endsection