@extends('layouts.main')
@section('title', 'My Account')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Dashboard</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>Dashboard</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb end -->

<!-- faq begin-->
<div class="faq">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <h2>Products</h2>
                            @if(sizeof($services))
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            Goods & Services
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                    	<div class="row">
                                    		@foreach($services as $s)
	                                       	<div class="col-lg-3 mb-4">
												<div class="product-box text-center">
													<h6>{{ $s->product }}</h6>
													<p class="mb-2 desc">You bought this product for <b class="text-warning">{{ $s->recipient }}</b></p>
													<a href="{{ route('repeat.service', $s->id) }}" class="btn btn-sm btn-warning">Repeat</a>
												</div>
											</div>
	                                       @endforeach
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(sizeof($airtime))
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Airtime Topups
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                    	<div class="row">
                                    		@foreach($airtime as $s)
	                                       	<div class="col-lg-3 mb-4">
												<div class="product-box text-center">
													<h6>{{ $s->product }}</h6>
													<p class="mb-2 desc">You bought this product for <b class="text-warning">{{ $s->recipient }}</b></p>
													<a href="{{ route('repeat.airtime', $s->id) }}" class="btn btn-sm btn-warning text-white">Repeat</a>
												</div>
											</div>
	                                       @endforeach
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                        <input type="text" name="name" placeholder="Full Name"  maxlength="50" value="{{ $user->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <input type="text" name="phone" placeholder="Phone number"  maxlength="50" value="{{ $user->profile->phone ?? '' }}">
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
                                    <input type="hidden" name="country" value="{{ $user->profile->country ?? '' }}">
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
                            <div class="fs-16" data-update="bill_phone">{{ $user->profile->phone ?? '' }}</div>
                        </div>
                        <div class="mb-5">
                            <div class="color-grey-medium fs-14">Country:</div>
                            <div class="fs-16" data-update="bill_country">{{ $user->profile->country ?? '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Information end -->
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 mb-4">
            <h2>Tutorials</h2>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/sk7_DuLrhyA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/sk7_DuLrhyA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>
<!-- faq end -->

@endsection
@push('js')
<script type="text/javascript">
	$('.country-select').change(function(){
		$('[name="country"]').val($(this).find('option:selected').text());
	});
</script>
@endpush