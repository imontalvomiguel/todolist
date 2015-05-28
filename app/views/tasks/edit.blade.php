@extends('layouts.main')
@section('content')
	{{ Form::model($task, array('route' => array('todos.tasks.update', $todo_id, $task->id), 'method' => 'PUT')) }}
		@include('tasks.partials._form')
	{{ Form::close() }}
@stop