@extends('layouts.main')
@section('title', 'Goods & Services')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/intl-tel/css/intlTelInput.min.css') }}">
<style type="text/css">
    .iti{
        display: block !important;
    }
    .hide{
        display: none;
    }
</style>
@endpush
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Goods & Services</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcumb end -->

<!-- topup begin -->
<div class="topup">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ $showRecipient ?? '' }}" id="order-details-tab" data-toggle="pill" href="#order-details"
                            role="tab" aria-controls="order-details" aria-selected="true">About Recipient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $showSummary ?? '' }}" id="payment-tab" data-toggle="pill" href="#payment" role="tab" aria-selected="false">Order Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $showDone ?? '' }}" id="done-tab" data-toggle="pill" href="#done" role="tab" aria-selected="false">Done</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @if(!empty($showRecipient))
                    <div class="tab-pane fade show active" id="order-details" role="tabpanel"
                        aria-labelledby="order-details-tab">
                        <form method="post" action="{{ route('save.service-order.details') }}">
                            @csrf
                            <input type="hidden" name="country" id="country-name" value="{{ $orderData->country ?? '' }}">
                            <input type="hidden" name="operator" id="operator-name" value="{{ $orderData->operator ?? '' }}">
                            <input type="hidden" name="operator_id" id="operator-id" value="{{ $orderData->operator_id ?? '' }}">
                            <input type="hidden" name="product" id="product-name" value="{{ $orderData->product ?? '' }}">
                            <input type="hidden" name="product_id" id="product-id" value="{{ $orderData->product_id ?? '' }}">
                            <input type="hidden" name="amount" id="amount" value="{{ $orderData->amount ?? '' }}">
                            <input type="hidden" name="currency" id="currency" value="{{ $orderData->currency ?? '' }}">
                        	<div class="form-group">
                                <label for="countries">
                                	Your Country
                                </label>
                                <select class="form-control" name="country_id" id="countries">
                                	<option selected disabled="" value="">Select Your Country</option>
                                    @foreach($countries as $c)
                                    <option value="{{ $c->country_id }}" @if($c->country_id == $selected_country) selected @endif>{{ $c->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-none">
                            	<label>
                                	Select Service
                                </label>
                                <select class="form-control" name="service_id" id="services">
                                    <option selected disabled="" value="">Select Service</option>
                                    @foreach($services as $s)
                                    <option value="{{ $s->service_id }}">{{ $s->service }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="recipient-phone">
                                <label for="phone-num">Enter the Phone Number You Want to
                                    Top-up</label>
                                <input type="text" name="phone" id="phone" class="form-control" type="tel" value="{{ $orderData->phone_number ?? '' }}">
                                <div id="valid-msg" class="hide alert alert-success">✓ Valid Number</div>
                                <div id="error-msg" class="hide alert alert-danger"></div>
                                <input type="hidden" name="phone_number" id="phone_number" value="{{ $orderData->phone_number ?? '' }}">
                            </div>
                            <div class="form-group d-none" id="operators">
                            </div>
                            <div class="form-group d-none" id="products">
                            </div>
                            <div class="buttons d-none mt-0 text-left" role="tablist" id="jump-to-summary">
                                <button class="theme-btn bold" type="submit">Continue</button>
                            </div>
                        </form>
                    </div>
                    @elseif(!empty($showSummary))
                    <div class="tab-pane fade show active" id="payment" role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        <div class="order-summery">
                            <h3 class="title">Order Summary</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Recipient</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" id="r-phone">{{ $orderData->phone_number }}</th>
                                        <td id="r-country">{{ $orderData->country }}</td>
                                        <td id="r-product">{{ $orderData->product }}</td>
                                        <td id="r-price">{{ $orderData->amount }} {{ $orderData->currency }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total</th>
                                        <td></td>
                                        <td></td>
                                        <td id="r-total">{{ $orderData->amount }} {{ $orderData->currency }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(Auth::check())
                        <form method="post" action="{{ route('save.service-order.payment') }}">
                            @csrf
                            <div class="buttons">
                                <a class="theme-btn bold" href="javascript:;" id="pay-amount" 
                                data-key="pk_test_YSnWvfoEhc4OukRBrk3qNFtM00vh7y94PO"
                                data-amount="{{ $orderData->amount * 100 }}"
                                data-currency="USD"
                                data-name="Let Recharge"
                                data-description="Pay {{ $orderData->amount }} {{ $orderData->currency }} to continue">Pay Amount</a>
                            </div>
                        </form>
                        @else
                        <a class="theme-btn inverse-btn" href="{{ route('services') }}?selected_country={{ $orderData->country_id }}">Go Back</a>
                        <a class="theme-btn" href="{{ route('login') }}">Login To Pay</a>
                        @endif
                    </div>
                    @else
                    <div class="tab-pane fade show active" id="done" role="tabpanel" aria-labelledby="done-tab">
                        <div class="done">
                            <h3 class="title">Payment Successful</h3>
                            <img src="{{ asset('assets/img/checked.png') }}" alt="" class="d-block mb-4">
                            <a href="{{ route('user.dashboard') }}" class="theme-btn">Go to Dashboard</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
@push('js') 
@if(!empty($showSummary))
<script src="https://checkout.stripe.com/v2/checkout.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#pay-amount').on('click', function(event) {
            event.preventDefault();

            var $button = $(this),
                $form = $button.parents('form');

            var opts = $.extend({}, $button.data(), {
                token: function(result) {
                    $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
                }
            });

            StripeCheckout.open(opts);
        });
    });
</script>
@endif
@if(!empty($showRecipient))
<script src="{{ asset('assets/intl-tel/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('assets/intl-tel/js/countries-iso.js') }}"></script>
<script type="text/javascript">
    var iti;
    var details_done = false;
    var payment_done = false;
	function getKey(value)
	{
        let key = Object.keys(isoCountries).find(k=>isoCountries[k]===value);
        return [key];
	}
	function initPhoneField(country)
	{
		var input = document.querySelector("#phone");
        var errorMsg = document.querySelector("#error-msg");
        var validMsg = document.querySelector("#valid-msg");

        var reset = function() {
          input.classList.remove("error");
          errorMsg.innerHTML = "";
          errorMsg.classList.add("hide");
          validMsg.classList.add("hide");
        };

        input.addEventListener('keyup', function() {
          reset();
          if (input.value.trim()) {
            if (iti.isValidNumber()) {
              validMsg.classList.remove("hide");
              $('#operators,#products').removeClass('d-none');
              $('#phone_number').val(iti.getNumber());
              $('#r-phone').text(iti.getNumber());
            } else {
              input.classList.add("error");
              errorMsg.innerHTML = 'Phone number is not valid';
              errorMsg.classList.remove("hide");
              $('#operators,#products,#jump-to-summary').addClass('d-none');
              details_done = false;
            }
          }
        });

		iti = window.intlTelInput(input, {
	      allowDropdown: false,
	      utilsScript: "{{ asset('assets/intl-tel/js/utils.js') }}",
	      onlyCountries: getKey(country),
          autoPlaceholder: "aggressive"
	    });

        $('#country-name').val(country);
        $('#r-country').text(country);
        reset();
        @if(!empty($orderData))
        $('#phone').keyup();
        @endif
	}
	initPhoneField("{{ $countryName }}");

    $('[name="country_id"]').change(function(){
        iti.destroy();
        $('#phone').val('');
        initPhoneField($(this).find('option:selected').text());
        $('[name="service_id"]').val('7').change();
        $('#operators,#products').html('').addClass('d-none');
        $('#jump-to-summary').addClass('d-none');
        details_done = false;
    });
    $(document).on('change', '[name="service_id"]', function(){
        $.post('{{ route("service.operators") }}', {
            _token: '{{ csrf_token() }}',
            country_id: $('#countries').val(),
            service_id: $(this).val()
        }, function(response){
            $('#operators').html(response);
            @if(!empty($orderData))
            $('#operators').removeClass('d-none');
            $('.operator-img-box[data-id="{{ $orderData->operator_id }}"]').click();
            @endif
        });
    });
    $(document).on('click', '.operator-img-box', function(){
        var operator_id = $(this).attr('data-id');
        $.post('{{ route("operator.products") }}', {
            _token: '{{ csrf_token() }}',
            operator_id: operator_id
        }, function(response){
            $('#products').html(response).removeClass('d-none');
            @if(!empty($orderData))
            $('.product-box[data-id="{{ $orderData->product_id }}"]').click();
            @endif
        });
    });
    $(document).on('click', '.operator-img-box', function(){
        var operator_id = $(this).attr('data-id');
        var operator_name = $(this).attr('data-name');
        $('#operator-id').val(operator_id);
        $('#operator-name').val(operator_name);

        $('.operator-img-box').removeClass('selected');
        $(this).addClass('selected');
    });
    $(document).on('click', '.product-box', function(){
        var product_id = $(this).attr('data-id');
        var product_name = $(this).attr('data-name');
        var amount = $(this).data('price');
        var currency = $(this).data('currency');

        $('#product-id').val(product_id);
        $('#product-name').val(product_name);
        $('#amount').val(amount);
        $('#currency').val(currency);

        $('.product-box').removeClass('selected');
        $(this).addClass('selected');

        $('#jump-to-summary').removeClass('d-none');
    });
    $('[name="service_id"]').val('7').change();

    $('#payment-tab,#order-details-tab,#done-tab').click(function(){
        return false;
    });
</script>
@endif
@endpush