@extends('layouts.main')
@section('title', 'My Profile')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>My Information</h2>
                    <a href="{{ route('user.dashboard') }}">Account</a>
                    <span>My Information</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb end -->

<!-- My Information begin -->
<div class="my-info">
    <div class="container">
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
        		@foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
	            @endforeach
	            @if(session('success'))
	            <div class="alert alert-success">
                    {{ session('success') }}
                </div>
	            @endif
        	</div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <h3>Account Details</h3>
                <div class="information-panel">
                    <div class="d-flex flex-column">
                        <div class="collapse-head">
                            <div class="color-grey-medium fs-14">Email:</div>
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="fs-16 text-truncate pr-10">{{ $user->email }}</div>
                                <a href="javascript:void(0)" class="edit-button fs-12 align-self-center align-self-md-end collapsed" data-toggle="collapse" data-target="#account-info-email" aria-expanded="false" aria-controls="account-info-email">Edit</a>
                            </div>
                        </div>
                        <div class="collapse" id="account-info-email" style="">
                            <form method="post" id="change-credentials-email" action="{{ route('update.email') }}" class="mt-15" novalidate="novalidate">
                            	@csrf
                                <br>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="New Email" autocomplete="off">
                                </div>
                                <button type="submit" name="" class="update-info btn btn-primary float-right">Save New Email</button>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-4">
                        <div class="collapse-head">
                            <div class="color-grey-medium fs-14">Password:</div>
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="fs-16 text-truncate pr-10"></div>
                                <a href="javascript:void(0)" class="edit-button fs-12 align-self-center align-self-md-end collapsed" data-toggle="collapse" data-target="#account-info-password" aria-expanded="false" aria-controls="account-info-password">Edit</a>
                            </div>
                        </div>
                        <div class="collapse" id="account-info-password" style="">
                            <form method="post" action="{{ route('update.password') }}" class="mt-15" novalidate="novalidate">
                            	@csrf
                                <br>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="New Password" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="off">
                                </div>
                                <button type="submit" name="" class="update-info btn btn-primary float-right">Save Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <h3>Personal Details</h3>
                <div class="information-panel">
                    <div class="text-right">
                        <a href="javascript:void(0)" class="fs-12 align-self-center align-self-md-end collapsed" data-toggle="collapse" data-target="#account-info-billing" data-collapse-head="true" aria-expanded="false" aria-controls="account-info-billing">
                            Edit
                        </a>
                    </div>
                    <div class="account-information-panel pb-40 pb-md-30 collapse" id="account-info-billing" style="">
                        <form method="post" id="change-credentials-billing" action="{{ route('update.personal_info') }}" class="clearfix" novalidate="novalidate">
                        	@csrf
                            <div class="bill-fields">
                                <div class="d-flex flex-row justify-content-between form-row">
                                    <div class="form-group col-12">
                                        <input type="text" name="name" placeholder="Full Name"  maxlength="50" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input type="text" name="phone" placeholder="Phone number"  maxlength="50" value="{{ $user->profile->phone }}">
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between form-row">
                                    <div class="form-group col-12">
                                        <select name="country_id" class="country-select" title="Select country">
                                            <option selected disabled="" value="">Select Your Country</option>
		                                    @foreach($countries as $c)
		                                    <option value="{{ $c->country_id }}" @if($c->country_id == $user->profile->country_id) selected @endif>{{ $c->country }}</option>
		                                    @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="country" value="{{ $user->profile->country }}">
                                </div>
                            </div>
                            <button type="submit" name="" class="update-info btn btn-primary float-right">Save</button>
                        </form>
                    </div>
                    <div class="collapse-head spread-vertically-center" style="">
                        <div class="mb-5">
                            <div class="color-grey-medium fs-14">Name:</div>
                            <div class="fs-16">
                                <span data-update="bill_first_name">{{ $user->name }}</span>
                            </div>
                        </div>
                        <div class="mb-5">
                            <div class="color-grey-medium fs-14">Phone:</div>
                            <div class="fs-16" data-update="bill_phone">{{ $user->profile->phone }}</div>
                        </div>
                        <div class="mb-5">
                            <div class="color-grey-medium fs-14">Country:</div>
                            <div class="fs-16" data-update="bill_country">{{ $user->profile->country }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Information end -->
@endsection
@push('js')
<script type="text/javascript">
	$('.country-select').change(function(){
		$('[name="country"]').val($(this).find('option:selected').text());
	});
</script>
@endpush