<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dawat</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css'
        integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=='
        crossorigin='anonymous' />
        <style>
            body{
                background-color:black;
                font-family: 'Times New Roman', Times, serif;
            }
            
::placeholder {
  color:#6A6A6A;
  opacity: 1; /* Firefox */
}

::-ms-input-placeholder { /* Edge 12-18 */
  color: red;
}

            </style>
</head>

<body>


    <!--navbar starts-->
    <div class="navshadow" style="box-shadow: 5px 5px 5px 5px rgba(43, 43, 43, 0.3); position:sticky;top:0;left:0;z-index:9999;">
    <!--first row-->
    <nav class="navbar navbar-expand-lg  " style="display:block; justify-content:space-between;  background-color:black; ">
        <div class="container-fluid  mx-auto " style="width: fit-content;">
          <div class="collapse navbar-collapse" id="navbarNav">
            
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><img src="{{ asset('storage/logo/dawat.png') }} " style="width: 100px"></a>
              
          </div>
        </div>
      </nav>
      <!--first row ends-->
    <nav class="navbar navbar-expand-lg " style="display:block; justify-content:space-between; background-color:black; )">
        <div class="container-fluid" style="width: fit-content">
          <div class="collapse navbar-collapse mx-5" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}" style="color: #f7ad1d" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('menu.show') }}" style="color: #f7ad1d">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.login') }}" style="color: #f7ad1d">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('user.register') }}" style="color: #f7ad1d">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <!--navbar ends-->


 @yield('content')
    
   


</body>

</html>