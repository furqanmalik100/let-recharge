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
                    <h3>About Let<span>Recharge</span></h3>
                    <p>Received shutters expenses ye he pleasant. Drift as blind
                        above at up. No up simple county stairs do should praise as.</p>
                    <p>Now principles discovered off increasing how reasonably middletons men. Add seems out man met
                        plate court sense. His joy she worth truth given. You agreeable breakfast his set perceived
                        immediate. Stimulated man are projecting favourable middletons.</p>
                    <p>Pianoforte solicitude so decisively unpleasing conviction is partiality he.
                        Or particular so diminution entreaties oh do. Real he me fond show gave shot plan. Mirth
                        blush linen small hoped way its along. Resolution frequently apartments off all
                        discretion devonshire.</p>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="part-img">
                    <img src="{{ asset('assets/img/about-1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection