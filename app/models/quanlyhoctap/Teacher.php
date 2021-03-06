<?php
/**
 * Created by PhpStorm.
 * User: Dak
 * Date: 5/19/2014
 * Time: 9:09 AM
 */

class Teacher extends Eloquent{
    public $timestamps = false;
    protected $table = "tbl_teacher";
    protected $connection ="hosohocvien";
	protected $fillable = ['name','address','phone','join_date','out_date','user_id'];
    public static function getAllSelectData(){
        $data = array();
        $data[0]='Chưa xác định';
        // Chỉ lựa chọn Giáo viên còn đang hoạt động
        $teachers = Teacher::orderBy('name')->get();
        foreach($teachers as $teacher){
            $data[$teacher->id] = $teacher->name;
        }
        return $data;

    }
    public function classes(){
        return Teacher::hasMany('NClass','teacher_id','id');
    }
    function account(){
		if($this->user_id){
			return User::find($this->user_id);
		}else{
			$account = User::whereEmail($this->email)->first();
			if($account){
				$this->user_id = $account->id;
				$this->save();
			}
			return $account;
		}
    }
//	public function getAccountAttribute(){
//	    return $this->account();
//	}
}