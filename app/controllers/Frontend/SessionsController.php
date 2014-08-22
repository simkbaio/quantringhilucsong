<?php
namespace Frontend;
use Acme\Forms\LoginForm;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Input;
use Redirect;
use View;

class SessionsController extends \BaseController
{
    protected $loginForm;

    function __construct(LoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('email','password');
        try {
            $this->loginForm->validate($input);
        }
        catch(\Exception $e){
            return \Redirect::back()
                ->withFlashMessage('Bạn nhập sai thông tin đăng nhập!');

        }
        $remember = false;
        if(Input::has('remember') && Input::get('remember') == 1){
            $remember = true;
        }
        try
        {
            // Authenticate the user
            $user = Sentry::authenticate($input,$remember);
        }
        catch(\Exception $e){
            return  Redirect::back()->withFlashMessage("Bạn nhập sai email hoặc password!");
        }
	    if(\User::currentUser()->isAdmin()){
		    return Redirect::to("admin");
	    }
        return Redirect::to('dashbroad');
    }


    public function destroy($id = null)
    {
        Sentry::logout();
        return Redirect::to('/');
    }

    function forgotPassword(){
        return \View::make('frontend.pages.forgot_password');
    }
    public function resetPassword(){
        try
        {
            // Find the user using the user email address
            $user = Sentry::findUserByLogin(Input::get('email'));

            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();

            // Now you can send this code to your user via email for example.
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        $data = [
            'resetCode'=>$resetCode,
            'new_password'=>\Str::random(8),
            'user'=>$user,
        ];
        $result = \Mailgun::send('emails.users.member_reset_password',$data,function($message) use ($user){
            $message->to($user->email,$user->first_name)->subject('[Nghị Lực sống] Khôi phục mật khẩu');
        });
        return "Email khôi phục mật khẩu đã gửi thành công! Mời bạn check lại Email";

    }
    public function processResetPassword($member_id,$resetCode,$new_password){
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById($member_id);

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($resetCode))
            {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($resetCode,$new_password))
                {
                    return View::make('frontend.layouts.notice')
                        ->withContent('Mật khẩu của bạn đã đổi thành công');
                }
                else
                {
                    return View::make('frontend.layouts.notice')
                        ->withContent('Có lỗi trong quá trình đổi mật khẩu! Mời bạn vui lòng yêu cầu gửi lại mật khẩu mới');
                }
            }
            else
            {
                return View::make('frontend.layouts.notice')
                    ->withContent('Có lỗi trong quá trình đổi mật khẩu! Mời bạn vui lòng yêu cầu gửi lại mật khẩu mới');
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::to('/');
        }
    }

}