@extends('layouts.main')
@section('title', 'My Account')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Dashboard</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>Dashboard</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb end -->

<!-- faq begin-->
<div class="faq">
    <div class="container">

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <h2>Products</h2>
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            Goods & Services
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                    	<div class="row">
                                    		@foreach($services as $s)
	                                       	<div class="col-lg-3 mb-4">
												<div class="product-box text-center">
													<h6>{{ $s->product }}</h6>
													<p class="mb-2 desc">You bought this product for <b class="text-warning">{{ $s->recipient }}</b></p>
													<a href="{{ route('repeat.service', $s->id) }}" class="btn btn-sm btn-warning">Repeat</a>
												</div>
											</div>
	                                       @endforeach
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            Airtime Topups
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                    	<div class="row">
                                    		@foreach($airtime as $s)
	                                       	<div class="col-lg-3 mb-4">
												<div class="product-box text-center">
													<h6>{{ $s->product }}</h6>
													<p class="mb-2 desc">You bought this product for <b class="text-warning">{{ $s->recipient }}</b></p>
													<a href="{{ route('repeat.airtime', $s->id) }}" class="btn btn-sm btn-warning text-white">Repeat</a>
												</div>
											</div>
	                                       @endforeach
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 mb-4">
                <h2>Tutorials</h2>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/sk7_DuLrhyA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/sk7_DuLrhyA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<!-- faq end -->
@endsection