<option selected disabled="" value="">Select Service</option>
@foreach($services as $s)
<option value="{{ $s->service_id }}">{{ $s->service }}</option>
@endforeach