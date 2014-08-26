<?php
/**
 * Created by Ngoc Anh Duong.
 * Email: anhdn@bravebits.vn
 * Date: 8/26/2014
 * Time: 1:58 PM
 */

namespace Frontend;


class ScoresController extends FrontendController {
	public function index() {
		if ( ! $this->account->StudentInfo() ) {
			return Redirect::to( 'dashbroad' )
			               ->withFlashMessage( 'Xin lỗi bạn không phải là học viên' );
		}
		$current_class = $this->account->StudentInfo()->NClass;
		if ( ! $current_class ) {
			return \Redirect::to( 'dashbroad' )
			               ->withFlashMessage( 'Xin lỗi bạn không phải là học viên' );
		}

		\View::share([
			'current_class'=>$current_class,
		]);


		return $this->view( 'frontend.pages.student_scores' );
	}
}
