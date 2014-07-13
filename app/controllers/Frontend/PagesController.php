<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/11/2014
 * Time: 10:13 AM
 */

namespace Frontend;


use Cartalyst\Sentry\Facades\Laravel\Sentry;

class PagesController extends \BaseController {
    public $account;
    function __construct()
    {
        if(Sentry::check()){
            $user = \User::findOrFail(Sentry::getUser()->id);
            $this->account = $user;
        }
    }

    public function home(){
        if(\Sentry::check()){
            return \Redirect::to('dashbroad');
        }

        return \View::make('frontend.pages.new_home');
    }
    public function dashbroad(){
        return $this->view('frontend.pages.dashbroad');
    }
    public function student_profile(){
        $student = $this->account->StudentInfo();
        return $this->view('frontend.pages.student_profile')
            ->with('student',$student);
    }
    public function view($layout =''){
        if($layout){
            return \View::make($layout)
                ->withAccount($this->account);
        }

    }
} 