<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/12/2014
 * Time: 3:44 AM
 */

class Group extends Eloquent{
    protected $table = 'groups';
    protected $guarded = array();
    public function users(){
        return Group::belongsToMany('User');
    }
    public function setPermissionsAttribute($permissions = array()){
        $per_arr = array();
        if($permissions){
            foreach($permissions as $per){
                $per_arr[$per] = 1;
            }
            $this->attributes['permissions'] = json_encode($per_arr);
            return;
        }
        return;
    }
} 