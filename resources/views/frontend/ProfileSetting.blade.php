@extends('layouts.frontendApp')
@section('content')

            <!--content-->
            <div class="col-lg-8  mx-auto mt-5">
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mx-auto " style="width: fit-content">
                        <label for="profile">
                            <img src="{{ getProfileImg() }}" alt="" class="imagePreview"
                                style="width: 160px;height:160px; border-radius:50%;margin-bottom: 20px;cursor:pointer;">
                        </label>
                        <input type="file" class="d-none" id="profile" name="profile">
                    </div>


                    <div class="mx-auto " style="width:fit-content" >
                        
                        <div class="my-2">
                            <input type="text" placeholder="Name" name="name"
                            value="{{ auth('customer')->user()->name }}"
                                style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white">
                        </div>
                       
                        <div class="my-2">
                            <input type="email" placeholder="Email" name="email" readonly
                            value="{{ auth('customer')->user()->email }}"
                                style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white">
                        </div>
                        <div class="my-2">
                            <input type="email" placeholder="Phone" name="phone" readonly
                            value="{{ auth('customer')->user()->phone }}"
                                style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white">
                        </div>
                        <div class="my-2">
                            <textarea
                            style="background-color:black; border:1px solid #6A6A6A; width:400px; border-radius:10px;padding:5px;color:white!important "
                            name="address" placeholder="Address"
                            >
                            {{ auth('customer')->user()->address }}
                            </textarea>
                        </div>
                        <div class="buttom mx-auto" style="width: fit-content">
                        <button class="my-2 mx-auto"
                        style="background-color: #f7ad1d;color:black;padding:5px 20px 5px 20px; border:0px;border-radius:10px;color:white">Save changes</button>
                        </div>
                    </div>

                    


                </form>
            </div>
      
  

    <script>
        let foodImageInput = document.querySelector('#profile')
                let previewImg = document.querySelector('.imagePreview')
                foodImageInput.addEventListener("change", function (event) {
                  let url =  URL.createObjectURL(event.target.files[0])
                  previewImg.src = url
                })

    </script>

<!--Content end-->
@endsection