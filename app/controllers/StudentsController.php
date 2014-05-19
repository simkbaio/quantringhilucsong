<?php

use Acme\Forms\StudenForm;

class StudentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $studentForm;

    function __construct(StudenForm $studentForm)
    {
        $this->studentForm = $studentForm;
    }


    public function index()
	{
		return View::make('quanlyhoctap.students.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("quanlyhoctap.students.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_method','_token','password','password_confirmation');
        $input['stu_regis_date']=time();
        $input['stu_last_update'] = time();
        $input['stu_active'] = 1;
        $this->studentForm->validate(Input::all());
        $student = Student::create($input);
        $password = md5(Input::get('password'));
        $student->save([
           'stu_password'=>$password,
        ]);
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

        $student = Student::where('stu_id','=',$id)->firstOrFail();
        return View::make('quanlyhoctap.students.edit')->withStudent($student);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_method','_token','password','password_confirmation');
        $input['stu_birdday']= strtotime($input['stu_birdday']);
        $this->studentForm->UpdateValidate($input);
        $student = Student::where('stu_id','=',$id)->firstOrFail();
        Student::where('stu_id','=',$id)->update($input);
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
		$student = Student::where('stu_id','=',$id)->firstOrFail();
        Student::where('stu_id','=',$id)->delete();
        return Redirect::route('admin.students.index')
            ->withFlashMessage('Bạn đã xóa học viên: '.$student->stu_name);
	}

}