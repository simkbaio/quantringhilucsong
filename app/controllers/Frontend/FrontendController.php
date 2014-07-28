<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 7/28/2014
 * Time: 9:29 PM
 */

namespace Frontend;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use View;

class FrontendController extends \BaseController {
    public $account;
    function __construct()
    {
        if(Sentry::check()){
            $user = \User::findOrFail(Sentry::getUser()->id);
            $this->account = $user;
        }
    }

    public function view($layout =''){
        if($layout){
            return View::make($layout)
                ->withAccount($this->account);
        }

    }
} 