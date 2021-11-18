@extends('userlayouts.app')
@section ('content')
<div class="header">
    <div class="container">
     <div class="header-in clearfix">
           <h1 class="logo"> <a href=""><img src="{{ asset('image/logo.jpeg') }}" alt="logo"></a></h1> 
           <ul class="nav">
               <li><a href="{{url('/')}}" class="active">Home</a></li>
             <li><a href="{{url('hotelview')}}">Hotel</a></li>
              <li> <a href="{{route('roomuserview')}}">Room</a></li>
               <li><a href="">Login</a></li>
           </ul>
     </div>
    </div>
</div> 
    <div class="content1">
         <div class="container">
             <div class="banner">
             <h2 class="banner-title">Banner</h2>
             <a class="hotel-view" href="">View Hotel</a>
             </div>
         </div>
         <img class="banner-img"src="{{ asset('image/Lotte.jpeg') }}" alt="banner-image">
    </div>
    
    @endsection