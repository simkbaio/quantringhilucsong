<?php

use Acme\Forms\StudenResultForm;

class StudentResultsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $studenResultForm;

    function __construct(StudenResultForm $studenResultForm)
    {
        $this->classForm = $studenResultForm;
    }


    public function index()
    {
        return View::make('quanlyhoctap.studentresults.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make("quanlyhoctap.studentresults.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_method','_token');
        $this->classForm->validate(Input::all());
        $class = StudenResult::create($input);

        return Redirect::route('admin.studentresults.index')
            ->withFlashMessage('Bạn đã thêm thành công lớp học mới: '.$class->name);

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


        $class = StudenResult::where('id','=',$id)->firstOrFail();
        return View::make('quanlyhoctap.studentresults.edit')->withClass($class);
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
        $this->classForm->validate(Input::all());
        $class = StudenResult::where('id','=',$id)->firstOrFail();
        if(StudenResult::where('id','=',$id)->update($input))
            return Redirect::route('admin.studentresults.index')
                ->withFlashMessage('Bạn đã cập nhật thành công lớp học: '.$class->name);
        else
            return Redirect::route('admin.studentresults.index')
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
        $class = StudenResult::where('id','=',$id)->firstOrFail();
        StudenResult::where('id','=',$id)->delete();
        return Redirect::route('admin.studentresults.index')
            ->withFlashMessage('Bạn đã xóa lớp học: '.$class->name);
    }

}