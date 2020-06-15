<label for="operators">
	Select Product
</label>
<div class="row">
	@foreach($products as $p)
	<div class="col-lg-3 mb-4">
		<div class="product-box text-center" data-id="{{ $p->product_id }}" data-name="{{ $p->product_name }}" data-price="{{ $p->retail_price }}" data-currency="{{ $p->account_currency }}">
			<h6>{{ $p->product_name }}</h6>
			<p class="mb-1 desc">{{ $p->product_short_desc }}</p>
			<h6 class="text-warning mb-0">
				{{ $p->local_value . ' ' . $p->local_currency }} <br>
				<small>({{ $p->retail_price . ' ' . $p->account_currency }})</small>
			</h6>
		</div>
	</div>
	@endforeach
</div>