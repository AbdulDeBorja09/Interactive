@extends('admin.layout.app')

@section('content')
@include('admin.components.alert')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Main Menu</a></li>
            <li><a href="{{url('/Admin/Settings')}}">General Settings</a></li>
            <li>Users List</li>
        </ul>
        <h1>All Users</h1>
    </div>
</div>

<section class="main container">
    <div class="rooms-container shadow-sm">
        <a class="back-btn" onclick="history.back()"><i class=" fa-solid fa-arrow-left-long"></i></a>
        <div class="container mt-3">
            <div class="mb-3 d-flex" style="justify-content: space-between">
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Search for office...">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add User
                </button>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead class="custom-thead">
                        <tr style="border: 1px sol">
                            <th class="text-center" style="background-color: #217ace;">#</th>
                            <th style="background-color: #217ace;">Name</th>
                            <th style="background-color: #217ace;">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $index => $item)
                        <tr>
                            <td class="text-center">{{$index + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                        </tr>

                        @endforeach
                        <tr id="noResultsMessage"></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('CreateAdminAccount')}}" method="POST">
                <div class="modal-body">

                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="text" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="cassword">Confirm Password</label>
                        <input id="cpassword" type="text" name="cpassword" class="form-control"
                            placeholder="Confirm Password">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('../js/table-search.js')}}"></script>
@endsection