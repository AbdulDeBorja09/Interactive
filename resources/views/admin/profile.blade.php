@extends('admin.layout.app')

@section('content')
@include('admin.components.alert')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li>User Settings</li>
        </ul>
        <h1>User Settings</h1>
    </div>
</div>
<section class="main container">
    <div class="profile-container shadow-sm">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="{{route('updateprofile')}}" method="POST">
                    @csrf
                    <label for="name" class="form-label">Name: </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->name}}">
                    <label for="name" class="form-label">Email: </label>
                    <input class="form-control" type="text" name="name" id="name" value="{{Auth::user()->email}}"
                        disabled>
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
        {{-- <div class="table-responsive mt-5">
            <table class="table table-bordered  table-hover">
                <thead class="custom-thead">
                    <tr style="border: 1px sol">
                        <th class="text-center" style="background-color: #217ace; width: 70px">#</th>
                        <th style="background-color: #217ace;">Name</th>
                        <th style="background-color: #217ace;">Email</th>
                        <th class="text-center" style="background-color: #217ace;">Status</th>
                        <th class="text-center" style="background-color: #217ace;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profile as $item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td class="text-center">
                            @if ($item->status === 1)
                            <span class="badge text-bg-success">Active</span>
                            @else
                            <span class="badge text-bg-success">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
</section>
@endsection