@extends('layouts.main')
@section('title', 'Contact Us')
@section('content')
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Contact Us</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>Contact Us</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-sm-10">
                <div class="section-title text-center">
                    <h2>To any Question Contact Us</h2>
                    <p>To sure calm much most long me mean. Able rent long in do we. Uncommonly no it announcing
                        melancholy an in. Mirth
                        learn it he given.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="contact-area">
                    <form>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <input type="text" placeholder="Your fast name">
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <input type="text" placeholder="Your last name">
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <input type="text" placeholder="Your email address">
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <input type="text" placeholder="Your phone number">
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <textarea placeholder="Message"></textarea>
                            </div>
                        </div>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection