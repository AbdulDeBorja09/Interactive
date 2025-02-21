@extends('admin.layout.app')

@section('content')
@include('admin.components.alert')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{url('/Admin/Dashboard')}}">Home</a></li>
            <li><a href="{{url('/Admin/Dashboard')}}">Floor List</a></li>
            <li><a onclick="history.back()">Office List</a></li>
            <li>Edit Office</li>
        </ul>
        <h1>Edit Office</h1>
    </div>
</div>
<section class="main container">
    <div class="rooms-container shadow-sm">
        <a class="back-btn" onclick="history.back()"><i class=" fa-solid fa-arrow-left-long"></i></a>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 edit-form">
                <form action="{{route('submitedit')}}" method="POST">
                    @csrf
                    @php
                    $roomID = strtoupper(str_replace('room-', '', $item->room_id));
                    @endphp
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <div class="mt-3">
                        <label for="office">Office Name:</label>
                        <input class="form-control" type="text" name="name" id="office" value="{{$item->room_name}}"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="floor">Floor:</label>
                        <input class="form-control" type="text" name="" id="floor"
                            value="{{$item->floor}} ({{$roomID}})" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="dept">Dept. Head:</label>
                        <input class="form-control" type="text" name="head" id="dept" value="{{$item->room_head}}">
                    </div>
                    <div class="mt-3">
                        <label for="contact">Office Contact:</label>
                        <input class="form-control" type="text" name="contact" id="contact"
                            value="{{$item->room_contact}}">
                    </div>
                    <div class="mt-3">
                        <label for="email">Office Email:</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{$item->room_email}}">
                    </div>
                    <div class="mt-3">
                        <label for="status">Room Status:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="0" @selected($item->status == 0)>Disable</option>
                            <option value="1" @selected($item->status == 1)>Active</option>
                        </select>

                    </div>
                    <div class="mt-3">
                        <label for="desc">Room Description:</label>
                        <textarea class="form-control" name="desc" rows="5" id="desc"
                            required>{{$item->room_desc}}</textarea>
                    </div>
                    <button class="btn">Save Edit</button>
                </form>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    Swap Room
                </button>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 edit-svg">
                @if ($item->floor === "Lower Ground")
                {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
                @elseif($item->floor === "Ground Floor")
                {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
                @elseif($item->floor === "Second Floor")
                {!! file_get_contents(public_path('svg/3SecondFloor.svg')) !!}
                @elseif($item->floor === "Third Floor")
                {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
                @elseif($item->floor === "Fourth Floor")
                {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
                @endif
            </div>
        </div>

    </div>
</section>

<div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="floor-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <form action="{{route('swapRooms')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="floor-title">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div>
                        <div class="row">
                            <div class="col-lg-5">

                                <div class="form-container">
                                    <label for="displayvalue">Current Location</label>
                                    <input type="text" name="oldRoomId" id="oldroomid" value="{{$item->room_id}}"
                                        hidden>
                                    <input class="form-control" id="oldroomdisplay" type="text"
                                        value=" {{$item->floor}} ({{$roomID}})" readonly>
                                    <label for="oldroomname">Room Name:</label>
                                    <textarea class="w-100 form-control" type="text" name="oldroomname" id="oldroomname"
                                        rows="2" readonly>{{$item->room_name}}</textarea>
                                    <hr>
                                    <label for="newroomid">New Location</label>
                                    <input type="hidden" name="newRoomId" id="newRoomId" value="">
                                    <input class="form-control" id="newroomdisplay" type="text" value=" " readonly>
                                    <label for="newroomname">Room Name:</label>
                                    <textarea class="w-100 form-control" type="text" name="newroomname" id="newroomname"
                                        rows="2" readonly></textarea>
                                </div>
                                <section class="floors">
                                    <ul>
                                        <li><a href="#" data-floor="4F">4F</a></li>
                                        <li><a href="#" data-floor="3F">3F</a></li>
                                        <li><a href="#" data-floor="2F">2F</a></li>
                                        <li><a href="#" data-floor="GF">GF</a></li>
                                        <li><a href="#" data-floor="LG">LG</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="col-lg-7">
                                <div id="svg-container">
                                    <div id="LG" class="floor-svg" style="display: none;">
                                        {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
                                    </div>
                                    <div id="GF" class="floor-svg" style="display: none;">
                                        {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
                                    </div>
                                    <div id="2F" class="floor-svg" style="display: none;">
                                        {!! file_get_contents(public_path('svg/3SecondFloor.svg')) !!}
                                    </div>
                                    <div id="3F" class="floor-svg" style="display: none;">
                                        {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
                                    </div>
                                    <div id="4F" class="floor-svg" style="display: none;">
                                        {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="swapButton">Swap Room</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="{{asset('js/edit-changefloor.js')}}"></script>
<script src="{{asset('js/ajax-room-info.js')}}"></script>
<script src="{{asset('js/edit-blink.js')}}"></script>
@endsection