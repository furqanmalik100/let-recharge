@extends('admin.layouts.master')
@section('title','About Section Metas')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>About Page Metas</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">About Page Metas</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('about-page-save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                        </div>
                        <div class="body">
                            @foreach ($about_section_meta as $exist)
                                @if($exist->name == "about_page_image")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="about_page_image">About Page Image</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <img src="{{asset('cms/about/'. $exist->value)}}" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="about_page_image" class="dropify" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->name == "about_page_heading")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="about_page_heading">About Page Heading</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <textarea name="about_page_heading" class="ckeditor" value="">{{ $exist->value }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->name == "about_page_text")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="about_page_text">About Page Text</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <textarea name="about_page_text" class="ckeditor" value="">{{ $exist->value }}</textarea>
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