<label for="operators">
	Select Operator
</label>
<div class="row">
	@foreach($opts as $opt)
	<div class="col-lg-4 mb-4">
		<div class="operator-img-box" data-id="{{ $opt->operator_id }}" data-name="{{ $opt->operator }}">
			<img class="operator-img" src="https://operator-logo.dtone.com/logo-{{ $opt->operator_id }}-2.png" alt="{{ $opt->operator }}">
		</div>
	</div>
	@endforeach
</div>