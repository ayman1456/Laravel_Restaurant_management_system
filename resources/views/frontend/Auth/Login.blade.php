@extends('layouts.frontendApp')
@section('content')



<!--#f7ad1d-->
<div class="container">
    <div class="col-lg-5 mx-auto mt-5 text-center">
        <div class="Title text-start mx-auto" style="width: fit-content">
            <h1 style="color:#f7ad1d">Login</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('user.login.verify') }}" method="POST">
                @csrf
                <div class="my-2">
                    <input type="text" placeholder="Email" name="email"
                        style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white">
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="my-2">
                    <input type="password" placeholder="password" name="password"
                        style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white">
                </div>
                <button class="my-2"
                    style="background-color: #f7ad1d;color:black;padding:11px 20px 11px 20px; border:0px;border-radius:10px">Login</button>
            </form>
        </div>
    </div>

</div>

@endsection