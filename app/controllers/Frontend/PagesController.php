<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/11/2014
 * Time: 10:13 AM
 */

namespace Frontend;


class PagesController extends \BaseController {
    public function home(){
        if(\Session::has('errors')){
            return dd(\Session::get('errors'));
        }
        return \View::make('frontend.pages.home');
    }
} 