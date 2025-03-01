@extends('admin.layout.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Main Menu</a></li>
            <li>General Settings</li>
        </ul>
        <h1>General Settings</h1>
    </div>
</div>
<section class="main container">
    <div class="grid-container">
        <div class="box">
            {!! file_get_contents(public_path('image/Faqs.svg')) !!}
            <h1>All Faqs</h1>
            <div class="info">
                <h1>Faqs Settings</h1>
                <h2></h2>
                <a class="btn" href="{{url('/')}}">View Faqs</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('image/logs.svg')) !!}
            <h1>All Logs</h1>
            <div class="info">
                <h1>Logs Settings</h1>
                <h2></h2>
                <a class="btn" href="{{url('/Admin/Logs')}}">View Logs</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('image/users.svg')) !!}
            <h1>All Users</h1>
            <div class="info">
                <h1>All Users</h1>
                <h2></h2>
                <a class="btn" href="{{url('/Admin/Users')}}">View Users</a>
            </div>
        </div>
        <div class="box">
            {!! file_get_contents(public_path('image/settings.svg')) !!}
            <h1>Account Settings</h1>
            <div class="info">
                <h1>Account Settings</h1>
                <h2></h2>
                <a class="btn" href="{{url('/Admin/Profile')}}">View Settings</a>
            </div>
        </div>
    </div>
</section>
@endsection