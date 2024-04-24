@extends('layouts.frontendApp')
@section('content')

   

    <!--#f7ad1d-->
            <div class="container">
                <div class="Title">
                    <h1 style="color:#f7ad1d">Login</h1>
                </div>
                <div class="card-body" >
                    <form action="{{ route('user.login.verify') }}" method="POST">
                        @csrf
                        <input type="text"  placeholder="Email" name="email" 
                        style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px">
                        @error('email')
                        
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text"  placeholder="password" name="password"
                        style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px">
                        <button style="background-color: #f7ad1d;color:black;padding:5px 20px 5px 20px; border:0px;border-radius:10px">Login</button>
                    </form>
                </div>
     
            </div>

@endsection

