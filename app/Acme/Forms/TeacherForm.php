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
        $input = Input::except('_token');
        $this->teacherForm->validate($input);
        $student = Teacher::create($input);
        return dd($student->toArray());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $student = Teacher::where('stu_id','=',$id)->firstOrFail();
        return View::make('quanlyhoctap.teachers.edit')->withStudent($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::except('_method','_token');
//        return dd($input);
        $this->teacherForm->validate($input);
        $student = Teacher::where('stu_id','=',$id)->firstOrFail();
        $student->save($input);
        return Redirect::route('admin.students.index')
            ->withFlashMessage('Bạn đã cập nhật thành công học viên: '.$student->stu_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $student = Teacher::where('stu_id','=',$id)->firstOrFail();
        Teacher::where('stu_id','=',$id)->delete();
        return Redirect::route('admin.students.index')
            ->withFlashMessage('Bạn đã xóa học viên: '.$student->stu_name);
    }

}