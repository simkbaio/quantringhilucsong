<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 8/26/2014
 * Time: 11:49 AM
 */

class StudentScore extends Eloquent {
	public $table = 'students_scores';
	protected $connection = 'hosohocvien';
	public static  function hasScore($student_id,$class_subject_id){
	    $score_record = self::whereStudentId($student_id)
		    ->whereClassSubjectId($class_subject_id)
		    ->first();
		if($score_record){
			return $score_record->score;
		}else{
			return 0;
		}
	}
} 