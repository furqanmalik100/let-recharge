@extends('layouts.main')
@section('content')
<!-- breadcumb begin -->
<div class="recuge-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="breadcrumb-content">
                    <h2>Recharge Mobiles Online</h2>
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
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                            role="tab" aria-controls="pills-home" aria-selected="true">Operator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                            role="tab" aria-controls="pills-contact" aria-selected="false">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="four-tab" data-toggle="pill" href="#four"
                            role="tab" aria-controls="pills-contact" aria-selected="false">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="five-tab" data-toggle="pill" href="#five" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Done</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <form>
                        	<div class="form-group">
                                <label for="countries">
                                	Your Country
                                </label>
                                <select class="form-control" name="country_id" id="countries">
                                	<option selected disabled="" value="">Select Your Country</option>
                                    @foreach($countries as $c)
                                    <option value="{{ $c->country_id }}">{{ $c->country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            	<label>
                                	Select your operator
                                </label>
                            	<div class="row" id="operators">
									@foreach($operators as $opt)
									<div class="col-lg-4 mb-4">
										<div class="operator-img-box" data-id="{{ $opt->operator_id }}">
											<img class="operator-img" src="https://operator-logo.dtone.com/logo-{{ $opt->operator_id }}-2.png" alt="{{ $opt->operator }}">
										</div>
									</div>
									@endforeach
								</div>
                            </div>
                            <div class="form-group">
                                <label for="phone-num">Enter the Phone Number You Want to
                                    Top-up</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="buttons" role="tablist">
                                <a class="base-button" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Next</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                        aria-labelledby="pills-contact-tab">
                        <div class="order-summery">
                            <h3 class="title">Order Summary</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Recipient</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Receive amount</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">+8801729-123456</th>
                                        <td>Mobile Operator</td>
                                        <td>400 TK</td>
                                        <td>$05 USD</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Subtotal</th>
                                        <td></td>
                                        <td></td>
                                        <td>$05 USD</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Processing fee</th>
                                        <td></td>
                                        <td></td>
                                        <td>$00 USD</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Total</th>
                                        <td></td>
                                        <td></td>
                                        <td>$05 USD</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Free - Send them an sms?</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">I have a promotional code</label>
                        </div>
                        <div class="buttons">
                            <a class="base-button" href="#">+ Add another top-up</a>
                            <a class="base-button" href="#">Proceed to checkout</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="four" role="tabpanel"
                        aria-labelledby="four-tab">
                        <div class="credit-card mt-5">
                            <form>
                                <h3 class="title">Credit Card Information</h3>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail09">Credit Card Number</label>
                                            <input type="email" class="form-control" id="exampleInputEmail09"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail10">Expiration Date</label>
                                            <input type="email" class="form-control" id="exampleInputEmail10"
                                                placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail11">Cvv</label>
                                            <input type="email" class="form-control" id="exampleInputEmail11"
                                                placeholder="CVC">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail12">Full Name</label>
                                            <input type="email" class="form-control" id="exampleInputEmail12"
                                                placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">Stored Credit/Debit Card for future use.</label>
                        </div>
                        <button class="mt-4 base-button" type="submit">Start Now</button>
                        </div>
                    <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">
                        <div class="done">
                            <h3 class="title">Payment Successful</h3>
                            <img src="assets/img/checked.png" alt="">
                            <p>Your payment $8 has been successfully<br/>
                                to receive +8801700123456 Mobile Operator.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('intl-tel/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('intl-tel/js/countries-iso.js') }}"></script>
<script type="text/javascript">
	function getKey(value)
	{
		let key = Object.keys(isoCountries).find(k=>obj[k]===value);
		return key;
	}
	function initPhoneField(country)
	{
		var input = document.querySelector("#phone");
		window.intlTelInput(input, {
	      allowDropdown: false,
	      utilsScript: "build/js/utils.js",
	      onlyCountries: getKey(country)
	    });
	}
	$('[name="country_id"]').change(function(){
        $.post('{{ route("operators") }}', {
            _token: '{{ csrf_token() }}',
            country_id: $(this).val()
        }, function(response){
            $('#operators').html(response).show();
        });
    });
    $(document).on('click', '.operator-img-box', function(){
        $('#operator_id').val($(this).data('id'));
        $('.operator-img-box').addClass('faded');
        $(this).removeClass('faded');
    });
	initPhoneField("{{ session('countries')[$request->country_id] }}");
</script>
@endpush
@endsection