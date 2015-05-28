@extends('layouts.main')
@section('content')
	{{ Form::model($todo, array('route' => array('todos.update', $todo->id), 'method' => 'PUT')) }}
		@include('todos.partials._form')
	{{ Form::close() }}
@stop