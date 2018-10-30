@extends('main')

@section('content')

{{ Form::open(['route' => ['pages.setData'], 'method' => 'POST']) }}
{{ Form::label('data', 'Foloseste cursul din data de:') }}
<select name="data" >
	@foreach($date as $d)
		<option value="{{ $d->data }}">{{ $d->data }}</option>
	@endforeach
</select>
{{ Form::submit('Search') }}
{{ Form::close() }}

@endsection
