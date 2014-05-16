<?php

use Acme\Forms\UserForm;


class UsersController extends BaseController {
    protected $UserForm;

    function __construct(UserForm $UserForm)
    {
        $this->UserForm = $UserForm;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
        return View::make('admin.users.index');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $input = Input::only('email','password','first_name','last_name');
        $this->UserForm->CreateValidate(Input::all());
        $user = User::createUser(Input::all(),true);
        return Redirect::route('admin.users.index')->withFlassMessage('Bạn đã thêm thành công người dùng mới');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        try{
        	$user = Sentry::findUserById($id);
        }catch(Cartalyst \ Sentry \ Users \ UserNotFoundException $e){
        	return Redirect::route('admin.users.index')
        		->withFlashMessage('Không tìm thấy người dùng');
        }
        return View::make('admin.users.edit')->withUser($user);


    }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::only('first_name','last_name','group','activated');
        $this->UserForm->UpdateValidate(Input::all());
        $user = User::updateUser($id,$input);
        return Redirect::route('admin.users.index')->withFlashMessage('Cập nhật thành công');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById($id);

            // Delete the user
            $user->delete();
            return Redirect::back()->withFlashMessage('Xóa thành công');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::back()->withFlashMessage('Không tìm thấy thành viên cần xóa');
        }

	}


}
