@extends('admin.layouts.master')
@section('title','FAQs')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>FAQs</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">FAQs</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                    <label for="question">Question</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="form-group">
                                        <input type="text" name="question" class="form-control" id="question" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                    <label for="answer">Answer</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="form-group">
                                        <textarea name="answer" id="answer" class="ckeditor" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label"></div>
                                <div class="col-md-9">
                                    <div class="checkbox">
                                        <input id="status" name="status" type="checkbox" value="1">
                                        <label for="status">
                                            Make Visible
                                        </label>
                                    </div>
                                </div>
                            </div>
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