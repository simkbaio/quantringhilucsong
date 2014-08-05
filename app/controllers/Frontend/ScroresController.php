<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 7/28/2014
 * Time: 9:28 PM
 */

namespace Frontend;


class ScroresController extends FrontendController {
    public function schedules(){
        if($this->account->StudentInfo()){
            return $this->schedules_student();
        }
        if($this->account->TeacherInfo()){
            return $this->schedules_teacher();
        }
    }
    public function schedules_student(){
        $student = $this->account->StudentInfo();
        $student_class = $student->StudentResult->NClass;
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
    public function schedules_teacher(){
        $student = $this->account->StudentInfo();
        $student_class = $student->StudentResult->NClass;
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

} 