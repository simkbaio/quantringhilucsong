<?php

class MenusPack extends \Eloquent {
    protected $table= "menuspacks";
	protected $guarded = [];
	// protected $fillable = [];
	public function menus(){
		return MenusPack::hasMany('Menu','menuspack_id');
	}
    public function getMenusSelectData(){
        $data = array();
        $data[0] = 'Không có menu Gốc';
        $root= $this->menus()->whereParent(0)->orderBy('order')->get();
        foreach($root as $menu){
            $data[$menu->id] = $menu->title;
            if($menu->child()->count()){
                foreach($menu->child()->get() as $menu){
                    $data[$menu->id] = "->".$menu->title;
                }
            }

        }
        return $data;
    }
    public static function quickorder($parent=0,$arr){
		$order = 0;

		foreach($arr as $item){
			Menu::whereid($item['id'])
				->update(array('order'=>$order,'parent'=>$parent));
			if(isset($item['children'])){
				Menuspack::quickorder($item['id'], $item['children']);
			}
		$order++;
		}
	}

}