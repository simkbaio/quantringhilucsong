
<div class="modal fade" id="changepassword" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Modal Title</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div id="change-password-result" style="display:none" class="col-md-12 alert alert-info">
						Thử xem
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{Form::open(['route'=>['admin.users.changepassword',$id]],['id'=>'changepassword'])}}
				{{HForm::input([
					'title'=>'Mật khẩu mới',
					'name'=>'password',
					'type'=>'password',
				],$errors)}}
				{{HForm::input([
					'title'=>'Gõ lại mật khẩu',
					'name'=>'password_confirmation',
					'type'=>'password',

				],$errors)}}
				<div class="col-md-12">
					
				</div>

				
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				{{Form::submit('Đổi mật khẩu',['class'=>'btn blue'])}}
			</div>
		</div>
		{{Form::close()}}
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
