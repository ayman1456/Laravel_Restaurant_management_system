<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
  <title>Create Employee</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
</head>

<body>




  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
      <div class="container-fluid">


        <div class="row g-0 auth-row">
          <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
              <div class="auth-cover">
                <div class="title text-center">
                  <h1 class="text-primary mb-10">Get Started</h1>
                  <p class="text-medium">
                    Start creating the best possible user experience
                    <br class="d-sm-block" />
                    for you customers.
                  </p>
                </div>
                <div class="cover-image">
                  <img src="{{ asset('backend/assets/images/auth/signin-image.svg') }}" alt="" />
                </div>
                <div class="shape-image">
                  <img src="assets/images/auth/shape.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-6">
            <div class="signup-wrapper">
              <div class="form-wrapper">
                <h6 class="mb-15">Create a new Employee </h6>
                <p class="text-sm mb-25">
                  Start creating the best possible user experience for you
                  customers.
                </p>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Name</label>
                        <input type="text" placeholder="Name" name="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" placeholder="Email" name="email" />
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Select a Role</label>
                        <select name="role" class="form-control">
                          @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ str($role->name)->headline() }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                          Sign Up
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>
               
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
    </section>
    <!-- ========== signin-section end ========== -->

    <!-- ========== footer start =========== -->
   
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>