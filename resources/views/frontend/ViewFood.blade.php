@extends('layouts.frontendApp')
@section('content')
@push('customCss')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked~label.star:before {
        color: #F62;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>
@endpush
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <img class="img-fluid rounded" src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->title }}">
        </div>
        <div class="col-lg-8 text-white">
            <h2 style="color: #f7ad1d"> {{ str($food->title)->headline() }}</h2>
            <p style="color: #f7ad1d" class="mb-1"><b>Price: {{ $food->price }}</b> TK</p>

            <div class="d-flex">
                <div class="reviews text-warning mb-3 position-relative">
                    <div class="front">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <div class="back position-absolute" style="top: 0;left:0">
                        @for ($i = 1; $i <= round($food->reviews->avg('review')); $i++)
                            <i class="fa-solid fa-star"></i>
                            @endfor
                    </div>

                </div>
                <p class="ms-2 text-warning"> ({{ round($food->reviews->avg('review')) . '.0' }})</p>
            </div>


            <p>{{ $food->detail }}</p>
        </div>
    </div>


    <div class="mt-5">
        <div class="heading" style="border-bottom: 2px solid #f7ad1d">
            <h4 class="text-warning bg-dark d-inline-block p-3 m-0">Reviews ({{ count($food->reviews) }})</h4>
        </div>


        <div class="reviewsCards">
            <div class="row">
                <div
                    class="col-lg-{{ auth('customer')->check() && !auth('customer')?->user()->givenReview($food->id) ? '8' : '12' }} text-white">
                    <div class="row">
                        @foreach ($food->reviews as $review)
                        <div class="col-lg-{{ !auth('customer')?->user()?->givenReview($food->id) ? '6' : '4' }}">
                            <div class="card bg-dark text-white my-3 p-3">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="rounded-circle" src="{{ "
                                            https://api.dicebear.com/8.x/initials/svg?seed=" . $review->user->name }}"
                                            alt="">
                                    </div>
                                    <div class="col">
                                        <h4>{{ str($review->user->name)->headline() }}</h4>
                                        <div class="reviews text-warning mb-3 position-relative">
                                            <div class="front">
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <div class="back position-absolute" style="top: 0;left:0">
                                                @for ($i = 1; $i <= round($review->review); $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                    @endfor
                                            </div>

                                        </div>
                                        <p>{{ ucfirst($review->cmt) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>
                @auth('customer')

                @if(!auth('customer')->user()->givenReview($food->id))
                <div class="col-lg-4 mt-3">
                    <form action="{{ route('menu.review.store', $food->id) }}" method="POST">
                        @csrf
                        <div style="width: fit-content">
                            <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                        <textarea name="cmt" placeholder="Write your Comment" class="my-input p-2"
                            style="height: 150px"></textarea>
                        <button class="btn btn-primary rounded-0    ">Submit Review</button>
                    </form>
                </div>
                @endif
                @endauth
            </div>
        </div>


    </div>


</div>
@endsection