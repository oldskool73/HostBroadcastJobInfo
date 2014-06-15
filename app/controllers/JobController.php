<?php

class JobController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Job::select(['id','job_number','title','client','product'])->orderBy('id','desc')->get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Job::create(array(

			'client'             => Input::get('client'),
			'job_number'         => Input::get('job_number'),
			'product'            => Input::get('product'),
			'title'              => Input::get('title'),
			'format'             => Input::get('format'),
			'format_other'       => Input::get('format_other'),
			'length'             => Input::get('length'),

			'creative_partner'   => Input::get('creative_partner'),
			'agency_producer'    => Input::get('agency_producer'),
			'agency_director'    => Input::get('agency_director'),
			'project_manager'    => Input::get('project_manager'),

			'production_company' => Input::get('production_company'),
			'director'           => Input::get('director'),
			'dop'                => Input::get('dop'),
			'producer'           => Input::get('producer'),

			'post_production'    => Input::get('post_production'),
			'editor'             => Input::get('editor'),
			'conform'            => Input::get('conform'),
			'post_engineer'      => Input::get('post_engineer'),
			'design'             => Input::get('design'),
			'masters_held_at'    => Input::get('masters_held_at'),

			'audio_production'   => Input::get('audio_production'),
			'audio_engineer'     => Input::get('audio_engineer'),
			'music_details'      => Input::get('music_details'),

			'music_expire_date'  => Input::get('music_expire_date'),
			'roll_over_date'     => Input::get('roll_over_date'),
			'first_air_date'     => Input::get('first_air_date'),
			'off_air_date'       => Input::get('off_air_date'),
			'other'              => Input::get('other'),

			'stall_roll_over'    => Input::get('stall_roll_over')
		));

		return Response::json(array('success' => true));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Response::json(Job::find($id));
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);
		return Response::json(array('success' => true));
	}


}
