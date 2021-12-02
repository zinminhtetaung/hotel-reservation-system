<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hotel Reservation System</title>
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="{{ asset('css/view.css') }}">

</head>

<body>

  @yield ('content')

  <div class="footer">
    <div class="container ">
      <div class=" address  clearfix">
      <div class="tb-box sp">
        <button class="ad-ttl1" onclick="openAddress('ttl1')"> ADDRESS</button>
        <button class="ad-ttl2" onclick="openAddress('ttl2')"> PARTNER</button>
        <button class="ad-ttl3" onclick="openAddress('ttl3')">CONTACT US</button>
        </div> 
        <ul class="office adttl" id="ttl1">
          <h3 class="office-title pc" > ADDRESS</h3>
          <li>No1. Yangon Myanmar</li>
          <li>+959 111 222 333</li>
          <li>info gp3@gmail.com</li>
        </ul>
        <ul class="partner adttl" id="ttl2">
          <h3 class="partner-title pc"> PARTNER</h3>
          <li>Sedona Hotel,Yangon</li>
          <li>Lottle Hotel,Yangon </li>
          <li>Novotel Hotel,Yangon </li>
        </ul>
        <ul class="contact adttl" id="ttl3">
          <h3 class="contact-title pc">CONTACT US</h3>
          <li>No1. Yangon Myanmar</li>
          <li>+959 111 222 333</li>
          <li>info gp3@gmail.com</li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      <p>Copyright@relax.com</p>
    </div>
  </div>
</body>
<script src="{{asset ('js/lib/jquery.min.js')}}"></script>
<script src="{{asset('js/common.js')}}"></script>
<script src="{{asset('js/menu.js')}}"></script>
</html>