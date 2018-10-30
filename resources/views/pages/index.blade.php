@extends('main')

@section('content')

{{-- @foreach($data as $d)
		<p>{{ $d->moneda }}</p>
		<p>{{ $d->valoare }}</p>
		<p>{{ $d->data }}</p>
@endforeach --}}
		
	{{-- 	@if($result) {
		{{ $result }}
		}
		@endif --}}


{{ Form::open(['route' => ['pages.setData'], 'method' => 'POST']) }}
{{-- {{ Form::text('value', null) }}
<select name="currency1" >
	@foreach($data as $d)
		<option value="{{ $d->valoare }}">{{ $d->moneda }}</option>
	@endforeach
</select>

<select name="currency2" >
	@foreach($data as $d)
		<option value="{{ $d->valoare }}">{{ $d->moneda }}</option>
	@endforeach
</select> --}}
{{ Form::label('data', 'Foloseste cursul din data de:') }}
<select name="data" >
	@foreach($date as $d)
		<option value="{{ $d->data }}">{{ $d->data }}</option>
	@endforeach
</select>
{{ Form::submit('Search') }}
{{ Form::close() }}

@endsection