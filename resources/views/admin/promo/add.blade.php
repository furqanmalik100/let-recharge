@extends('admin.layouts.master')
@section('title','Create Promotion')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Create Promotion</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">Create Promotion</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" method="POST" action="{{ route('promo.save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="country" id="country">
                    <input type="hidden" name="operator" id="operator">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                    <label for="country_id">Country</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" id="country_id" name="country_id">
                                            <option value="" selected="" disabled="">Select Country</option>
                                            @foreach($countries as $c)
                                            <option value="{{ $c->country_id }}">{{ $c->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                    <label for="operator_id">Operator</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" id="operator_id" name="operator_id">
                                            <option value="" selected="" disabled="">Select Operator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-4 form-control-label">
                                    <label for="info">Promo Detail</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8">
                                    <div class="form-group">
                                        <input name="info" id="info" class="form-control" value="">
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
    $('#country_id').change(function(){
        $('#country').val($(this).find('option:selected').text());
        $.post("{{ route('promo.operators') }}", {
            _token: "{{ csrf_token() }}",
            country_id: $('#country_id').val()
        }, function(response){
            $('#operator_id').html(response);
        })
    });
    $('#operator_id').change(function(){
        $('#operator').val($(this).find('option:selected').text());
    });
</script>
@endpush