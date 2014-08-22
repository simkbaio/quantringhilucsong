<?php

class NClass extends \Eloquent
{
    protected $fillable = [];
    protected $guarded = [];
    protected $table = 'classes';
    protected $connection = 'hosohocvien';
    public $timestamps = false;

    public function course()
    {
            return $this->belongsTo('Course', 'course_id', 'id');
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

        return $this->hasMany('StudentResult','result_class_id','id');

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
    public function subjects(){
        return $this->hasMany('ClassSubject','class_id','id');
    }
    public function subjects_array(){
        $subjects_arr = [];
        foreach($this->subjects as $subject){
            $subjects_arr[$subject->subject_id] = $subject->subject_id;
        }
        return $subjects_arr;
    }
    public function subjects_not_in(){
        $subjects = $this->subjects_array();
        $subjects_not_in = [];
        foreach(Subject::all() as $s){
            if(isset($subjects[$s->id])){
                continue;
            }else{
                $subjects_not_in[$s->id] = $s->name;
            }
        }
        return $subjects_not_in;
    }
    public function schedules(){
       return NClass::hasMany('ClassSchedule','class_id','id');
    }
}