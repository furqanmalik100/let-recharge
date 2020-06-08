@extends('layouts.main')
@section('title', 'FAQs')
@section('content')
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>FAQs</h2>
                    <a href="{{ route('home') }}">Home</a>
                    <span>FAQs</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="faq">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        @foreach ($faqs as $item)
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse_{{ $item->id }}" aria-expanded="false"
                                            aria-controls="collapse_{{ $item->id }}">
                                            {!! $item->question !!}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse_{{ $item->id }}" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! $item->answer !!}
                                    </div>
                                </div>
                            </div>
                        </div>  
                        @endforeach
                        
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection