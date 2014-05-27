<?php

class AdminPagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('admin.pages.index');
	}
	public function notice(){
		if(Session::has('flash_message'))
			return View::make('admin.notice');
		else{
			return Redirect::route('admin');
		}
	}



}