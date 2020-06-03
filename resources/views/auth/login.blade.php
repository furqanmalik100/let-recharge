@extends('layouts.main')
@section('title', 'Login')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Login</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>Login</span>
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
                    <h2>login here</h2>
                    <form action="user-dashboard.html">
                        <div class="single-input-box">
                            <label>user name</label>
                            <input type="text" placeholder="user name">
                        </div>
                        <div class="single-input-box">
                            <label>password</label>
                            <input type="password" placeholder="password">
                        </div>
                        <button type="submit">Login Account</button>
                    </form>
                    <div class="login-with-social">
                        <a href="#">Facebook</a>
                        <a href="#">Google</a>
                        <a href="#">twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form end -->
@endsection