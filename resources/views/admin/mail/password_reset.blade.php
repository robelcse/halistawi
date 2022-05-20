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
  <title>Reset Password</title>

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
        <div class="col-lg-12 px-0">
          <div class="login_frm_wrap">
            <form action="{{ route('password_reset') }}" method="post">
              @csrf
              <div class="row justify-content-center">

                <div class="col-lg-6">
                  <div class="login_main_frm w-100">
                    <h3>Password Reset</h3>
                    @if(Session::has('error'))
                    <p style="color:red">{{ Session::get('error') }} </p>
                    @endif
                    @if(Session::has('message'))
                    <p style="color:#28a745">{{ Session::get('message') }} </p>
                    @endif

                    <div class="form-group">
                      <input type="hidden" name="request_token" value="{{ $request_token }}">
                      <label for="">New Password:</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" />
                      <span style="color:red">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm Password:</label>
                      <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Confirm password" name="password_confirmation" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn_submit">Reset Password</button>
                    </div>
                    <div class="register_btn">
                      <p>Go to <a href="{{ url('/login')}}">Login</a> Page </p>
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