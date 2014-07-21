<?php

class SubjectsController extends \BaseController {

	/**
	 * Display a listing of subjects
	 *
	 * @return Response
	 */
	protected $SubjectForm;
	public function __construct(\Acme\Forms\SubjectForm $Subjectform){
        $this->SubjectForm = $Subjectform;
	}
	public function index()
	{
		$subjects = Subject::all();

		return View::make('quanlyhoctap.subjects.index', compact('subjects'));
	}

	/**
	 * Show the form for creating a new subject
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('quanlyhoctap.subjects.create');
	}

	/**
	 * Store a newly created subject in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::except('_token');
        $this->SubjectForm->validate(Input::all());
        if(Subject::wherename($input['name'])->count()){
            return Redirect::back()->withFlashMessage('Trùng tên môn học trước đó');
        }
        $subject = Subject::create($input);
		return Redirect::route('admin.subjects.index')->withFlashMessage('Bạn tạo thành công môn học: '.$subject->name);
	}

	/**
	 * Display the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subject = Subject::findOrFail($id);
		return Redirect::route('admin.subjects.edit',$id);
	}

	/**
	 * Show the form for editing the specified subject.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subject = Subject::find($id);

		return View::make('quanlyhoctap.subjects.edit', compact('subject'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subject = Subject::findOrFail($id);
        $input = Input::except('_token');
		$this->SubjectForm->validate(Input::all());
//        Kiểm tra tên môn học sau khi đổi có trùng với môn học khác hay không
        if(Subject::where('id','!=',$subject->id)->wherename($input['name'])->count()){
            return Redirect::back()->withFlashMessage('Tên môn học bị trùng với môn học khác');
        }
		$subject->update($input);
		return Redirect::route('admin.subjects.index')
            ->withFlashMessage('Bạn đã cập nhật thành công môn học: '.$subject->name);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::destroy($id);

		return Redirect::route('admin.subjects.index');
	}

}