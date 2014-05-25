<?php
use Acme\Forms\LoginForm;

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
        return View::make('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('email','password');
        $this->loginForm->validate($input);
        $remember = false;
        if(Input::has('remember') && Input::get('remember') == 1){
            $remember = true;
        }
        try
        {
    // Authenticate the user
            $user = Sentry::authenticate($input,$remember);
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            return Redirect::back()->withFlashMessage('Login field is required.');
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            return Redirect::back()->withFlashMessage('Password field is required.');
        }
        catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            return Redirect::back()->withFlashMessage('Wrong password, try again.');
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::back()->withFlashMessage('User was not found.');
        }
        catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            return Redirect::back()->withFlashMessage('User is not activated.');
        }

// The following is only required if the throttling is enabled
        catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
        {
            return Redirect::back()->withFlashMessage('User is suspended.');
        }
        catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
        {
            return Redirect::back()->withFlashMessage('User is banned.');
        }

        return Redirect::route('admin');
    }


    public function destroy($id = null)
    {
        Sentry::logout();
        return Redirect::route('admin.login');
    }

}