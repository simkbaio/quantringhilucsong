<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 6/2/2014
 * Time: 4:22 PM
 */

class ClassSchedulesController extends \BaseController {
    public $classScheduleForm;

    function __construct(\Acme\Forms\ClassScheduleForm $classScheduleForm)
    {
        $this->classScheduleForm = $classScheduleForm;
    }
    public function create($class_id){
        $class = NClass::findOrFail($class_id);
        return View::make('quanlyhoctap.class_schedules.create')->withClass($class);
    }
    public function store(){
        $input = Input::except('_token');
        $schedule = ClassSchedule::create($input);
	    if(!$schedule){
		    return Redirect::back()
		                   ->withFlashMessage('Lỗi khi thêm môn học');
	    }
	    if(ClassSubject::whereClassId($schedule->class_id)->whereSubjectId($schedule->subject_id)->count() == 0){
		    ClassSubject::create([
			    'class_id'=>$schedule->class_id,
			    'subject_id'=>$schedule->subject_id,
		    ]);
	    }
	    if(ClassTeacher::whereClassId($schedule->class_id)->whereTeacherId($schedule->teacher_id)->count() == 0){
		    ClassTeacher::create([
			    'class_id'=>$schedule->class_id,
			    'teacher_id'=>$schedule->teacher_id,
		    ]);
	    }
        return Redirect::back()
            ->withFlashMessage('Thêm lịch học thành công');
    }
    function edit($class_id,$id){
        $schedule = ClassSchedule::with('NClass')->findOrFail($id);
        return View::make('quanlyhoctap.class_schedules.edit')
            ->with('schedule',$schedule);
    }
    public function destroy($id){
        $schedule = ClassSchedule::findOrFail($id);
        $schedule->delete();
        return Redirect::back()
            ->withFlashMessage('Hủy thành công lịch học');

   }
    public function update($class_id,$id){
        $input = Input::except('_token','_method');
        $schedule = ClassSchedule::findOrFail($id);
        $schedule->update($input);
        return Redirect::route('admin.classes.show',$class_id)
            ->withFlashMessage('Cập nhật lịch học thành công');
    }

} 