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
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="profile">
                            <img src="{{ getProfileImg() }}" alt="" class="imagePreview"
                                style="width: 80px;height:80px; border-radius:50%;margin-bottom: 20px;cursor:pointer;">
                        </label>
                        <input type="file" class="d-none" id="profile" name="profile">
                    </div>


                    <div class="row">
                        <div class="col-lg-6"><input type="text" name="name" class="form-control"
                                value="{{ auth('customer')->user()->name }}" placeholder="Your Name"></div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6"><input type="text" name="email" class="form-control" readonly
                                value="{{ auth('customer')->user()->email }}" placeholder="Your Name"></div>
                        <div class="col-lg-6"><input type="email" name="phone" class="form-control" readonly
                                value="{{ auth('customer')->user()->phone }}" placeholder="Your email"></div>
                    </div>

                    <textarea name="address" class="form-control"
                        placeholder="Address">{{ auth('customer')->user()->address }}</textarea>
                    <button class=" btn btn-primary mt-2 ">Save Changes</button>


                </form>
            </div>
        </div>
    </div>

    <script>
        let foodImageInput = document.querySelector('#profile')
                let previewImg = document.querySelector('.imagePreview')
                foodImageInput.addEventListener("change", function (event) {
                  let url =  URL.createObjectURL(event.target.files[0])
                  previewImg.src = url
                })

    </script>


</body>

</html>