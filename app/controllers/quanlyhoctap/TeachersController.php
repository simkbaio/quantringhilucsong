<?php

use Acme\Forms\TeacherForm;

class TeachersController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $teacherForm;

    function __construct(TeacherForm $teacherForm)
    {
        $this->teacherForm = $teacherForm;
    }


    public function index()
    {
        return View::make('quanlyhoctap.teachers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("quanlyhoctap.teachers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_method','_token','join_date','out_date');
        return dd($input);
        $input['join_date'] = strtotime(Input::get('join_date'));
        $input['out_date'] = strtotime(Input::get('out_date'));

        $this->teacherForm->validate(Input::all());
        $teacher = Teacher::create($input);

        return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã thêm thành công giáo viên mới: '.$teacher->name);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return View::make('quanlyhoctap.teachers.show')->withTeacher($teacher);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {


        $teacher = Teacher::findOrFail($id);
//        return dd($teacher);
        return View::make('quanlyhoctap.teachers.edit')->withTeacher($teacher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::except('_method','_token','join_date','out_date');
        $input['join_date'] = strtotime(Input::get('join_date'));
        $input['out_date'] = strtotime(Input::get('out_date'));

        $teacher = Teacher::where('id','=',$id)->firstOrFail();
        if(Teacher::where('id','=',$id)->update($input))
            return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã cập nhật thành công giáo viên: '.$teacher->name);
        else
            return Redirect::route('admin.teachers.index')
                ->withFlashMessage('Có lỗi trong quá trình cập nhật thông tin hoặc chưa có trường thông tin nào thay đổi. Xin bạn vui lòng thử lại!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id','=',$id)->firstOrFail();
        Teacher::where('id','=',$id)->delete();
        return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã xóa giáo viên: '.$teacher->name);
    }

}