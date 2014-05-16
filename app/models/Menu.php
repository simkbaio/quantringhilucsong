<?php

class Menu extends \Eloquent {
	// protected $fillable = [];
	protected $guarded = [];
	public function menuspack(){
		return Menu::belongsTo('Menuspack')->firstOrFail();
	}
    public function child(){
        return Menu::whereParent($this->id);
    }
    public function parent(){
        return Menu::findOrFail($this->parent);
    }
    public function link(){
        return URL::to($this->link);
    }
    public static function currentActive(){
        $current_link = str_replace(URL::to('/').'/','', URL::current());
        if(isset($current_link)){
            $data = explode('/',$current_link);
            if(isset($data[1]))
                $act_link = $data[0].'/'.$data[1];
            else{
                if($data[0]){
                    $act_link = $data[0];
                }
                else{
                    $act_link = "/";
                }
            }

            $act_menu = Menu::wherelink($act_link);
            if($act_menu->count() > 0){
                $act_menu = $act_menu->first();
                while($act_menu->parent!=0){
                    $act_menu = Menu::whereid($act_menu->parent)->first();
                }
                return $act_menu->id;
            }
        }
        return 0;
    }
    public static function currentSelected(){
        $current_link = str_replace(URL::to('/').'/','', URL::current());
        if(isset($current_link)){
            $data = explode('/',$current_link);
            if(isset($data[1]))
                $act_link = $data[0].'/'.$data[1];
            else{
                if($data[0]){
                    $act_link = $data[0];
                }
                else{
                    $act_link = "/";
                }
            }

            $act_menu = Menu::wherelink($act_link);
            if($act_menu->count() > 0){
                $act_menu = $act_menu->first();
                return $act_menu->id;

            }

            return 0;
        }
    }
}