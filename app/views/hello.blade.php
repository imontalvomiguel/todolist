@extends('layouts.main')
@section('content')
	<h1>Soy {{ $name }}</h1>
	<ol>
		@foreach (['uno', 'dos', 'tres'] as $item)
			<li>{{ $item }}</li>
		@endforeach
	</ol>

@stop