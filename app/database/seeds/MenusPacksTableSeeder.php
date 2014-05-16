<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MenusPacksTableSeeder extends Seeder {

	public function run()
	{

		$adminMenuPack = MenusPack::create([
			'name'=>'Admin: Left Sidebar',
			'order'=> 0 ,

			]);
		Menu::create([
			'title'=>'Trang chủ',
			'link'=>'admin',
			'menuspack_id'=>$adminMenuPack->id,
		]);
		$userRoot = Menu::create([
			'title'=>'Quản lý Thành viên',
			'link'=>'#',
			'menuspack_id'=>$adminMenuPack->id,
		]);
		Menu::create([
			'title'=>'Danh sách thành viên',
			'link'=>'#',
			'parent'=>$userRoot->id,
			'menuspack_id'=>$adminMenuPack->id,
		]);
	}

}