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
        if (Course::find($this->course_id))
            return NClass::belongsTo('Course', 'course_id', 'id');
        else
            return false;
    }

    public function teacher()
    {
        if (Teacher::find($this->teacher_id))
            return NClass::belongsTo('Teacher', 'teacher_id', 'id');
        else
            return false;
    }

    public function students()
    {

        return NClass::hasMany('StudentResult','result_class_id','id');

    }
    public  function notInStudents(){
        $students = StudentResult::where('result_class_id','=',$this->id)->get(['result_student_id']);
        $id_arr = array();
        $data= array();
        if($students->count()){
            foreach($students as $student){
                $id_arr[] = $student->result_student_id;
            }

            foreach(Student::whereNotIn('id',$id_arr)->orderBy('name')->get() as $student){
                $data[$student->id] = $student->name;
            }
            return $data;
        }
        foreach(Student::orderBy('name')->get() as $student){
            $data[$student->id] = $student->name;
        }

        return $data;

    }
    public function addStudent($id){
        $student = Student::where('id','=',$id)->firstOrFail();
        $result = StudentResult::create([
           'result_class_id'=>$this->id,
            'result_student_id'=>$id,
        ]);
        if($result){
            return true;
        }else{
            return false;
        }

    }
    public function removeStudent($id){
        $student = Student::where('id','=',$id)->firstOrFail();
        $result = StudentResult::whereResultStudentId($student->id)->delete();
        if($result){
            return true;
        }else{
            return false;
        }

    }
    public function schedules(){
       return NClass::hasMany('ClassSchedule','class_id','id');
    }
}