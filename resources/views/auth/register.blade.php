@extends('layouts.main')
@section('title', 'Login')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="breadcrumb-content">
                    <h2>Login</h2>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            Login
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb end -->

<!-- form begin -->
<div class="etu-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="form-area">
                    <h2>create your account in here</h2>
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="single-input-box">
                            <label>Enter name</label>
                            <input type="text" name="name" placeholder="Enter Name">
                        </div>
                        <div class="single-input-box">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="enter email address">
                        </div>
                        <div class="single-input-box">
                            <label>password</label>
                            <input type="password" placeholder="" name="password">
                        </div>
                        <div class="single-input-box">
                            <label>re-password</label>
                            <input type="password" placeholder="" name="password_confirmation">
                        </div>
                        <button>create your account</button>
                    </form>
                    <div class="mt-2 text-center">
                        <p>
                            Already have an account? <a href="{{ route('login') }}" class="text-warning">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
@endsection