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
	    $input = Input::only('email','password','first_name','last_name','group');
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
        $input = Input::only('first_name','last_name','group','activated','permissions');
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
    public function changepassword($id){
        $user = Sentry::findUserById($id);
        $valid = Validator::make(Input::all(),[
           'password'=>'required|between:6,15|confirmed',
        ]);
        if($valid->passes()){
            $user->password = Input::get('password');
            $user->save();
            return "Bạn đã đổi mật khẩu hành công!";
        }else{
            return $valid->errors()->first('password');
        }

         return "OK";
    }
    function ResetPasswordRequest(){
        $this->UserForm->RequestResetPasswordValidate(Input::all());
        $user = Sentry::findUserByLogin(Input::get('email'));
        $resetCode = $user->getResetPasswordCode();
        $result = Mailgun::send('emails.users.reset_password',[
            'user'=>$user,
            'resetCode'=>$resetCode,

        ], function($message)


        {
            $user = Sentry::findUserByLogin(Input::get('email'));
            $message->to($user->email, $user->first_name)->subject('[ Nghị Lực Sống ] Khôi phục mật khẩu tài khoản');
        });
        return Redirect::route('admin.notice')->withFlashMessage('Bạn đã yêu cầu khôi phục mật khẩu thành công! Mời bạn kiểm tra hòm mail để biết thêm thông tin');

    }
    public function ResetPassword($id,$resetCode){

        if(Request::isMethod('POST')){
            $this->UserForm->ChangePasswordValidate(Input::all());
            $user = Sentry::getUser();
            $user->attemptResetPassword($resetCode,Input::get('password'));
            return Redirect::route('admin')
                ->withFlashMessage('Bạn đã khôi phục mật khẩu thành công');
        }else{
            $user = Sentry::findUserById($id);
            if($user->checkResetPasswordCode($resetCode)){
                Sentry::login($user);
                return View::make('admin.users.resetpassword');
            }else{
                return Redirect::route('admin.notice')->withFlashMessage('Xin lỗi! Yêu cầu đổi lại mật khẩu của bạn đã quá hạn sử dụng. Mời bạn yêu cầu đổi mật khẩu lại');

            }
        }

    }


}
