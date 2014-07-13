<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('pages.index');
	}

	public function notice(){
			return View::make('admin.notice');
	}

}