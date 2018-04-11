@extends('Admin.layout.app')
@section('title','重置密码')
@section('content')
<div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/">首页</a><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                @if(Session::has('message'))
                    <p style="color:red">{{Session::get('message')}}</p>
                @endif
                <form action="/admin/dorepass" method="post" id="myform" >
                	{{csrf_field()}}
                	<input type="hidden" name="id" value="{{$user->id}}">
                    <table class="insert-tab" width="100%">
                        <tbody> 
                        	<tr>
                                <th><i class="require-red">*</i>当前用户：</th>
                                <td>{{$user->uname}}</td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>请输入当前密码：</th>
                                <td><input class="common-text" name="upass" size="50" value="" type="password"></td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>新密码：</th>
                                <td><input class="common-text" name="npass" size="50" value="" type="password"></td>
                            </tr>
                            <tr>
                               <th><i class="require-red">*</i>确认新密码：</th>
                                <td><input class="common-text" name="rnpass" size="50" value="" type="password"></td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
@endsection