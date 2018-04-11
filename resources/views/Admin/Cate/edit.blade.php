@extends('Admin.layout.app')
@section('title','分类列表')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/">首页</a><span class="crumb-step">&gt;</span><span>新增分类</span></div>
        </div>
        <div class="result-wrap">
            @if(Session::has('message'))
            <p style="color: red;font-size: 20px;">{{Session::get('message')}}</p>
             @endif
            <div class="result-content">
                <form action="/admin/cate/{{$cate->id}}" method="post" id="myform" name="myform" >
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>类别名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="cname" size="50" value="{{$cate->cname}}" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
 @endsection