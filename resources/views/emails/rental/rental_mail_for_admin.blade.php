<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rental Confirmation</title>
</head>

<body>
    <h1>New Rental Request</h1>

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

    <p>Thank you!!</p>
</body>

</html>
