<?php
#Themes Support
function error_for($attribute,$errors){
	return $errors->first($attribute,'<p class="help-block" style="color:red">:message</p>');
}

function flash_message(){
	if (Session::get('flash_message')) {
		return '<div class="alert alert-info alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
	<strong>Thông báo!</strong> '.Session::get('flash_message').'
</div>';
	}else{
		return;
	}
	
}
function portlet_open($title,$color='green'){
	echo '
	<div class="portlet box '.$color.'">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i>'.$title.'
			</div>
			<div class="tools">
								<a class="collapse" href="javascript:;">
								</a>
							</div>
		</div>
		<div class="portlet-body">';
}
function portlet_close(){
	echo "</div></div>";
}

#Functions

function checkPermission($permission=null){
	if($permission){
        $per = Permission::whereName($permission)->first();
        if(!$per){
            $per = Permission::create(['name'=>$permission]);
        }
		if(!Sentry::getUser()->hasAccess($permission)){
			return false;
		}
	}
    return true;
	
}

