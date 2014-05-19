<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:09 AM
 */

class Teacher extends Eloquent{
    protected $table = "tbl_teacher";
    protected $connection ="hosohocvien";
    protected $guarded = [];
}