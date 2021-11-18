@extends('userlayouts.app')
@section ('content')
<div class="header">
   
        <div class="header-in clearfix">
            <h1 class="logo"> <a href=""><img src="{{ asset('image/logo.jpeg') }}" alt="logo"></a></h1>
            <ul class="nav">
                <li><a href="{{url('user/home')}}" class="active">Home</a></li>
                <li><a href="{{route('hotelview')}}">Hotel</a></li>
                <li> <a href="{{route('roomuserview')}}">Room</a></li>
                <li><a href="">Login</a></li>
            </ul>
        </div>
</div>
<div class="home-content1">
    <img class="homecnt1-img" src="{{ asset('image/novotel_view.jpg') }}" alt="home-img">
    <div class=" home-img ">
        <div class="container clearfix">
            <div class="card1">
                <img class="homehotel-img" src="{{asset('image/Lotte.jpeg')}}" alt="lottle">
                <p>Lotte</p>
            </div>
            <div class="card2">
                <img class="homehotel-img" src="{{asset('image/Novotel.jpg')}}" alt="novotel">
                <p>Novotel</p>
            </div>
            <div class="card3">
                <img class="homehotel-img" src="{{asset('image/Sedona.jpg')}}" alt="sedona">
                <p>Sedona</p>
            </div>
        </div>
    </div>
</div>
<div class="home-content2">
    <div class="container clearfix">
        <h2>ROOM   INFORMATION</h2>
        <div class="cnt2-img">
            <div class="cnt2-card1">
                <img src="{{asset('image/Novotel_double.jpg')}}" alt="room">
                <p>N1</p>
            </div>
            <div class="cnt2-card2">
                <img src="{{asset('image/Novotel_twin.jpg')}}" alt="room">
                <p>N2</p>
            </div>
            <div class="cnt2-card2">
                <img src="{{asset('image/Lotte_sutie.jpg')}}" alt="room">
                <p>L1</p>
            </div>
            <div class="cnt2-card2">
                <img src="{{asset('image/Sedona_suite.jpg')}}" alt="room">
                <p>S1</p>
            </div>
            <div class="cnt2-card1">
                <img src="{{asset('image/lotte_double.jpg')}}" alt="room">
                <p>L2</p>
            </div>
            <div class="cnt2-card2">
                <img src="{{asset('image/Sedona_suite.jpg')}}" alt="room">
                <p>S2</p>
            </div>
            <div class="cnt2-card2">
                <img src="{{asset('image/Lotte_sutie.jpg')}}" alt="room">
                <p>L3</p>
            </div>
            <div class="cnt2-card2">
                <img class="homehotel-img" src="{{asset('image/Novotel_double.jpg')}}" alt="room">
                <p>N3</p>
            </div>
        </div>

    </div>
</div>
<div class="home-content3">
    <div class="container clearfix">
        <div class="map">
            <h2>CHOOSE HOTEL BY REGION</h2>
            <img src="{{asset('image/yangon_map.png')}}" alt="room">
        </div>
        <div class="reasons clearfix">
            <h2>REASONS TO BOOK WITH US</h2>
            <div class="cnt3-text1">
                <h3>AWESOME DESIGN</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
                    consequuntur ratione molestias eveniet animi tempora quo!
                </p>

            </div>
            <div class="cnt3-text2">
                <h3>CAREFULLY HANDCRAFTED</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
                    consequuntur ratione molestias eveniet animi tempora quo!
                </p>

            </div>
            <div class="cnt3-text1">
                <h3>FULLY RESPONSIVE</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
                    consequuntur ratione molestias eveniet animi tempora quo!
                </p>

            </div>
            <div class="cnt3-text2">
                <h3>FULLY RESPONSIVE</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste maiores neque perferendis
                    consequuntur ratione molestias eveniet animi tempora quo!
                </p>
            </div>
        </div>
    </div>
</div>

@endsection