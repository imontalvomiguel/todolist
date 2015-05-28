<?php 

class Task extends Eloquent {

	public function todo() {
		return $this->belongsTo('Todo');
	}
	
}
