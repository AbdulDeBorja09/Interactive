@extends('admin.layout.app')

@section('content')

<div class="main">
    <div class="header">
        <h1>{{$floor}} Offices</h1>
    </div>
    <div class="content-div">
        @foreach ($rooms as $item)
        @php
        $room = str_replace('room-', '', $item->room_id);
        @endphp
        <div class="content container">
            <h2>• <span style="text-transform: uppercase">{{$room}}</span> | {{$item->room_name}}</h2>
            <a class="btn" href="{{url('/Admin/Edit/ '.$item->id)}}">Edit</a>
        </div>
        @endforeach
    </div>
</div>


@endsection