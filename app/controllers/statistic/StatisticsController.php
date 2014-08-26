<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 8/26/2014
 * Time: 9:36 AM
 */

class StatisticsController extends BaseController {
	function students(){
		$students = Student::with("NClass")->get();
		return View::make('Statistic.pages.students')
			->with('students',$students);
	}
	function classes(){
		$classes = NClass::with("students")->get();
		return View::make('Statistic.pages.classes')
		           ->with('classes',$classes);
	}
} 