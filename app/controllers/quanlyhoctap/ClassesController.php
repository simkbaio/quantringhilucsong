<?php

use Acme\Forms\ClassForm;

class ClassesController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $classForm;

    function __construct(ClassForm $classForm)
    {
        $this->classForm = $classForm;
    }


    public function index()
    {
        return View::make('quanlyhoctap.classes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("quanlyhoctap.classes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_method', '_token','course');
        $this->classForm->validate(Input::all());
        $class = NClass::create($input);
        if (Input::has('course')) {
            return Redirect::route('admin.courses.show', Input::get('course'))
                ->withFlashMessage('Bạn đã cập nhật thành công lớp học: ' . $class->class_name);
        }
        return Redirect::route('admin.classes.index')
            ->withFlashMessage('Bạn đã thêm thành công lớp học mới: ' . $class->class_name);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $class = NClass::where('class_id','=',$id)->firstOrFail();
        return View::make('quanlyhoctap.classes.show')->withClass($class);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {


        $class = NClass::where('class_id', '=', $id)->firstOrFail();
        return View::make('quanlyhoctap.classes.edit')->withClass($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::except('_method', '_token');
        $this->classForm->validate(Input::all());
        $class = NClass::where('class_id', '=', $id)->firstOrFail();
        if (NClass::where('class_id', '=', $id)->update($input))
            return Redirect::route('admin.classes.show',$class->class_id)
                ->withFlashMessage('Bạn đã cập nhật thành công lớp học: ' . $class->class_name);
        else
            return Redirect::route('admin.classes.index')
                ->withFlashMessage('Có lỗi trong quá trình cập nhật thông tin hoặc chưa có trường thông tin nào thay đổi. Xin bạn vui lòng thử lại!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $class = NClass::where('class_id', '=', $id)->firstOrFail();
        NClass::where('class_id', '=', $id)->delete();
        return Redirect::back()
            ->withFlashMessage('Bạn đã xóa lớp học: ' . $class->class_name);
    }
    public function addstudent($id){
        $class = NClass::where('class_id','=',$id)->firstOrFail();
        $class->addstudent(Input::get('student'));
        return Redirect::back()->withFlashMessage('Đã thêm sinh viên mới thành công');
    }

}