<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change status</title>
</head>
<body>
    <p>Dear {{ $vendorName }},</p>
    <p>Your account status has been changed to: <strong>{{ $status }}</strong>.</p>
    <p>
        @if($status == 'active')
            Congratulations! You can now access all vendor privileges.
        @else
            Sorry, your account has been deactivated. Please contact support if you have any queries.
        @endif
    </p>
    <p>Thank you!</p>

</body>
</html>
