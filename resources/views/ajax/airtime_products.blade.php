<label for="products">
	Select Product
</label>
<select class="form-control" id="products" data-country="{{ $data->country }}" data-country_id="{{ $data->countryid }}" data-operator="{{ $data->operator }}" data-operator_id="{{ $data=>operatorid }}">
	<option selected disabled="" value="">Select Service</option>
	@for($i=0;$i<sizeof($products);$i++)
	<option value="{{ $retail_prices[$i] }}" data-product="{{ $products[$i] }}">{{ $retail_prices[$i] }}</option>
	@endfor
</select>