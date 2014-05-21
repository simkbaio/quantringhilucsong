<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:09 AM
 */

class Course extends Eloquent{
    protected $table = "tbl_course";
    protected $connection ="hosohocvien";
    public $timestamps =false;
    protected $guarded = [];
}