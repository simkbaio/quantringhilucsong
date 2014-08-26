<h2>Xin Chào {{$user->first_name}}</h2>
<p>Bạn đã gửi mail yêu cầu khôi phục mật khẩu. Nếu không phải xin bạn vui long bỏ qua email này!</p>
<p>Mật khẩu mới của bạn là: {{$new_password}}</p>
<p>Nếu muốn khôi phục mật khẩu xin bạn vui lòng Click vào
    <a href="{{URL::to('member/'.$user->id.'/resetpassword/'.$resetCode.'/'.$new_password)}}">Đây</a>
    để tiếp tục thực hiện khôi phục mật khẩu</p>
