<!DOCTYPE html>
<html>
<head>
    <title>Confirm Email</title>
</head>
<body>
    <h1>Booking Information (Confirmed)</h1>
    <p> Dear {{ $data['customer_name'] }} , <br> &nbsp;
    Your reservation from {{ $data['check_in'] }} 
    to {{ $data['check_out'] }} at Relax.com is confirmed with the infromation:</p>
    <p>Room Id: {{ $data['room_id'] }}</p>
    <p>Customer Name: {{ $data['customer_name'] }}</p>
    <p>Phone: {{ $data['phone'] }}</p>
    <p>Check In Time: {{ date('d/m/Y', strtotime($data['check_in'])) }}</p>
    <p>Check Out Time: {{ date('d/m/Y', strtotime($data['check_out'])) }}</p>

    <p >For More Information,feel free to contact us</p>
    <a href="tel:09401245003">Phone: 09401245003</a>
    <p >Thanks for book with us, Relax.com<p>
</body>
</html>