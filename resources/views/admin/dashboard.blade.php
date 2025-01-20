@extends('admin.layout.app')

@section('content')

<div class="main">
    <div class="header">
        <h1>Lower Ground Floor Offices</h1>
    </div>
    <div class="content-div">
        @foreach ($rooms as $item)
        <div class="content container">
            <h2>• {{$item->room_name}}</h2>
            <a class="btn" href="{{url('/Admin/Edit/ '.$item->id)}}">Edit</a>
        </div>
        @endforeach
    </div>
</div>


@endsection