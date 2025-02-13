<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <p>Dear {{ $vendor->name }},</p>
    <p>Your account has been created successfully. Please verify your email address to activate your account.</p>
    <p><a href="{{ url('vendor/confirm/'. $code) }}">Click here to verify</a></p>
    <p>Thank you.</p>

</body>

</html>
