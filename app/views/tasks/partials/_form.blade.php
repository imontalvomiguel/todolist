{{ Form::label('content', 'Task content') }}
{{ Form::text('content') }}
{{ $errors->first('content', '<small class="error">:message</small>') }}
{{ Form::submit('submit', array('class' => 'button')) }}