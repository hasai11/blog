@extends('Admin.layout.app')
@section('title','分类列表')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/">首页</a><span class="crumb-step">&gt;</span><span>新增分类</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                @if(Session::has('message'))
            <p style="color: red;font-size: 25px;">{{Session::get('message')}}</p>
             @endif
                <form action="/admin/cate" method="post" id="myform" name="myform" >
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th width="120"><i class="require-red">*</i>父类：</th>
                            <td>
                                <select name="pid" id="catid" class="required">
                                    <option value="0">顶级分类</option>
                                    <?php foreach ($cates as $k => $v) {
                                        $n = substr_count($v->path,',') - 1;
                                        if ($n<0) {$n=0;}
                                        echo "<option ";
                                        if ($v->id==$id){echo 'selected';}
                                        echo " value ='$v->id'>".str_repeat('&nbsp;', $n*4)."|--{$v->cname}</option>";
                                    }?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>类别名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="cname" size="50" value="" type="text">
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