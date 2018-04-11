@extends('Admin.layout.app')
@section('title','分类列表')
@section('content')
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">分类列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/admin/cate" method="get">
                    <table class="search-tab">
                        <tr>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="类别关键字" name="cname" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            @if(Session::has('message'))
            <p style="color: red;font-size: 20px;">{{Session::get('message')}}</p>
             @endif
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th>ID</th>
                            <th style="width: 200px;">类别名称</th>
                            <th>添加子分类</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($cates as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td><?php
                              $n = substr_count($v->path, ',') - 1;
                              if ($n<0) {$n=0;}
                              echo str_repeat('&nbsp;', $n * 10).'|---'.$v->cname;
                            ?></td></td>
                            <td align="center"><a class="link-update" href="/admin/cate/create/{{$v->id}}"><button class="btn btn-success btn2">添加子分类</button></a></td>
                            <td align="center">{{$v->created_at}}</td>
                                <form action="/admin/cate/{{$v->id}}" method="post" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
   
                            <td align="center">
                                <a class="btn btn-info btn2" href="/admin/cate/{{$v->id}}/edit">修改</a>
                                &nbsp;&nbsp;&nbsp;

                                <a onclick="confirm('确定要删除吗？')" class="link-update" href="/admin/cate/{{$v->id}}"><button class="btn btn-danger btn2">删除</button></a>
                                &nbsp;&nbsp;&nbsp;
                             
                            </td>
                            </form>
                        @endforeach
                        </tr>
                    </table>
                </div>

        </div>
    </div>
@endsection
