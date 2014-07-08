<?php


class ClassSchedule extends Eloquent {
	protected $connection = 'hosohocvien';
    protected $table ="class_schedules";
    protected $guarded = [

    ];
     public function NClass(){
     	return ClassSchedule::belongto('Nclass','class_id','id');
     }
} 