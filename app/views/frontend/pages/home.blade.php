@extends('frontend.layouts.master')
@section('content')

<div class="row" style="padding-top:50px">
    <div class="col-md-6" style="text-align:center; margin-top:10%"><img src="/frontend_assets/img/logo_0.jpg"/>
    </div>

    <div class="col-md-6">
        <h3>Đăng ký thành viên</h3>
        {{Form::open(['url'=>'dang-ki'])}}
        @if(Session::has('flash_message'))
        <div class="alert alert-danger fade in">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
                <p>
                    <i class="fa fa-times-circle"></i> <strong>{{Session::get('flash_message')}}</strong>
                </p>

        </div>
        @endif
        <div class="form-group">                       
            <input type="text"  class="form-control" id="last_name" value="{{Input::old('last_name')}}" name="last_name" placeholder="Họ">
            {{error_for('last_name',$errors)}}
        </div>
        <div class="form-group">                      
            <input type="text" class="form-control" id="first_name" value="{{Input::old('first_name')}}" name="first_name" placeholder="Tên">
            {{error_for('first_name',$errors)}}
        </div>
        <div class="form-group">                      
            <input type="text" class="form-control" id="email" name="email" value="{{Input::old('email')}}" placeholder="Email của bạn">
            {{error_for('email',$errors)}}
        </div>
        <div class="row">
            <div class="form-group col-md-6">                      
                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu truy cập">
                {{error_for('password',$errors)}}
            </div>
            <div class="form-group col-md-6">                      
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Gõ lại mật khẩu">
                {{error_for('password_confirmation',$errors)}}
            </div>
        </div>
        <h3>Ngày sinh</h3>
        <div class="form-group"> 
            <label for="day">Ngày</label>
            <select style="padding:5px; border:1px solid #55b44f" name="day" id="day" placeholder="Ngày">
                @for($i=1;$i<=31;$i++)
                <option>{{$i}}</option>
                @endfor
            </select>
            <label for="month">Tháng</label>
            <select style="padding:5px; border:1px solid #55b44f" name="month" id="month">
                @for($i=1;$i<=12;$i++)
                <option>{{$i}}</option>
                @endfor
            </select>
            <select style="padding:5px; border:1px solid #55b44f" name="year" id="month">
                @for($i=2000;$i>=1930;$i--)
                <option>{{$i}}</option>
                @endfor
            </select>
        </div>

        <h3>Giới tính</h3>

        <div class="custom-checkbox">
            <label>
                <input type="radio" name="sex" value="1" checked="checked">
                Nam</label>
                <label>
                    <input type="radio" name="sex" value="0">
                    Nữ</label>                       
                </div>
                <div class="form-group" style="padding-top:20px"> 

                    <button style="font-size:40px;" type="submit" class="btn btn-light" >Đăng ký</button>
                    <a style="height:64px" href="{{URL::route('facebook_login')}}" class="btn btn-light" >Đăng ký bằng tài khoản Facebook</a>
                </div>
            </form>
        </div>
    </div>

@stop