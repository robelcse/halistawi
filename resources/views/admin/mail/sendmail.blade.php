<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>

<body>

    <center>

        <h2>Hi, {{ $user->name }}</h2>
        <p>Please note the attached link to reset your password.</p>
        <a href="{{ url('password/reset/?token='.$user->password_reset_toekn) }}">{{ $user->password_reset_toekn }}</a>
    </center>

</body>

</html>