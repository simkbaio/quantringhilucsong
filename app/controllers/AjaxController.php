<?php
class AjaxController extends BaseController{
	public function changelog(){
		if(Cache::has('ajax_changelog')){
			$result = Cache::get('ajax_changelog');
			$result = json_decode($result);
		}else{
			$curl = new MyCurl('https://api.github.com/repos/simkbaio/quantringhilucsong/commits');
			$result = $curl->execute();
			Cache::put('ajax_changelog',$result,2);
			$result = json_decode($result);
		}
		return View::make('ajax.changelog')->withCommits($result);

	}
}