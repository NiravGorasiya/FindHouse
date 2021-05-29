@extends('admin.layout')
@section('title')
dashboard
@endsection
@section('container')
<!-- Our Dashbord -->
<div class="row">
    <div class="col-lg-12 mb10">
        <div class="breadcrumb_content style2">
            <h2 class="breadcrumb_title">Howdy</h2>
            <p>We are glad to see you again!</p>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="ff_one">
            <div class="icon"><span class="flaticon-home"></span></div>
            <div class="detais">
                <div class="timer">{{$country}}</div>
                <p>Country</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="ff_one style2">
            <div class="icon"><span class="flaticon-view"></span></div>
            <div class="detais">
                <div class="timer">{{$state}}</div>
                <p>State</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="ff_one style3">
            <div class="icon"><span class="flaticon-chat"></span></div>
            <div class="detais">
                <div class="timer">{{$city}}</div>
                <p>city</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
        <div class="ff_one style4">
            <div class="icon"><span class="flaticon-heart"></span></div>
            <div class="detais">
                <div class="timer">{{$property}}</div>
                <p>Property</p>
            </div>
        </div>
    </div>
</div>
@endsection