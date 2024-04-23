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
        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li><a href="{{ route('user.profile') }}">Dashbaord</a></li>
                    <li><a href="{{ route('user.orders') }}">My Orders</a></li>
                    <li><a href="{{ route('user.settings') }}">Settings</a></li>
                    <li><a href="{{ route('user.logout') }}">Log out</a></li>
                </ul>
            </div>
            <div class="col-lg-8">
                <h4>Welcome to your dashboard</h4>
            </div>
        </div>
    </div>

</body>

</html>