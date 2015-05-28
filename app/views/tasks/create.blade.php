@extends('layouts.main')
@section('content')
	{{ Form::open( array('route' => ['todos.tasks.store', $todo->id])) }}
		@include('tasks.partials._form')
	{{ Form::close() }}
@stop