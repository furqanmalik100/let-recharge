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
                    <li class="breadcrumb-item active">Faqs</li>
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
                        <a href="{{ route('faq.create') }}" class="btn btn-primary">Add Faq</a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $item)
                                    <tr data-id = {{ $item->id }}>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>{!! $item->answer !!}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-success">Visible</span>
                                            @else
                                                <span class="badge badge-danger">Hidden</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-success status-change" data-id ="{{ $item->id }}" title="Status Change"><i class="zmdi zmdi-mail-send"></i></a>
                                            <a href="{{ route('faq.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete" data-id ="{{ $item->id }}" title="Delete"><i class="zmdi zmdi-delete"></i></a>
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
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this FAQ!",
                icon: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{ url('/')}}/admin/cms/faq" + '/' + id,
                        type : "DELETE",
                        data : {_token : token,id:id},
                        success: function(){
                            swal({
                                text: "Poof! Your FAQ has been deleted!",
                                icon: "success",
                            }).then(function(){ 
                                location.reload();
                                }
                            );
                        },
                        error : function(){
                            swal({
                                title: 'Opps...',
                                text : "There is and error",
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
                } else {
                swal("Your imaginary file is safe!");
                }
            });
    });

    $(document).on('click', '.status-change', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = "{{ csrf_token() }}";
            swal({
                title: "Are you sure?",
                text: "You Want To Change status",
                icon: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{ url('/')}}/admin/cms/faq/status-change" + '/' + id,
                        type : "GET",
                        data : {_token : token,id:id},
                        success: function(){
                            swal({
                                text: "Poof! Status Changed",
                                icon: "success",
                            }).then(function(){ 
                                location.reload();
                                }
                            );
                        },
                        error : function(){
                            swal({
                                title: 'Opps...',
                                text : "There is an error",
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
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