@extends('admin.layout.app')

@section('content')


<section class="main container">
    <div class="edit-container ">
        <form action="">
            <div class="row">
                <div class="col-lg-5">
                    <h1>Office Name:</h1>
                </div>
                <div class="col-lg-7"><input class="w-100" type="text" name="" id="" value="{{$item->room_name}}"></div>
                <div class="col-lg-5">
                    <h1>Location:</h1>
                </div>
                <div class="col-lg-7"><input class="w-100" type="text" name="" id="" value="{{$item->floor}}" readonly>
                </div>

                <div class="col-lg-12">
                    <h1>Project Description:</h1>
                </div>
                <div class="col-lg-12"><textarea class="w-100" cols="30" rows="10" type="text" name=""
                        id=""> {{$item->room_desc}}</textarea></div>
            </div>
            <div class="text-center">
                <button class="w-25">Save Edit</button>
            </div>
        </form>
    </div>
</section>


@endsection