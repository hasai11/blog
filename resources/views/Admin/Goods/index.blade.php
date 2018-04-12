@extends('Admin.layout.app')
@section('title','后台首页')
@section('content')
<style>
    #xxx{
   
        table-layout:fixed;/* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
}
    #xxx th{
        text-align: center;;
    }
    #xxx td{
        width:100%;
        word-break:keep-all;/* 不换行 */
        white-space:nowrap;/* 不换行 */
        overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
        text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用。*/
    }
</style>
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.html">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">产品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="get">
                    <input type="hidden" name="m" value="admin">
                    <input type="hidden" name="c" value="goods">
                    <input type="hidden" name="a" value="index">
                    <table class="search-tab">
                        <tr>
                            <th width="100">选择分类:</th>
                            <td>
                                <select name="pid" id="catid" class="required">
                                    <option value="0">顶级分类</option>
                                    <?php foreach ($cates as $k => $v) {
                                        $n = substr_count($v->path,',') - 1;
                                        if ($n<0) {$n=0;}
                                        echo "<option ";
                                        echo " value ='$v->id'>".str_repeat('&nbsp;', $n*4)."|--{$v->cname}</option>";
                                    }?>
                                </select>
                            </td>
                            <th >产品名称:</th>
                            <td><input class="common-text" placeholder="关键字" name="gname" value="" id="" type="text">
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
                <div class="result-content">
                    <table id="xxx" class="result-tab a" width="100%">
                        <tr>
                            <th>产品ID</th>
                            <th>产品名称</th>
                            <th>产品图片</th>
                            <th width="250px">产品描述</th>
                            <th>创建时间</th>
                            <th>操作</th>

                        </tr>
                        <?php foreach ($goods as $k => $v):?>
                        <tr>
                            <td align="center">{{$v->id}}</td>
                            <td>{{$v->gname}}</td>
                            <td align="center">{{$v->pic}}</td>
                            <td>{{$v->res}}</td>
                            <td align="center">{{$v->created_at}}</td>
                           
                      
                             <td align="center">
                                <a class="btn btn-info btn2" href="#">修改</a>
                                &nbsp;&nbsp;&nbsp;

                                <a onclick="confirm('确定要删除吗？')" class="link-update" href="#"><button class="btn btn-danger btn2">删除</button></a>
                                &nbsp;&nbsp;&nbsp;
                             
                      
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                </div>
        </div>
    </div>
@endsection