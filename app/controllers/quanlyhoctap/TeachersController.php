<?php

use Acme\Forms\TeacherForm;

class TeachersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $teacherForm;

	function __construct( TeacherForm $teacherForm ) {
		$this->teacherForm = $teacherForm;
	}


	public function index() {
		return View::make( 'quanlyhoctap.teachers.index' );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make( "quanlyhoctap.teachers.create" );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$account_input               = Input::only( 'email', 'password' );
		$account_input['first_name'] = Input::get( 'first_name' );
		$account_input['last_name']  = Input::get( 'last_name' );


		$teacher_input         = Input::only( 'phone', 'address', 'join_date', 'out_date', 'email' );
		$teacher_input['name'] = Input::get( "first_name" ) . " " . Input::get( 'last_name' );

		$teacher_input['join_date'] = strtotime( Input::get( 'join_date' ) );
		$teacher_input['out_date']  = strtotime( Input::get( 'out_date' ) );
		$this->teacherForm->validate( Input::all() );
		User::whereEmail( Input::get( 'email' ) );

		$account = User::createUser( $account_input );
		if ( $account ) {
			$teacher_input['user_id'] = $account->id;
		}
		$teacher = Teacher::create( $teacher_input );

		return Redirect::route( 'admin.teachers.index' )
		               ->withFlashMessage( 'Bạn đã thêm thành công giáo viên mới: ' . $teacher->name );

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show( $id ) {
		$teacher = Teacher::findOrFail( $id );

		return View::make( 'quanlyhoctap.teachers.show' )->withTeacher( $teacher );


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit( $id ) {


		$teacher = Teacher::findOrFail( $id );

		return View::make( 'quanlyhoctap.teachers.edit' )->withTeacher( $teacher );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update( $id ) {

		$teacher_input              = Input::only( 'phone', 'address', 'email' );
		$teacher_input['join_date'] = strtotime( Input::get( 'join_date' ) );
		$teacher_input['out_date']  = strtotime( Input::get( 'out_date' ) );
		$teacher_input['name']      = Input::get( 'first_name' ) . " " . Input::get( 'last_name' );

		$teacher = Teacher::find( $id );
		$this->teacherForm->validate( Input::all() );
		$teacher->update( $teacher_input );
		if ( Input::has( 'password' ) && Input::has( 'password_confirmation' ) ) {
			$this->teacherForm->rules = [ 'password' => 'confirmed|between:6,30' ];
			$this->teacherForm->validate( Input::all() );
			$account = $teacher->account();
			if ( $account ) {
				User::updateUser( $account->id, [
					'email'      => Input::get( 'email' ),
					'first_name' => Input::get( 'first_name' ),
					'last_name'  => Input::get( 'last_name' ),
					'password'   => Input::get( 'password' ),
				] );
			} else {
				User::createUser( [
					'email'      => Input::get( 'email' ),
					'first_name' => Input::get( 'first_name' ),
					'last_name'  => Input::get( 'last_name' ),
					'password'   => Input::get( 'password' ),
				] );
			}
		}

		return Redirect::route( 'admin.teachers.index' )
		               ->withFlashMessage( 'Bạn đã cập nhật thành công giáo viên: ' . $teacher->name );

	}

	/**
	 * Remove the specified resource from storage
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy( $id ) {
		$teacher = Teacher::where( 'id', '=', $id )->firstOrFail();
		try{
			$account = Sentry::findUserById($teacher->user_id);
			if($account){
				$account->delete();
			}
		}catch(\Cartalyst\Sentry\Users\UserNotFoundException $e){
			Log::debug('Teacher with id:'.$id.' Have no account');
		}

		Teacher::where( 'id', '=', $id )->delete();

		return Redirect::route( 'admin.teachers.index' )
		               ->withFlashMessage( 'Bạn đã xóa giáo viên: ' . $teacher->name );
	}

}