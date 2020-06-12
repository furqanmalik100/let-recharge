@extends('admin.layouts.master')
@section('title','Social Links Metas')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Social Links Metas</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">Social Links Metas</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('social-links-save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                        </div>
                        <div class="body">
                            @foreach ($social_links_meta as $exist)
                                @if($exist->platform_name == "facebook")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="facebook">Facebook</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ $exist->link }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->platform_name == "twitter")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="twitter">Twitter</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="twitter" id="twitter" class="form-control" value="{{ $exist->link }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->platform_name == "instagram")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="instagram">Instagram</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="instagram" id="instagram" class="form-control" value="{{ $exist->link }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->platform_name == "pinterest")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="pinterest">Pinterest</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="pinterest" id="pinterest" class="form-control" value="{{ $exist->link }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->platform_name == "youtube")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="youtube">YouTube</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="youtube" id="youtube" class="form-control" value="{{ $exist->link }}">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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