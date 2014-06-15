<?php

class AgencyDirectorController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
			return AgencyDirectorController::search(Input::get('search'));
		}

		return Response::json(Job::select(['agency_director'])->groupBy('agency_director')->get());
	}

	public function search($term)
	{
		return Response::json(Job::select(['agency_director'])->where('agency_director', 'LIKE', '%'.$term.'%')->groupBy('agency_director')->get());
	}

}
