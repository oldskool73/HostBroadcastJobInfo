<?php

class ClientController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
			return ClientController::search(Input::get('search'));
		}

		return Response::json(Job::select(['client'])->groupBy('client')->get());
	}

	public function search($term)
	{
		return Response::json(Job::select(['client'])->where('client', 'LIKE', '%'.$term.'%')->groupBy('client')->get());
	}

}
