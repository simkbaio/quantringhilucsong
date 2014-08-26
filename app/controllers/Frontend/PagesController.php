<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/11/2014
 * Time: 10:13 AM
 */

namespace Frontend;




class PagesController extends FrontendController {

    public function home(){
        if(\Sentry::check()){
            return \Redirect::to('dashbroad');
        }

        return \View::make('frontend.pages.new_home');
    }
    public function dashbroad(){
        return $this->view('frontend.pages.dashbroad');
    }
    public function schedules(){

    }
    public function student_profile(){
        $student = $this->account->StudentInfo();
        return $this->view('frontend.pages.student_profile')
            ->with('student',$student);
    }
    public function student_scores()
     {
         return $this->view('frontend.pages.student_scores');

     } 

} 