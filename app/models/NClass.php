<?php

class NClass extends \Eloquent
{
    protected $fillable = [];
    protected $guarded = [];
    protected $table = 'tbl_class';
    protected $connection = 'hosohocvien';
    public $timestamps = false;

    public function course()
    {
        if (Course::where('course_id', '=', $this->class_course_id)->count())
            return NClass::belongsTo('Course', 'class_course_id', 'course_id');
        else
            return false;
    }

    public function teacher()
    {
        if (Teacher::where('teacher_id', '=', $this->class_teacher_id)->count())
            return NClass::belongsTo('Teacher', 'class_teacher_id', 'teacher_id');
        else
            return false;
    }

    public function students()
    {

        return NClass::hasMany('StudentResult','result_class_id','class_id');

    }
    public  function notInStudents(){
        $students = StudentResult::where('result_class_id','=',$this->class_id)->get(['result_student_id']);
        $stu_id_arr = array();
        $data= array();
        if($students->count()){
            foreach($students as $student){
                $stu_id_arr[] = $student->result_student_id;
            }

            foreach(Student::whereNotIn('stu_id',$stu_id_arr)->orderBy('stu_name')->get() as $student){
                $data[$student->stu_id] = $student->stu_name;
            }
            return $data;
        }
        foreach(Student::orderBy('stu_name')->get() as $student){
            $data[$student->stu_id] = $student->stu_name;
        }

        return $data;

    }
    public function addStudent($id){
        $student = Student::where('stu_id','=',$id)->firstOrFail();
        $stu_result = StudentResult::create([
           'result_class_id'=>$this->class_id,
            'result_student_id'=>$id,
        ]);
        if($stu_result){
            return true;
        }else{
            return false;
        }





    }
}