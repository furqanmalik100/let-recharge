<label for="products">
	Select Amount
</label>
<div class="row">
	@for($i=0;$i<sizeof($products);$i++)
	<div class="col-lg-2 mb-4">
		<div class="product-box text-center box-amount" data-value="{{ $retail_prices[$i] }}" data-product="{{ $products[$i] }}" data-country="{{ $data->country }}" data-country_id="{{ $data->countryid }}" data-operator="{{ $data->operator }}" data-operator_id="{{ $data->operatorid }}" data-currency="{{ $data->destination_currency }}">
			<h6 class="mb-0">
				${{ $wholesale_prices[$i] }}
			</h6>
			<p class="mb-0" style="font-size: 12px;">
			    <small>(Inc. Tax ${{ $retail_prices[$i] - $wholesale_prices[$i] }})</small>
			</p>
			<h5 class="text-warning mb-0">
				${{ $retail_prices[$i] }}
			</h5>
		</div>
	</div>
	@endfor
</div>