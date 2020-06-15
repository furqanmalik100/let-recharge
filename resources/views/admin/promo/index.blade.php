@extends('admin.layouts.master')
@section('title','Promotions')
@section('content')
    <!-- Main Content -->

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Promotions</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i> Let Recharge</a></li>
                    <li class="breadcrumb-item active">Promotions</li>
                </ul>
                <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="text-right">
                        <a href="{{ route('promo.add') }}" class="btn btn-primary">Add Promo</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Country</th>
                                        <th>Operator</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $item)
                                    <tr data-id = {{ $item->id }}>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->operator }}</td>
                                        <td>{{ $item->info }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a href="{{ route('promo.change-status', [$item->id, 0]) }}">
                                                    <span class="badge badge-success">Active</span>
                                                </a>
                                            @else
                                                <a href="{{ route('promo.change-status', [$item->id, 1]) }}">
                                                    <span class="badge badge-danger">Disabled</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('promo.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" data-id ="{{ $item->id }}" data-href="{{ route('promo.delete', $item->id) }}" title="Delete"><i class="zmdi zmdi-delete"></i></a>
                                        </td>
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
@push('js')
<script>
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = "{{ csrf_token() }}";
        var url = $(this).data("href"); 
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Promo",
            icon: "warning",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
            swal("Your imaginary file is safe!");
            }
        });
    });

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