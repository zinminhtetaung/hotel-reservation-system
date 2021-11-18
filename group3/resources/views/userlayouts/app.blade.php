<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>

@yield ('content')

<div class="footer">
       <div class="container clearfix">
       <ul class="office">
            <h3  class="office-title">HEAD  OFFICE ADDRESS</h3>
            <li>No1. Yangon Myanmar</li>
            <li>+959 111 222 333</li>
            <li>info gp3@gmail.com</li>
        </ul>
        <ul class="partner">
            <h3 class="partner-title">OUR  PARTNER</h3>
            <li>Sedona</li>
            <li>Lottle</li>
            <li>Novotel</li>
        </ul>
        <ul class="contact">
            <h3 class="contact-title">CONTACT US</h3>
            <li>No1. Yangon Myanmar</li>
            <li>+959 111 222 333</li>
            <li>info gp3@gmail.com</li>
        </ul>
       </div>
       <div class="copyright">
           <p>Copyright@relax.com</p>
       </div>
</div>
</body>
</html>