@extends('layouts.frontendApp')
@section('content')



<div class="container">
    <div class="col-lg-5 mx-auto mt-5">
        <div class="card bg-dark text-white">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form action="{{ route('user.register.verify') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control bg-dark text-white my-3" placeholder="User Name" name="name">
                    @error('name')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control bg-dark text-white my-3" placeholder="Phone" name="phone">
                    @error('phone')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control bg-dark text-white my-3" placeholder="Email" name="email">
                    @error('email')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control bg-dark text-white my-3" placeholder="Password"
                        name="password">
                    @error('password')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control bg-dark text-white my-3" placeholder="Password Confirm"
                        name="password_confirmation">
                    @error('password')
                    <span class="text-danger d-block">{{ $message }}</span>
                    @enderror

                    <button class="btn btn-primary mt-3 w-50 rounded-0 btn-lg">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection