@extends('admin.layouts.master')
@section('title','Contact Section Metas')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Contact Page Metas</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">Contact Page Metas</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('contact-page-save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-raised btn-primary waves-effect">Submit</button>
                        </div>
                        <div class="body">
                            @foreach ($contact_section_meta as $exist)
                                @if($exist->name == "contact_page_heading")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="contact_page_heading">Contact Page Heading</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <textarea name="contact_page_heading" class="ckeditor" value="">{{ $exist->value }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($exist->name == "contact_page_text")
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                        <label for="contact_page_text">Contact Page Text</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8">
                                        <div class="form-group">
                                            <textarea name="contact_page_text" class="ckeditor" value="">{{ $exist->value }}</textarea>
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