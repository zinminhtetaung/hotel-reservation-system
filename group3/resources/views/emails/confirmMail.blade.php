<!DOCTYPE html>
<html>
<head>
    <title>Confirm Email</title>
</head>
<body>
    <h1>Booking Information(Confirmed)</h1>
    <p>Room Id: {{ $data['room_id'] }}</p>
    <p>Customer Name: {{ $data['customer_name'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
    <p>Check In: {{ $data['check_in'] }}</p>
    <p>Check Out: {{ $data['check_out'] }}</p>
</body>
</html>