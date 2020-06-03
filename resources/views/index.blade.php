@extends('layouts.main')
@section('title', 'Home')
@section('content')
<!-- banner begin -->
<div class="banner">
    <div class="banner-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <form method="get" action="{{ route('topup') }}">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 text-left">
                                <div class="text">
                                    <h4 class="bold">online <span class="text-warning">recharge</span> you're mobile.</h4>
                                </div>
                                <div class="select-country">
                                    <select class="form-control" id="country-list" required="" name="country_id">
                                        <option selected disabled="" value="">Select Your Country</option>
                                        @foreach($countries as $c)
                                        <option value="{{ $c->country_id }}">{{ $c->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="banner-features-list">
                                    <ul>
                                        <li>
                                            <i class="fa fa-check-circle"></i> Fast & secure top up service
                                        </li>
                                        <li>
                                            <i class="fa fa-check-circle"></i> Send credit in over 140 countries
                                        </li>
                                        <li>
                                            <i class="fa fa-check-circle"></i> Refill minutes & data in 3 easy steps
                                        </li>
                                        <li>
                                            <i class="fa fa-check-circle"></i> Great offers for instant top ups
                                        </li>
                                        <li>
                                            <i class="fa fa-check-circle"></i> Stay in touch with family & friends
                                        </li>
                                    </ul>
                                </div>
                                <input type="hidden" name="operator_id" id="operator_id">
                                <div id="operators"></div>
                                <button class="theme-btn" id="recharge-submit" type="submit">Recharge Now</button>
                            </div>
                            <div class="col-xl-6 col-lg-6 text-center">
                                <div class="promo-slider">
                                    <div class="single-promo text-center">
                                        <h6 class="text-warning bold mb-0 uppercase">Pakistan</h6>
                                        <div class="img-container">
                                            <img src="https://mobilerecharge.com/images/operators/ncell.jpg" alt="">
                                        </div>
                                        <h6 class="text-white"><b class="text-warning">50%</b> discount on <b class="text-warning">Zong</b></h6>
                                    </div>
                                    <div class="single-promo text-center">
                                        <h6 class="text-warning bold mb-0 uppercase">India</h6>
                                        <div class="img-container">
                                            <img src="https://mobilerecharge.com/images/operators/ncell.jpg" alt="">
                                        </div>
                                        <h6 class="text-white"><b class="text-warning">50%</b> discount on <b class="text-warning">Zong</b></h6>
                                    </div>
                                    <div class="single-promo text-center">
                                        <h6 class="text-warning bold mb-0 uppercase">Nepal</h6>
                                        <div class="img-container">
                                            <img src="https://mobilerecharge.com/images/operators/ncell.jpg" alt="">
                                        </div>
                                        <h6 class="text-white"><b class="text-warning">50%</b> discount on <b class="text-warning">Zong</b></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- choosing reason begin -->
<div class="choosing-reason">
    <div class="shape-2">
        <img src="{{ asset('assets/img/shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="title-box">
                    <div class="shape-1">
                        <img src="{{ asset('assets/img/shape-1.png') }}" alt="">
                    </div>
                    <h2>Why Choose Us</h2>
                    <p>Received shutters expenses ye he pleasant.
                        Drift as blind above at up. No up simple county
                        stairs do should praise as.</p>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="all-reasons">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="single-reason">
                                <div class="reason-head">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/img/svg/startup.svg') }}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <h3>faster money transfer</h3>
                                    </div>
                                </div>
                                <div class="reason-body">
                                    <p>Out believe has request not how comfort
                                    evident. Up delight cousins we feeling.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="single-reason">
                                <div class="reason-head">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/img/svg/padlock.svg') }}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <h3>more than security</h3>
                                    </div>
                                </div>
                                <div class="reason-body">
                                    <p>Out believe has request not how comfort
                                        evident. Up delight cousins we feeling.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="single-reason">
                                <div class="reason-head">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/img/svg/users.svg') }}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <h3>1.5m people Trust to Us</h3>
                                    </div>
                                </div>
                                <div class="reason-body">
                                    <p>Out believe has request not how comfort
                                        evident. Up delight cousins we feeling.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="single-reason">
                                <div class="reason-head">
                                    <div class="part-icon">
                                        <img src="{{ asset('assets/img/svg/hand.svg') }}" alt="">
                                    </div>
                                    <div class="part-text">
                                        <h3>Very Affordable</h3>
                                    </div>
                                </div>
                                <div class="reason-body">
                                    <p>Out believe has request not how comfort
                                        evident. Up delight cousins we feeling.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- choosing reason end -->

<!-- desired product begin -->
<div class="desired-product">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7 col-sm-10">
                <div class="section-title text-center">
                    <h2>Choose the desired product</h2>
                    <p>To sure calm much most long me mean. Able rent long in do we. Uncommonly no it announcing melancholy an in. Mirth
                        learn it he given.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-sm-center justify-content-md-start">
            <div class="col-xl-4 col-lg-4 col-sm-8 col-md-6">
                <div class="single-product">
                    <h3>regular user</h3>
                    <span class="subtitle">$0 Upfront Cos</span>
                    <span class="price">$11.00 Only</span>
                    <ul>
                        <li>5gb internet data</li>
                        <li>$100 Local Balance</li>
                        <li>$10 International Balance</li>
                        <li>1000 SMS</li>
                    </ul>
                    <a href="#">Recherge Now</a>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-8 col-md-6">
                <div class="single-product special">
                    <h3>regular user</h3>
                    <span class="subtitle">$0 Upfront Cos</span>
                    <span class="price">$11.00 Only</span>
                    <ul>
                        <li>5gb internet data</li>
                        <li>$100 Local Balance</li>
                        <li>$10 International Balance</li>
                        <li>1000 SMS</li>
                    </ul>
                    <a href="#">Recherge Now</a>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-8 col-md-6">
                <div class="single-product">
                    <h3>regular user</h3>
                    <span class="subtitle">$0 Upfront Cos</span>
                    <span class="price">$11.00 Only</span>
                    <ul>
                        <li>5gb internet data</li>
                        <li>$100 Local Balance</li>
                        <li>$10 International Balance</li>
                        <li>1000 SMS</li>
                    </ul>
                    <a href="#">Recherge Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- desired product end -->

<!-- feature begin -->
<div class="feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7">
                <div class="section-title text-center">
                    <h2>our futures</h2>
                    <p>To sure calm much most long me mean. Able rent long in do we. Uncommonly no it announcing melancholy an
                        in. Mirth
                        learn it he given.</p>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/smartphone-2.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>Online Mobile Top-Up</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he prevailed.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/global.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>Internet Package</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he
                            prevailed.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/customer-service.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>Personal customer service</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he
                            prevailed.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/update.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>Status updates 24/7</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he
                            prevailed.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/padlock-1.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>We've got your back!</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he
                            prevailed.</p>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="single-feature">
                    <div class="part-icon">
                        <img src="{{ asset('assets/img/svg/shield.svg') }}" alt="">
                    </div>
                    <div class="part-text">
                        <h3>Money-back guarantee</h3>
                        <p>On on produce colonel pointed. Just four sold need over how any. In to september suspicion determine he
                            prevailed.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- feature end -->

<!-- statics begin -->
<div class="statics">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-end">
                <div class="single-static">
                    <div class="inner-content">
                        <span class="count count-up">1.2</span>
                        <span class="title">Register user</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="single-static special">
                    <div class="inner-content">
                        <span class="count count-up">1.2</span>
                        <span class="title">Happy Client</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-3">
                <div class="single-static special">
                    <div class="inner-content">
                        <span class="count count-up">5.6</span>
                        <span class="title">Mobile Top-UP</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 col-lg-3 d-xl-flex d-lg-flex d-block align-items-end">
                <div class="single-static">
                    <div class="inner-content">
                        <span class="count count-up">29</span>
                        <span class="title">Payment Method</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- statics end -->

<!-- testimonial begin -->
<div class="testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-7">
                <div class="section-title text-center">
                    <h2>our client feedback</h2>
                    <p>To sure calm much most long me mean. Able rent long in do we. Uncommonly no it announcing melancholy an
                        in. Mirth
                        learn it he given.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="testimonial-slider">
                    <div class="single-testimonial">
                        <div class="part-text">
                            <p>Their could can widen ten she any. As so we smart those money in. Am wrote up whole so tears sense oh. Absolute required
                            of reserved in offering no.</p>
                        </div>
                        <div class="part-user">
                            <div class="user-img">
                                <img src="{{ asset('assets/img/user-1.jpg') }}" alt="">
                            </div>
                            <div class="user-data">
                                <span class="user-name">Macie Novak</span>
                                <span class="user-position">ui/ux designer</span>
                            </div>
                        </div>
                    </div>

                    <div class="single-testimonial">
                        <div class="part-text">
                            <p>Their could can widen ten she any. As so we smart those money in. Am wrote up whole so tears sense oh.
                                Absolute required
                                of reserved in offering no.</p>
                        </div>
                        <div class="part-user">
                            <div class="user-img">
                                <img src="{{ asset('assets/img/user-1.jpg') }}" alt="">
                            </div>
                            <div class="user-data">
                                <span class="user-name">Macie Novak</span>
                                <span class="user-position">ui/ux designer</span>
                            </div>
                        </div>
                    </div>

                    <div class="single-testimonial">
                        <div class="part-text">
                            <p>Their could can widen ten she any. As so we smart those money in. Am wrote up whole so tears sense oh.
                                Absolute required
                                of reserved in offering no.</p>
                        </div>
                        <div class="part-user">
                            <div class="user-img">
                                <img src="{{ asset('assets/img/user-1.jpg') }}" alt="">
                            </div>
                            <div class="user-data">
                                <span class="user-name">Macie Novak</span>
                                <span class="user-position">ui/ux designer</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial end -->

<!-- call to action begin -->
<div class="cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-6">
                <div class="part-text">
                    <h4>New Offer for New Member</h4>
                    <h2>Recharge Mobile top-up $30 And Win $5 Bonus</h2>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 d-xl-flex d-lg-flex d-block align-items-center">
                <div class="part-button">
                    <a href="#">Recharge Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- call to action end -->
@endsection
@push('js')
<script type="text/javascript">
    var promoSlider = $('.promo-slider');
    promoSlider.owlCarousel({
        loop: true,
        dots: true,
        nav: true, 
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        margin: 0,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            960: {
                items: 1
            },
            1200: {
                items: 1
            },
            1920: {
                items: 1
            }
        }
    }); 
    $('[name="country_id"]').change(function(){
        $.post('{{ route("operators") }}', {
            _token: '{{ csrf_token() }}',
            country_id: $(this).val()
        }, function(response){
            $('.banner-features-list').hide();
            $('#operators').html(response).show();
        });
    });
    $(document).on('click', '.operator-img-box', function(){
        $('#operator_id').val($(this).data('id'));
        $('.operator-img-box').addClass('faded');
        $(this).removeClass('faded');
    });
</script>
@endpush