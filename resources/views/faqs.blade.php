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
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            How can i get help by inbound marketing?
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            I have questions about the updated trems
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            User Guide: Getting Started
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse4" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Are you plan to open a brance on Dhaka?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse5" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            How can i get help by x company?
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse6" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            What about loan programs?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse6" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse7" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            How long your contract trems?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse7" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#collapse8" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            What about after bank advantage?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse8" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        We are full service Digital Marketing Agency all the tools
                                        you need for inbound success. With this module theres
                                        no need to go another day.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection