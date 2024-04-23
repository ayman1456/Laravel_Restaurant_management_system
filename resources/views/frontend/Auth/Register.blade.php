<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
</head>

<body>

    <div class="container">
        <div class="col-lg-5 mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form action="{{ route('user.register.verify') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="User Name" name="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" placeholder="Password" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" placeholder="Password Confirm"
                            name="password_confirmation">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>