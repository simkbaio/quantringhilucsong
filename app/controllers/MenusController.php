<?php

class MenusController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $MenuForm;

    function __construct(\Acme\Forms\MenuForm $MenuForm)
    {
        $this->MenuForm = $MenuForm;
    }


    public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $this->MenuForm->validate($input);
        $menu = Menu::create($input);
        return Redirect::back()->withFlashMessage('Bạn đã tạo thành công menu: '.$menu->title);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($menuspack_id,$menu_id)
	{
       $menu =  Menu::findOrFail($menu_id);
		return View::make('admin.menus.edit')->withMenu($menu);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($menuspack_id,$menu_id)
	{
        $input = Input::only('title','menuspack_id','link','parent','icon');
		$this->MenuForm->validate(Input::all());
        $menu = Menu::findOrFail($menu_id);
        $menu->update($input);
        return Redirect::route('admin.menuspacks.show',$menuspack_id)
            ->withFlashMessage('Cập nhật thành công');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($menuspack_id,$menu_id)
	{
        $menu = Menu::findOrFail($menu_id);
        $menu->delete();
        return Redirect::back()
            ->withFlashMessage('Bạn đã xóa thành công menu: '.$menu->title);
	}
    public function QuickDeleteMenu($id){
         $menu = Menu::findOrFail($id);
        $menu->delete();
        return Redirect::back()->withFlashMessage('Bạn đã xóa thành công menu: '.$menu->title);
    }

}