<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>网站后台登录</title>
    <link href="/admin/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <center><h1>网站后台登录</h1></center>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="{{ url('admin/dologin') }}" method="post">
                {{csrf_field()}}
                <ul class="admin_items">
                        <div class="alert alert-danger">
                            <ul>
                                 @if(is_object($errors))
                                <li style="color: red;">{{ $errors->first() }}</li>
                                 @else
                                 <li style="color: red">{{ $errors }}</li>
                                @endif
                            </ul>
                        </div>
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value="{{ old('username') }}" autocomplete="off" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">验证码：</label>
                        <input type="text" name="code" value="" id="code" size="15" class="admin_input_style" />
                        {{--<img src="{{ url('admin/code') }}" onclick="this.src='{{ url('admin/code') }}?'+Math.random()" alt="" style="width:100px;height:50px;float:right">--}}
                        <a href="javascript:;" onclick='javascript:re_captcha()'><img src="{{ url('code/captcha/1') }}" id="123456" alt="" style="float:right"></a>

                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
        function re_captcha() {
            $url = "{{ URL('/code/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('123456').src = $url;
        }
</script>