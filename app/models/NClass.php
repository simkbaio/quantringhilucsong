<?php

class NClass extends \Eloquent {
	protected $fillable = [];
	protected $guarded =[];
	protected $table = 'tbl_class';
	protected $connection = 'hosohocvien';
	public $timestamps = false;
    public function course(){
       return NClass::belongsTo('Course','class_course_id','course_id');
    }
    public function teacher(){
        return NClass::belongsTo('Teacher','class_teacher_id','teacher_id');
    }
}