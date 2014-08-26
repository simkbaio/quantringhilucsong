<?php
Route::get('class-subject-fix',function(){
	$classes = NClass::with('schedules')->get();
	foreach($classes as $class){
		foreach($class->schedules as $schedule){
			if(ClassSubject::whereClassId($class->id)->whereSubjectId($schedule->subject_id)->count() == 0){
				echo "Class: ".$class->name." add new Subject: ".$schedule->subject->name."<br/>";
				ClassSubject::create([
					'class_id'=>$class->id,
					'subject_id'=>$schedule->subject_id,
				]);
			}
		}
	}
	return "Done!";
});