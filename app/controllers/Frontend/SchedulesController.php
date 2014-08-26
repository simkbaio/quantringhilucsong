<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 7/29/2014
 * Time: 8:39 PM
 */

namespace Frontend;


class SchedulesController extends FrontendController {
	public function index(){
		try{
			$student = $this->account->StudentInfo();
		}catch (\Exception $e){
			return \Redirect::to('dashbroad')
			                ->withFlashMessage('Xin lỗi, bạn chưa phải là học viên!');
		}
		try{
			$student_classes = $student->StudentResult;

		}catch (\Exception $e){
			return \Redirect::to('dashbroad')
			                ->withFlashMessage('Xin lỗi, bạn chưa được sắp xếp lớp');
		}
		$all_schedules  = [];
		foreach($student_classes as $class){
			foreach($class->NClass->schedules as $schedule){
				$schedules['class'] = $schedule->NClass;
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
			$all_schedules[] = $schedules;
		}
//        return dd($schedules['Thử xem nào'][7][0]);
		return $this->view('frontend.pages.student_schedules')
		            ->with('student',$student)
		            ->with('all_schedules',$all_schedules);
	}
} 