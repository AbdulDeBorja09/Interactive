@extends('admin.layout.app')

@section('content')
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
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Search for office...">
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
<script src="{{asset('../js/table-search.js')}}"></script>

@endsection