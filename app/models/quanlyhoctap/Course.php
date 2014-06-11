<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:09 AM
 */

class Course extends Eloquent{
    protected $table = "tbl_course";
    protected $connection ="hosohocvien";
    public $timestamps =false;
    protected $guarded = [];
    public static function getAllSelectData(){
        $data = array();
        $data[0]='Chưa xác định';
//        Chỉ lựa chọn khóa học còn đang mở
        $courses = Course::orderBy('name')->where('end','>',time())->get();
        foreach($courses as $course){
            $data[$course->id] = $course->name;
        }
        return $data;
    }
    public function classes(){
        return Course::hasMany('NClass','course_id','id');
    }

}