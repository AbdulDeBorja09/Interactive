@extends('admin.layout.app')

@section('content')


<section class="main container">
    <div class="edit-return">
        <a href="javascript:history.back()" class="back-button ">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24" class="feather feather-arrow-left">
                <path d="M19 12H5m7-7l-7 7 7 7"></path>
            </svg>
            <b>Return</b>
        </a>
    </div>
    <div class="edit-container ">

        <form action="{{route('submitedit')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="row">
                <div class="col-lg-5">
                    <h1>Office Name:</h1>
                </div>

                <div class="col-lg-7"><input class="w-100" type="text" name="name" value="{{$item->room_name}}">
                </div>
                <div class="col-lg-5">
                    <h1>Location:</h1>
                </div>
                <div class="col-lg-7"><input class="w-100" type="text" value="{{$item->floor}}" readonly>
                </div>

                <div class="col-lg-12">
                    <h1>Project Description:</h1>
                </div>
                <div class="col-lg-12"><textarea class="w-100" cols="30" type="text"
                        name="desc"> {{$item->room_desc}}</textarea></div>
            </div>
            <div class="text-center">
                <button class="w-25">Save Edit</button>
            </div>
        </form>
    </div>
</section>


@endsection