@extends('main')

@section('content')
<h4> {{ isset($result) ? 'Rezultat: '.number_format($result, 4).' '.$moneda2[0]->moneda : 'Select your currency' }} </h4>

<p> {{ (isset($val1) && isset($moneda1[0]->moneda)) ? '1 '.$moneda1[0]->moneda.' = ' : ''  }} {{ (isset($val2) && isset($moneda2[0]->moneda)) ? number_format($val1 / $val2, 4).' '.$moneda2[0]->moneda : '' }} </p>

{{ Form::open(['route' => ['convert.data', null], 'method' => 'POST']) }}
{{ Form::text('value', null) }}
<select name="currency1" >
	@foreach($options as $d)
		<option value="{{ $d->valoare }}">{{ $d->moneda }}</option>
	@endforeach
</select>

<select name="currency2" >
	@foreach($options as $d)
		<option value="{{ $d->valoare }}">{{ $d->moneda }}</option>
	@endforeach
</select>
<input type="hidden" value="{{ isset($dt) ? $dt : '' }}" name="dt">
{{ Form::submit('Search') }}
{{ Form::close() }}
<a href=" {{route('pages.chart')}} ">Check the euro graph</a>
@endsection
