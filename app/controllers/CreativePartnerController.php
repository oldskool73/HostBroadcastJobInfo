<?php

class CreativePartnerController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('search')) {
			return CreativePartnerController::search(Input::get('search'));
		}

		return Response::json(Job::select(['creative_partner'])->groupBy('creative_partner')->get());
	}

	public function search($term)
	{
		return Response::json(Job::select(['creative_partner'])->where('creative_partner', 'LIKE', '%'.$term.'%')->groupBy('creative_partner')->get());
	}

}
