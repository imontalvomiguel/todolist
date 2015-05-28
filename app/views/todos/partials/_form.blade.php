{{ Form::label('name', 'List name') }}
{{ Form::text('name') }}
{{ $errors->first('name', '<small class="error">:message</small>') }}
{{ Form::submit('submit', array('class' => 'button')) }}