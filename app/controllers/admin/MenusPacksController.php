<?php

class MenusPacksController extends BaseController
{

	protected $menuspack;
	protected $menuspackForm;

	public function __construct(MenusPack $menuspack, \Acme\Forms\MenusPackForm $menusPackForm)
	{
		$this->menuspack = $menuspack;
		$this->menuspackForm = $menusPackForm;
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->checkPermission('admin.menuspacks.index');
        $menuspacks = $this->menuspack->all();

    	return View::make('admin.menuspacks.index', compact('menuspacks'))
    	->with('title', 'menuspacks Manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	return View::make('admin.menuspacks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    	$input = Input::only('name', 'order');
    	$this->menuspackForm->validate(Input::all());
    	$menu = $this->menuspack->create($input);
    	return Redirect::route('admin.menuspacks.index')
    	->withFlashMessage('Bạn đã tạo mới thành công bộ menu: ' . $menu->name);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
    	$menuspack = $this->menuspack->findOrFail($id);
    	return View::make('admin.menuspacks.show', compact('menuspack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
    	$menuspack = $this->menuspack->findOrFail($id);
    	return View::make('admin.menuspacks.edit', compact('menuspack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
    	$input = Input::only('name','order');
    	$this->menuspackForm->UpdateFormValidate(Input::all());
    	$menuspack = $this->menuspack->findOrFail($id);
    	$menuspack->update($input);
    	return Redirect::route('admin.menuspacks.index')
    	->withFlashMessage('Bạn đã cập nhật thành công bộ menu: '.$menuspack->name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
    	$this->menuspack->find($id)->delete();

    	return Redirect::back();
    }


    public function updateorder($id){
    	$data = (Input::json());
    	Menuspack::quickorder(0,$data);
    	return "OK";
    }


}