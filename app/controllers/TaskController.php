<?php

class TaskController extends \BaseController {

	public function __construct() {

		/**
		 * We want to add the beforeFilter CSRF only for POST routes
		 */
		$this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($todo_id)
	{
		$todo = Todo::findOrFail($todo_id);
		return View::make('tasks.create')->withTodo($todo);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($todo_id)
	{
		$todo = Todo::findOrFail($todo_id);
		$data = Input::all();

		// define rules
		$rules = array(
			'content' => array('required', 'unique:tasks')
		);

		// passs input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input is valid
		if ($validator->fails()) {
			return Redirect::route('todos.tasks.create', $todo_id)->withErrors($validator)->withInput();
		}

		$taskContent = Input::get('content');
		$task = new Task();
		$task->content = $taskContent;
		$todo->tasks()->save($task);
		return Redirect::route('todos.show', $todo_id)->withMessage('Task was created');
		dd($data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $todo_id
	 * @param  int  $task_id
	 * @return Response
	 */
	public function edit($todo_id, $task_id)
	{
        $todoList = Todo::findOrFail($todo_id);
		$task = $todoList->tasks()->findOrFail($task_id);

		return View::make('tasks.edit')->withTask($task)->withTodoId($todo_id);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($todo_id, $task_id)
	{
		// define rules
		$rules = array(
			'content' => array('required', 'unique:tasks')
		);

		// passs input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input is valid
		if ($validator->fails()) {
			return Redirect::route('todos.tasks.edit', [$todo_id, $task_id])->withErrors($validator)->withInput();
		}

		$taskContent = Input::get('content');
		$task = Task::findOrFail($task_id);
		$task->content = $taskContent;
		$task->update();
		return Redirect::route('todos.show', $todo_id)->withMessage('Task was updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($todo_id, $task_id)
	{
		$task = Task::findOrFail($task_id);
		$task->delete();
		return Redirect::route('todos.show', $todo_id)->with('message', 'Task was deleted');

	}

	/**
	 * Complete the task
	 *
	 * @param  int  $todo_id
 	 * @param  int  $todo_task
	 * @return Response
	 */
	public function complete($todo_id, $task_id)
	{
		$task = Task::findOrFail($task_id);
		$task->completed_on = date('Y-m-d H:i:s');
		$task->update();
		return Redirect::route('todos.show', $todo_id)->with('message', 'Task was completed');
	}


}
