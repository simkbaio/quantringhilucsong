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
        try{
            $student = $this->account->StudentInfo();
        }catch (\Exception $e){
            return \Redirect::to('dashbroad')
                ->withFlashMessage('Xin lỗi, bạn chưa phải là học viên!');
        }
        try{
            $student_class = $student->StudentResult->NClass;
        }catch (\Exception $e){
            return \Redirect::to('dashbroad')
                ->withFlashMessage('Xin lỗi, bạn chưa được sắp xếp lớp');
        }
        $schedules = array();

        foreach($student_class->schedules as $schedule){
            switch($schedule->day){
                case 1:
                    $schedules[$schedule->subject->name][1][] = $schedule;
                    break;
                case 2:
                    $schedules[$schedule->subject->name][2][] = $schedule;
                    break;
                case 3:
                    $schedules[$schedule->subject->name][3][] = $schedule;
                    break;
                case 4:
                    $schedules[$schedule->subject->name][4][] = $schedule;
                    break;
                case 5:
                    $schedules[$schedule->subject->name][5][] = $schedule;
                    break;
                case 6:
                    $schedules[$schedule->subject->name][6][] = $schedule;
                    break;
                case 7:
                    $schedules[$schedule->subject->name][7][] = $schedule;
                    break;
            }
        }
//        return dd($schedules['Thử xem nào'][7][0]);
        return $this->view('frontend.pages.student_schedules')
            ->with('student',$student)
            ->with('student_class',$student_class)
            ->with('schedules',$schedules);
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