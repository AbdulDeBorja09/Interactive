@extends('admin.layout.app')

@section('content')
@include('admin.components.alert')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Main Menu</a></li>
            <li><a href="{{url('/Admin/Settings')}}">General Settings</a></li>
            <li>User Settings</li>
        </ul>
        <h1>User Settings</h1>
    </div>
</div>
<section class="main container">
    <div class="profile-container shadow-sm">
        <a class="back-btn" onclick="history.back()"><i class=" fa-solid fa-arrow-left-long"></i></a>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="{{route('updateprofile')}}" method="POST">
                    @csrf
                    <label for="name" class="form-label">Name: </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                    <label for="name" class="form-label">Email: </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->email}}"
                        disabled>
                    <label for="old_password" class="form-label">Current Password: </label>
                    <input class="form-control" type="text" name="old_password" id="old_password"
                        placeholder="Current Password">
                    <label for="password" class="form-label">Password: </label>
                    <input class="form-control" type="text" name="password" id="password" placeholder="Password">
                    <label for="cpassword" class="form-label">Confirm Password: </label>
                    <input class="form-control" type="text" name="cpassword" id="cpassword"
                        placeholder="Confirm Password">
                    <button class="btn">Save Edit</button>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                {!! file_get_contents(public_path('image/persons.svg')) !!}
            </div>
        </div>
    </div>
</section>
@endsection