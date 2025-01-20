@extends('admin.layout.app')

@section('content')

<div class="main">
    <div class="header">
        <h1>Lower Ground Floor Offices</h1>
    </div>
    <div class="content-div">
        @for ($i = 0; $i < 24; $i++) <div class="content container">
            <h2>• City Agricultural Services Department</h2>
            <a class="btn" href="{{url('/Admin/Edit')}}">Edit</a>
    </div>
    @endfor
</div>
</div>


@endsection