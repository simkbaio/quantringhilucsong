<?php

class GroupsController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $GroupForm;

    function __construct(\Acme\Forms\GroupForm $GroupForm)
    {
        $this->GroupForm = $GroupForm;
    }

    public function index()
    {
        return View::make('admin.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::only('name');
        $this->GroupForm->validate($input);

        if (Input::has('permissions')) {
            $per_arr = array();
            foreach (Input::get('permissions') as $per) {
                $per_arr[$per] = 1;
            }
            $data['permissions'] = $per_arr;
        }
        $data['name'] = Input::get('name');


        $group = Sentry::createGroup($data);
        return Redirect::route('admin.groups.index')
            ->withFlashMessage('Bạn đã tạo thành công nhóm thành viên: ' . $group->name);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $group = Sentry::findGroupById($id);
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            return Redirect::back()->withFlashMessage('Group was not found.');
        }
        return View::make('admin.groups.edit')->withGroup($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $this->GroupForm->UpdateValidate(Input::all());
        $group = Group::findOrFail($id);
        $group->name = Input::get('name');
        $group->permissions = Input::get('permissions');
        // Update the group details
        $group->save();
        return Redirect::route('admin.groups.index')
            ->withFlashMessage('Bạn đã cập nhật thành công nhóm: ' . $group->name);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            // Find the group using the group id
            $group = Sentry::findGroupById($id);

            // Delete the group
            $group->delete();
        } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
            return Redirect::back()->withFlashMessage('Không tìm thấy nhóm cần xóa.');
        }
        return Redirect::back()->withFlashMessage('Bạn đã xóa thành công Nhóm: ' . $group->name);
    }

}