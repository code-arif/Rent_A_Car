<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Confirmation Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #28a745;
        }
        p {
            font-size: 16px;
            color: #333;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🎉 Congratulations, {{ $name }}! 🎉</h2>
        <p>Your account has been successfully confirmed. You are now a verified vendor on our platform.</p>
        <p>We are excited to have you on board! Start exploring and managing your vendor profile now.</p>

        <a href="{{ route('show.admin.login') }}" class="btn">Login to Your Account</a>

        <p class="footer">If you did not request this confirmation, please ignore this email.</p>
    </div>
</body>
</html>
