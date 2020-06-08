@extends('layouts.main')
@section('title', 'About Us')
@section('content')
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>About Us</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>About Us</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                <div class="part-text">
                    {!! $about_heading->value !!}
                    {!! $about_text->value !!}
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="part-img">
                    <img src="{{asset('cms/about/'. $about_image->value)}}" alt="About Image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection