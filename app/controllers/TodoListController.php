<?php

class TodoListController extends \BaseController {

	/**
	 * Every time this controller is instantiated,
	 * we want to add a filter for CSRF.
	 */
	public function __construct() {

		/**
		 * We want to add the beforeFilter CSRF only for POST routes
		 */
		$this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete']));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$todos = Todo::all();
		return View::make('todos.index')->with('todos', $todos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('todos.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// define rules
		$rules = array(
			'name' => array('required', 'unique:todos')
		);

		// passs input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input is valid
		if ($validator->fails()) {
			return Redirect::route('todos.create')->withErrors($validator)->withInput();
		}

		$todoTitle = Input::get('name');
		$todo = new Todo();
		$todo->name = $todoTitle;
		$todo->save();
		return Redirect::route('todos.index')->withMessage('Todo was created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$todo = Todo::findOrFail($id);
		$tasks = $todo->tasks()->get();
		return View::make('todos/show')->withTodo($todo)->withTasks($tasks);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$todo = Todo::findOrFail($id);
		return View::make('todos.edit')->withTodo($todo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// define rules
		$rules = array(
			'name' => array('required', 'unique:todos')
		);

		// passs input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input is valid
		if ($validator->fails()) {
			return Redirect::route('todos.edit', $id)->withErrors($validator)->withInput();
		}

		$todoTitle = Input::get('name');
		$todo = Todo::findOrFail($id);
		$todo->name = $todoTitle;
		$todo->update();
		return Redirect::route('todos.index')->withMessage('Todo was updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo = Todo::findOrFail($id);
		$todo->delete();
		return Redirect::route('todos.index')->with('message', 'Todo was deleted');
	}


}
