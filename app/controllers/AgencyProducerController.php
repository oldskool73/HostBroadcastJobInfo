<?php

class AgencyProducerController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
			return AgencyProducerController::search(Input::get('search'));
		}

		return Response::json(Job::select(['agency_producer'])->groupBy('agency_producer')->get());
	}

	public function search($term)
	{
		return Response::json(Job::select(['agency_producer'])->where('agency_producer', 'LIKE', '%'.$term.'%')->groupBy('agency_producer')->get());
	}

}
