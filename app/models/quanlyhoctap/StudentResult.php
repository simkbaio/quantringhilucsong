<?php

class StudentResult extends \Eloquent {
	public $connection = 'hosohocvien';
    protected $guarded = [];
    public $table = "tbl_student_result";
    public $timestamps = false;
    public function student(){
        return StudentResult::belongsTo('Student','result_student_id','id');
    }
    public function NClass(){
        return $this->belongsTo('NClass','result_class_id','id');
    }

}