<?php


use Acme\Forms\profileForm;

class ProfilesController extends \BaseController {
    private $profileForm;

    function __construct(profileForm $profileForm)
    {
        $this->profileForm = $profileForm;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  username
	 * @return Response
	 */
	public function show($username)
	{
        try{
            $user = User::with('Profile')->whereUsername($username)->firstOrFail();

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return Redirect::home()->withFlashMessage('Profile not found');
        }
        return View::make("profiles.show")->withUser($user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username)
	{
        $user = ProfilesController::findUser($username);
        if($user->id != Auth::user()->id){
            return Redirect::home()->withFlashMessage("Bạn không thể truy cập phần này");
        }
		return View::make('profiles.edit')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username)
	{
        $user = ProfilesController::findUser($username);
        $input =Input::only('location','bio','facebook_username','google_username','twitter_username');
        $this->profileForm->validate($input);
        $user->profile->fill($input)->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
    public static function findUser($username){
        try{
            $user = User::with('Profile')->whereUsername($username)->firstOrFail();

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return Redirect::home()->withFlashMessage('Profile not found');
        }
        return $user;
    }

}