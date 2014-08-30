<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 8/29/2014
 * Time: 4:50 PM
 */

class ClassTeacher extends QuanLyHocTapDb  {
	public $table = 'classes_teachers';
	public $guarded = [];
	public $timestamps = false;
	public function teacher(){
	    return $this->hasOne('Teacher','teacher_id','id');
	}
	public function NClass(){
	    return $this->hasOne('NClass','class_id','id');
	}
} 