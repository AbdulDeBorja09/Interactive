@extends('admin.layout.app')

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Main Menu</a></li>
            <li><a href="{{url('/Admin/Settings')}}">General Settings</a></li>
            <li>Logs List</li>
        </ul>
        <h1>All Logs</h1>
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
                            <th class="text-center" style="background-color: #217ace; width: 3%">#</th>
                            <th style="background-color: #217ace;">Name</th>
                            <th style="background-color: #217ace;">Action</th>
                            <th style="background-color: #217ace;">Room No.</th>
                            <th style="background-color: #217ace;">Old Value</th>
                            <th style="background-color: #217ace;">New Value</th>
                            <th style="background-color: #217ace;">Date Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $index => $log)
                        <tr>
                            @php
                            $room = str_replace('room-', '', $log->room_id );
                            @endphp

                            <td class="text-center">{{$index + 1}}</td>
                            <td>{{ $log->name }}</td>
                            <td style="text-transform: uppercase">{{ $log->action }}</td>
                            <td style="text-transform: uppercase">{{$room}}</td>
                            <td> @if(isset($log->old_data['room_id']))
                                <strong>Name:</strong> <br> {{ $log->old_data['room_name'] }} <br>
                                @endif
                                @if(isset($log->old_data['room_desc']))
                                <strong>Description:</strong><br>{{ $log->old_data['room_desc'] }} <br>
                                @endif
                                @if(isset($log->old_data['room_head']))
                                <strong>Head:</strong> <br>{{ $log->old_data['room_head'] }} <br>
                                @endif
                                @if(isset($log->old_data['room_contact']))
                                <strong>Contact:</strong> <br>{{ $log->old_data['room_contact'] }} <br>
                                @endif
                                @if(isset($log->old_data['room_email']))
                                <strong>Email:</strong> <br>{{ $log->old_data['room_email'] }} <br>
                                @endif
                            </td>
                            <td> @if(isset($log->new_data['room_name']))
                                <strong>Name:</strong> <br> {{ $log->new_data['room_name'] }} <br>
                                @endif
                                @if(isset($log->new_data['room_desc']))
                                <strong>Description:</strong><br>{{ $log->new_data['room_desc'] }} <br>
                                @endif
                                @if(isset($log->new_data['room_head']))
                                <strong>Head:</strong> <br>{{ $log->new_data['room_head'] }} <br>
                                @endif
                                @if(isset($log->new_data['room_contact']))
                                <strong>Contact:</strong> <br>{{ $log->new_data['room_contact'] }} <br>
                                @endif
                                @if(isset($log->new_data['room_email']))
                                <strong>Email:</strong> <br>{{ $log->new_data['room_email'] }} <br>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y h:i A') }}</td>

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