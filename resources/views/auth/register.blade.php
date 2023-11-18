

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard_assets')}}/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('dashboard_assets')}}/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('dashboard_assets')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{asset('dashboard_assets')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('dashboard_assets')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('dashboard_assets')}}/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h4 class=" text-gradient-dark ">Welcome Dear Bloger!!</h4>
                  <p class="mb-0">Please Sign Up for access Dashboard</p>
                </div>
                <div class="card-body">
                    <form role="form text-left"  method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" aria-label="Name" aria-describedby="email-addon" name="name" >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">


                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon">


                      </div>
                      <div class="form-check form-check-info text-left">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>


                        <label class="form-check-label" for="flexCheckDefault">
                          I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                        </label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                      </div>
                      <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
                    </form>
                  </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{asset('dashboard_assets')}}/assets/img/curved-images/curved14.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{asset('dashboard_assets')}}/assets/js/core/popper.min.js"></script>
  <script src="{{asset('dashboard_assets')}}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{asset('dashboard_assets')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{asset('dashboard_assets')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('dashboard_assets')}}/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
