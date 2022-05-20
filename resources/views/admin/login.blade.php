<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Login Page">
  <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <title>Login</title>

  <link rel="icon" href="{{ asset('public/assets/images/favicon.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">
</head>

<body>

  <!-- login section start -->
  <section class="login_section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="login_frm_wrap">
            <form action="{{ route('login') }}" method="post">

              @csrf
              <div class="row">
                <div class="col-lg-7">
                  <div class="login_side_img">
                    <img src="{{ asset('public/assets/images/doctors/doctor.png')}}" alt="a" class="img-fluid">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="login_main_frm w-100">
                    <h3>Welcome Back :)</h3>
                    <p>To keep connected with us please login  with your <br> personal information</p>
                    @if(Session::has('error'))
                    <p style="color: red;">{{ Session::get('error') }}</p>
                    @endif
                    @if(Session::has('message'))
                    <p style="color:#28a745">{{ Session::get('message') }}</p>
                    @endif
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" id="email" value="{{ old('email')}}" placeholder="Enter email" name="email">
                      <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                      <span style="color:red">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form_group d-flex justify-content-between">
                      <!-- <span><input type="checkbox" class="mr-2">Remembar Me</span> -->
                        <a href="{{ route('reset_link_page') }}">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn_submit">Sign In</button>
                    </div>
                    <div class="register_btn">
                      <p>Don't have an account? <a href="{{ url('/register')}}">Sign Up</a></p>
                    </div>
                  </div>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- login section end -->


</body>

</html>