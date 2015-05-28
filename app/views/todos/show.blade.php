@extends('layouts.main')
@section('content')

	<div class="large-12 columns">
		<h1>{{{ $todo->name }}}</h1>	
		@foreach ($tasks as $task)
			@if ($task->completed_on)
				<h4><del>{{{ $task->content }}}</del></h4>	
			@else
				<h4>{{{ $task->content }}}</h4>
			@endif
			<ul class="no-bullet button-group">
				<li>
					{{ Form::model($todo, array('route' => array('todos.tasks.complete', $todo->id, $task->id), 'method' => 'PATCH')) }}
						{{ Form::button('Complete', ['type' => 'submit', 'class' => 'tiny button info']) }}
					{{ Form::close() }}
				</li>
				@if (!$task->completed_on)
					<li>
						{{ link_to_route('todos.tasks.edit', 'Update', [$todo->id, $task->id], ['class' => 'button tiny']) }}
					</li>
				@endif
				<li>
					{{ Form::model($todo, array('route' => array('todos.tasks.destroy', $todo->id, $task->id), 'method' => 'DELETE')) }}
						{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny button alert']) }}
					{{ Form::close() }}
				</li>
			</ul>
		@endforeach
		
		<ul class="no-bullet button-group">
			<li>
				{{ link_to_route('todos.tasks.create', 'Create Task', [$todo->id], ['class' => 'button success']) }}
			</li>
			<li>
				{{ link_to_route('todos.index', 'back', null, ['class' => 'button secondary']) }}
			</li>
		</ul>

	</div>
	
@stop