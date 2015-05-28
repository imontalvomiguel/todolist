<?php 

class Todo extends Eloquent {

	public function tasks() {
		return $this->hasMany('Task');
	}

	/**
	 * Overwriting the delete method of Eloquent
	 * I want to delete all the items linked with the todo
	 * that is being destroyed.
	 */

	public function delete() 
	{
		$dependentTasks = Task::where('todo_id', $this->id);
		$dependentTasks->delete();

		// Calling the parent class method delete
		parent::delete();
	}
	
}
