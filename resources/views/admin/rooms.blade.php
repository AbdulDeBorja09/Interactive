@extends('admin.layout.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Floor List</a></li>
            <li>Office List</li>
        </ul>
        <h1>{{$floor}}</h1>
    </div>
</div>
<section class="main container">
    <div class="rooms-container shadow-sm">
        <div class="container mt-5">
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Search for office...">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead class="custom-thead">
                        <tr style="border: 1px sol">
                            <th class="text-center" style="background-color: #217ace;">#</th>
                            <th class="text-center" style="background-color: #217ace;">Room #</th>
                            <th style="background-color: #217ace;">Office Name</th>
                            <th class="text-center" style="background-color: #217ace;">Status</th>
                            <th class="text-center" style="background-color: #217ace;">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $index => $item)
                        @php
                        $room = str_replace('room-', '', $item->room_id);
                        @endphp
                        <tr>
                            <td class="text-center">{{$index + 1}}</td>
                            <td class="text-center" style="text-transform: uppercase">{{$room}}</td>
                            <td>{{$item->room_name}}</td>
                            <td class="text-center">
                                @if ($item->status === 1)
                                <span class="badge text-bg-success">Active</span>
                                @else
                                <span class="badge text-bg-danger">Disabled</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{url('/Admin/Edit/ '.$item->id)}}"><i class="fa-regular fa-eye"></i></a>
                            </td>
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