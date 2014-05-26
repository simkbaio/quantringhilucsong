<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:09 AM
 */

class Teacher extends Eloquent{
    public $timestamps = false;
    protected $table = "tbl_teacher";
    protected $connection ="hosohocvien";
    protected $guarded = [];
    public static function getAllSelectData(){
        $data = array();
        $data[0]='Chưa xác định';
        // Chỉ lựa chọn Giáo viên còn đang hoạt động
        $teachers = Teacher::orderBy('teacher_name')->get();
        foreach($teachers as $teacher){
            $data[$teacher->teacher_id] = $teacher->teacher_name;
        }
        return $data;

    }
}