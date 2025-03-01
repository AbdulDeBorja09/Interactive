@extends('admin.layout.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li>Main Menu</li>
        </ul>
        <h1>Dashboard</h1>
    </div>
</div>
<section class="main container">
    <div class="grid-container">
        <div class="box">

            {!! file_get_contents(public_path('image/map.svg')) !!}
            <h1>All Floors</h1>
            <div class="info">
                <h1>All Floors</h1>
                <h2>{{$allcount}} Rooms</h2>
                <a class="btn" href="{{url('/All-floors')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
            <h1>Lower Ground</h1>
            <div class="info">
                <h1>Lower Ground</h1>
                <h2>{{$lowerGroundCount}} Rooms</h2>
                <a class="btn" href="{{url('/Lower-ground')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
            <h1>Ground Gloor</h1>
            <div class="info">
                <h1>Ground Floor</h1>
                <h2>{{$groundFloorCount}} Rooms</h2>
                <a class="btn" href="{{url('/Ground-floor')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('svg/3SecondFloor.svg')) !!}
            <h1>Second Floor</h1>
            <div class="info">
                <h1>Second Floor</h1>
                <h2>{{$secondFloorCount}} Rooms</h2>
                <a class="btn" href="{{url('/Second-floor')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
            <h1>Third Floor</h1>
            <div class="info">
                <h1>Third Floor</h1>
                <h2>{{$thirdFloorCount}} Rooms</h2>
                <a class="btn" href="{{url('/Third-floor')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
            <h1>Fourth Floor</h1>
            <div class="info">
                <h1>Fourth Floor</h1>
                <h2>{{$fourthFloorCount}} Rooms</h2>
                <a class="btn" href="{{url('/Fourth-floor')}}">View rooms</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('image/mapsvg.svg')) !!}
            <h1>Interactive Map</h1>
            <div class="info">
                <h1>Interactive Map</h1>
                <h2></h2>
                <a class="btn" href="{{url('/')}}">View Map</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('image/home_settings.svg')) !!}
            <h1>General Settings</h1>
            <div class="info">
                <h1>General Settings</h1>
                <h2></h2>
                <a class="btn" href="{{url('/Admin/Settings')}}">View Settings</a>
            </div>
        </div>
    </div>

</section>
@endsection