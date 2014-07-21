<?php


class ClassSchedule extends Eloquent {
	protected $connection = 'hosohocvien';
    protected $table ="class_schedules";
    protected $guarded = [

    ];
     public function NClass(){
     	return ClassSchedule::belongsTo('NClass','class_id','id');
     }
    public function subject(){
        return $this->belongsTo('Subject','subject_id','id');
    }
} 