@extends('admin.layouts.master')
@section('title','Settings')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Settings</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                   
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>API's Key</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.settings.save') }}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Stripe Public Key</label>
                                            <input type="text" name="stripe_public_key" value="{{ $settings->stripe_public_key ?? '' }}" class="form-control" placeholder="Stripe Public Key">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Stripe Secert Key</label>
                                            <input type="text" name="stripe_secret_key" value="{{ $settings->stripe_secret_key ?? '' }}" class="form-control" placeholder="Stripe Secret Key">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Services API Public Key</label>
                                            <input type="text" name="services_api_public_key" value="{{ $settings->services_api_public_key ?? '' }}" class="form-control" placeholder="Services API Public Key">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Services API Secret Key</label>
                                            <input type="text" name="services_api_secret_key" value="{{ $settings->services_api_secret_key ?? '' }}" class="form-control" placeholder="Services API Secret Key">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Airtime API Login</label>
                                            <input type="text" name="airtime_api_login" value="{{ $settings->airtime_api_login ?? '' }}" class="form-control" placeholder="Airtime API Login">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Airtime API Token</label>
                                            <input type="text" name="airtime_api_token" value="{{ $settings->airtime_api_token ?? '' }}" class="form-control" placeholder="Airtime API Token">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
    toastr.options = {
        "preventDuplicates": true
    }

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if(Session::has('message'))
        toastr.success("{{ Session::get('message') }}");
    @endif
</script>
@endpush