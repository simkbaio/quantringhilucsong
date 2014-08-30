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

Route::get('class-teacher-fix',function(){
	$classes = NClass::with('schedules')->get();
	foreach($classes as $class){
		foreach($class->schedules as $schedule){
			if(ClassTeacher::whereClassId($class->id)->whereTeacherId($schedule->teacher_id)->count() == 0){
				echo "Class: ".$class->name." add new Teacher: ".$schedule->teacher->name."<br/>";
				ClassTeacher::create([
					'class_id'=>$class->id,
					'teacher_id'=>$schedule->teacher_id,
				]);
			}
		}
	}
	return "Done!";
});
Route::get('change-link',function(){

	$posts = Post::all();
	foreach($posts as $post){
		$post->body = str_replace('organogold.net.vn','cafetrieuphu.net',$post->body);
		$post->save();
	}
	return "DONE!";
});