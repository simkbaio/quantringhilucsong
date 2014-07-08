<?php

class Subject extends \Eloquent {

    public $connection = 'hosohocvien';
    public $table = 'subjects';

    protected $guarded = array();
    public static function getSelectData(){
        $arr = array();
        $data = Subject::orderBy('name')->get();
        foreach($data as $e){
            $arr[$e->id] = $e->name;
        }
        return $arr;
    }


}