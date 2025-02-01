@extends('layouts.app')

@section('content')

<div id="svg-container">

    {!! file_get_contents(public_path('svg/1GroundFloor_final.svg')) !!}
    {!! file_get_contents(public_path('svg/2UpperGroundFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/3Second Floor Plan.svg')) !!}
    {!! file_get_contents(public_path('svg/4ThirdFloor.svg')) !!}
    {!! file_get_contents(public_path('svg/5Fourth Floor.svg')) !!}
</div>









@endsection