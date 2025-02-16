@extends('admin.layout.app')

@section('content')
<div class="error-container container">
    @if(session('error'))
    <div class="alert error-alert d-flex" role="alert" id="errorAlert">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <b>Error!</b> {{ session('error') }}
        </div>
        <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Closes"></button>
    </div>
    @endif

    @if(session('success'))
    <div class="alert success-alert  fade show d-flex align-items-center w-100" role="alert" id="successAlert">
        <div>
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <b>Success!</b> {{ session('success') }}
        </div>
        <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Close"></button>
    </div>
    @endif
</div>
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
            <h2>
                <span style="color: {{ $item->status == 1 ? 'rgb(30, 139, 2)' : 'rgb(180, 5, 5)' }}">•</span>
                <span style="text-transform: uppercase">{{$room}}</span> |
                {{$item->room_name}}
            </h2>
            <div class="d-flex">

                @if($item->status == 1)
                <form action="{{route('disable')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="disable btn">Disable</button>
                </form>
                @else
                <form action="{{route('enable')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="enable btn">Enable</button>
                </form>

                @endif
                <a class="btn" href="{{url('/Admin/Edit/ '.$item->id)}}">Edit</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection