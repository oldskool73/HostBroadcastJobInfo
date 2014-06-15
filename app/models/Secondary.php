<?php

class Secondary extends Eloquent {

	protected $table = 'secondary';
	protected $guarded = array();

	public function job() {
		return $this->belongsTo('Job');
	}
}
