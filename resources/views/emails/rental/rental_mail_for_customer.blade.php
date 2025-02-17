<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rental Confirmation</title>
</head>

<body>
    <h1>Rental Confirmation</h1>
    <p>Dear {{ $rental->user->name }},</p>

    <p>Your rental has been successfully created. Here are the details:</p>

    <table border="1" cellpadding="10">
        <tr>
            <th>Car ID</th>
            <td>{{ $rental->car_id }}</td>
        </tr>
        <tr>
            <th>User Name</th>
            <td>{{ $rental->user->name }}</td>
        </tr>
        <tr>
            <th>User Phone</th>
            <td>{{ $rental->user->phone }}</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $rental->start_date }}</td>
        </tr>
        <tr>
            <th>End Date</th>
            <td>{{ $rental->end_date }}</td>
        </tr>
        <tr>
            <th>Total Cost</th>
            <td>{{ number_format($rental->total_cost, 2) }}</td>
        </tr>
    </table>

    <p>Thank you for choosing our service!</p>
</body>

</html>
