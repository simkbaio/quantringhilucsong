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
        $input = Input::except('_method','_token','teacher_join_date','teacher_out_date');
        $input['teacher_join_date'] = strtotime(Input::get('teacher_join_date'));
        $input['teacher_out_date'] = strtotime(Input::get('teacher_out_date'));

        $this->teacherForm->validate(Input::all());
        $teacher = Teacher::create($input);

        return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã thêm thành công giáo viên mới: '.$teacher->teacher_name);

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


        $teacher = Teacher::where('teacher_id','=',$id)->firstOrFail();
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
        $input = Input::except('_method','_token','teacher_join_date','teacher_out_date');
        $input['teacher_join_date'] = strtotime(Input::get('teacher_join_date'));
        $input['teacher_out_date'] = strtotime(Input::get('teacher_out_date'));

        $teacher = Teacher::where('teacher_id','=',$id)->firstOrFail();
        if(Teacher::where('teacher_id','=',$id)->update($input))
            return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã cập nhật thành công giáo viên: '.$teacher->teacher_name);
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
        $teacher = Teacher::where('teacher_id','=',$id)->firstOrFail();
        Teacher::where('teacher_id','=',$id)->delete();
        return Redirect::route('admin.teachers.index')
            ->withFlashMessage('Bạn đã xóa giáo viên: '.$teacher->teacher_name);
    }

}