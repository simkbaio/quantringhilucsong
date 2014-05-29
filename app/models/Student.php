<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:05 AM
 */

class Student extends Eloquent {
    protected $connection = "hosohocvien";
    protected $table = "tbl_student";
    public  $timestamps = false;
    protected $guarded = ['id'];
    public function results(){
        return Student::belongsTo('Student','result_student_id','id');
    }
}
