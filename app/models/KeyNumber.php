<?php

class KeyNumber extends Eloquent {

	protected $table = 'key_number';
	protected $guarded = array();


	public function job() {
		return $this->belongsTo('Job');
	}
}
