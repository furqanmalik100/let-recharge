<option selected disabled="" value="">Select Operator</option>
@foreach($operators as $o)
<option value="{{ $o->operator_id }}">{{ $o->operator }}</option>
@endforeach