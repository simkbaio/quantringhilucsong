<?php

use Acme\Forms\CourseForm;

class CoursesController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $courseForm;

    function __construct(CourseForm $courseForm)
    {
        $this->courseForm = $courseForm;
    }


    public function index()
    {
        return View::make('quanlyhoctap.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("quanlyhoctap.courses.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_method','_token','course_start','course_end');
        $input['course_start'] = strtotime(Input::get('course_start'));
        $input['course_end'] = strtotime(Input::get('course_end'));
        $this->courseForm->validate(Input::all());
        $course = Course::create($input);
        return dd($course->toArray());

        return Redirect::route('admin.courses.index')
            ->withFlashMessage('Bạn đã thêm thành công khóa học mới: '.$course->course_name);

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


        $course = Course::where('course_id','=',$id)->firstOrFail();
        return View::make('quanlyhoctap.courses.edit')->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::except('_method','_token','course_start','course_end');
        $this->courseForm->validate(Input::all());
        $input['course_start'] = strtotime(Input::get('course_start'));
        $input['course_end'] = strtotime(Input::get('course_end'));
        $course = Course::where('course_id','=',$id)->firstOrFail();
        if(Course::where('course_id','=',$id)->update($input))
            return Redirect::route('admin.courses.index')
                ->withFlashMessage('Bạn đã cập nhật thành công khóa học: '.$course->course_name);
        else
            return Redirect::route('admin.courses.index')
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
        $course = Course::where('course_id','=',$id)->firstOrFail();
        Course::where('course_id','=',$id)->delete();
        return Redirect::route('admin.courses.index')
            ->withFlashMessage('Bạn đã xóa khóa học: '.$course->course_name);
    }

}