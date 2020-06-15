@extends('admin.layouts.master')
@section('title','Transactions')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Transactions</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>By</th>
                                        <th>Recipient</th>
                                        <th>Country</th>
                                        <th>Operator</th>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Type</th>
                                        <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                    <tr data-id = {{ $item->id }}>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name . '( ' . $item->user->email . ' )' }}</td>
                                        <td>{{ $item->recipient }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->operator }}</td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->type == 1 ? 'Goods & Services' : 'Airtime' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection