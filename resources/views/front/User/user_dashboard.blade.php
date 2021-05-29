@extends('front.user.user_layout')
@section('container')

<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Howdy,{{$register->username}}</h2>
        <p>We are glad to see you again!</p>
    </div>
</div>


@endsection