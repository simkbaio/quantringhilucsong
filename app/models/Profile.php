<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/9/2014
 * Time: 2:19 PM
 */

class Profile extends Eloquent {
    public $guarded = array();
    public function user(){
        return $this->belongsTo('User');
    }
} 