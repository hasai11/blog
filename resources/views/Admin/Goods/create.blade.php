@extends('Admin.layout.app')
@section('title','后台首页')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/">首页</a><span class="crumb-step">&gt;</span><span>新增商品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                @if(is_object($errors))
                  <p style="color: red;">{{ $errors->first() }}</p>
                   @else
                   <p style="color: red">{{ $errors }}</p>
                @endif
                  {{csrf_field()}}
                <form action="/admin/goods" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                           <td>
                                <select name="cid" id="" class="required">
                                    <option value="0">顶级分类</option>
                                    <?php foreach ($cates as $k => $v) {
                                        $n = substr_count($v->path,',') - 1;
                                        if ($n<0) {$n=0;}
                                        echo "<option value ='$v->id'>".str_repeat('&nbsp;', $n*4)."|--{$v->cname}</option>";
                                    }?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>产品名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="gname" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="pic"  type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td><textarea style="resize: none; width: 420px; margin: 0px; height: 303px;"" name="res" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
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