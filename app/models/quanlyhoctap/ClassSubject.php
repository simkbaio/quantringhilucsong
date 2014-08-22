<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 8/5/2014
 * Time: 11:32 AM
 */

class ClassSubject extends Eloquent {
    public $table = 'classes_subjects';
    public $connection = 'hosohocvien';
    public $guarded = [];
    public function subject(){
        return $this->belongsTo('Subject','subject_id','id');
//        try{
//            $subject = Subject::findOrFail($this->subject->id);
//        }catch (Exception $e){
//            return false;
//        }
//        return $subject;
    }

} 