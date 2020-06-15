@extends('admin.layouts.master')
@section('title','Profile')

@section('content')
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile Edit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                        <li class="breadcrumb-item active">Profile Edit</li>
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
                            <h2><strong>Security</strong> Settings</h2>
                        </div>
                        <form action="{{ route('admin-profile-save') }}" method="POST">
                            @csrf
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="current_password" value="" class="form-control" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="password" value="" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info">Save Changes</button>
                                    </div>                                
                                </div>                              
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Account</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin-profile-save') }}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
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