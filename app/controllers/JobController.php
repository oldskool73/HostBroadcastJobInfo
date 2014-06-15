<?php

class JobController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search') && Input::has('column')) {
			return JobController::search(Input::get('column'),Input::get('search'));
		}

		return Response::json(Job::select(['id','job_number','title','client','product'])->orderBy('id','desc')->get());
	}

	public function search($column,$term)
	{
		return Response::json(Job::select([$column])->where($column, 'LIKE', '%'.$term.'%')->groupBy($column)->get());
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
		return Response::json(Job::with('keyNumbers','secondary')->find($id));
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$job = Job::find($id);

		$job->client             	= Input::get('client');
		$job->job_number         	= Input::get('job_number');
		$job->product            	= Input::get('product');
		$job->title              	= Input::get('title');
		$job->format             	= Input::get('format');
		$job->format_other       	= Input::get('format_other');
		$job->length             	= Input::get('length');

		$job->creative_partner   	= Input::get('creative_partner');
		$job->agency_producer    	= Input::get('agency_producer');
		$job->agency_director    	= Input::get('agency_director');
		$job->project_manager    	= Input::get('project_manager');

		$job->production_company 	= Input::get('production_company');
		$job->director           	= Input::get('director');
		$job->dop                	= Input::get('dop');
		$job->producer           	= Input::get('producer');

		$job->post_production    	= Input::get('post_production');
		$job->editor             	= Input::get('editor');
		$job->conform            	= Input::get('conform');
		$job->post_engineer      	= Input::get('post_engineer');
		$job->design             	= Input::get('design');
		$job->masters_held_at    	= Input::get('masters_held_at');

		$job->audio_production   	= Input::get('audio_production');
		$job->audio_engineer     	= Input::get('audio_engineer');
		$job->music_details      	= Input::get('music_details');

		$job->music_expire_date  	= Input::get('music_expire_date');
		$job->roll_over_date     	= Input::get('roll_over_date');
		$job->first_air_date     	= Input::get('first_air_date');
		$job->off_air_date       	= Input::get('off_air_date');
		$job->other              	= Input::get('other');

		$job->stall_roll_over    	= Input::get('stall_roll_over');
		
		$job->save();

		return Response::json(array('success' => true));
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
