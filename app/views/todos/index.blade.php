@extends('layouts.main')
@section('content')
	<h1>Show all todo list</h1>

	@foreach ($todos as $todo)
		<h4>{{ link_to_route('todos.show', $todo->name, array($todo->id)) }}</h4>
		<ul class="no-bullet button-group">
			<li>
				{{ link_to_route('todos.edit', 'Edit', [$todo->id], ['class' => 'tiny button']) }}
			</li>
			<li>
				{{ Form::model($todo, array('route' => array('todos.destroy', $todo->id), 'method' => 'DELETE')) }}
					{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny button alert']) }}
				{{ Form::close() }}
			</li>
		</ul>
	@endforeach


	{{ link_to_route('todos.create', 'Create Todo List', null, ['class' => 'button success']) }}	

@stop