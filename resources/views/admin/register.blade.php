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
  <title>Register</title>

  <link rel="icon" href="{{ asset('public/assets/images/favicon.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">
</head>

<body>

  <!-- login section start -->
  <section class="login_section regis_section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <div class="login_frm_wrap">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <div class="login_main_frm regis_main_frm w-100">
                    <div class="text-center">
                      <h3>Get Start</h3>
                      <p>Start a new journy with us</p>
                      @if(Session::has('error_msg'))
                      <p style="color: red;">{{ Session::get('error_msg') }}</p>
                      @endif
                      @if(Session::has('success_msg'))
                      <p style="color: green;">{{ Session::get('success_msg') }}</p>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
                      <span style="color:red">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="nid">National ID</label>
                      <input type="text" class="form-control" id="nid" placeholder="Enter NID" name="national_id" value="{{ old('national_id') }}">
                      <span style="color:red">{{ $errors->first('national_id') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="mobile_number">Mobile Number</label>
                      <input type="text" class="form-control" id="mobile_number" placeholder="Enter mobile" name="mobile_number" value="{{ old('mobile_number') }}">
                      <span style="color:red">{{ $errors->first('mobile_number') }}</span>
                    </div>
                    <div class="row">
                      <div class="col-lg-7">
                        <div class="form-group mt-0">
                          <label for="date_of_birth">Date of Birth</label>
                          <input type="date" class="form-control" id="date_of_birth" placeholder="dd/mm/yyyy" name="date_of_birth" value="{{ old('date_of_birth') }}">
                          
                          <span style="color:red">{{ $errors->first('date_of_birth') }}</span>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="form-group mt-0">
                          <label for="">Gender</label>
                          <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ?'selected':'' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ?'selected':'' }}>Female</option>
                            <option value="others" {{ old('gender') == 'others' ?'selected':'' }}>Others</option>
                          </select>
                          <span style="color:red">{{ $errors->first('gender') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-0">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                      <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group mt-0">
                      <label for="file">Photo</label>
                      <input type="file" class="form-control" id="photo" name="photo">
                      <span style="color:red">{{ $errors->first('photo') }}</span>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group mt-0">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                          <span style="color:red">{{ $errors->first('password') }}</span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group mt-0">
                          <label for="password_confirmation">Confirm Password</label>
                          <input type="password" class="form-control" id="password_confirmation" placeholder="Enter Password" name="password_confirmation">
                          <span style="color:red">{{ $errors->first('password_confirmation') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn_submit">Sign Up</button>
                    </div>
                    <div class="register_btn">
                      <p>Already have an account? <a href="{{ url('/login')}}">Sign In</a></p>
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