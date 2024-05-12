<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    
    <!-- ======== Preloader =========== -->

   

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
     

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="text-center ">
                <div class="title">
                  <h2>Sign in</h2>
                </div>
              </div>
            
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Welcome Back</h1>
                    <p class="text-medium">
                      Sign in to your Existing account to continue
                    </p>
                  </div>
                  <div class="cover-image">
                    <img src="{{ asset('backend/assets/images/auth/signin-image.svg') }}" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="{{ asset('backend/assets/images/auth/shape.svg') }}" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signin-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">Sign In Form</h6>
                  <p class="text-sm mb-25">
                    Start creating the best possible user experience for you
                    customers.
                  </p>
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row">
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
                          <input type="password" placeholder="Password" name="password"/>
                          @error('password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    
                      <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                          <a href="reset-password.html" class="hover-underline">
                            Forgot Password?
                          </a>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center">
                            Sign In
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  <div class="singin-option pt-40">
                    <p class="text-sm text-medium text-center text-gray">
                      Easy Sign In With
                    </p>
                   
                    <p class="text-sm text-medium text-dark text-center">
                      Don’t have any account yet?
                      <a href="signup.html">Create an account</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

     
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
