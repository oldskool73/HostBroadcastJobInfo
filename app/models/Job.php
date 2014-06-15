<?php

class Job extends Eloquent {

	protected $table = 'job';
	protected $guarded = array();

	public function keyNumbers() {
		return $this->hasMany('KeyNumber');
	}

	public function secondary() {
		return $this->hasMany('Secondary');
	}	

}
