<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Crypt;
use Session;
use Validator;
use App\Model\User;
class LoginController extends Controller
{
    public function index()
    {
        return view('Admin.Login.login');
    }
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(255, 235, 254);
        $builder->setMaxAngle(35);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
    public function doLogin(Request $req)
    {
        //获取提交数据
        $input = $req->except('_token');
        //验证
        $rule = [
            'username'=>'required|between:4,10',
            'password'=>'required|between:4,10',
            'code' => 'required'

        ];
        $msg = [
            'required'=>'请填写:attribute !',
            'between'=>':attribute 4-10位',
        ];
        $mean = [
            'username'=>'用户名',
            'password'=>'密码',
            'code' =>'验证码',
        ];

        $validator = Validator::make($input,$rule,$msg,$mean);
        //如果验证失败
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 3. 判断验证码是否正确(原理)
        if( strtolower($input['code']) !=strtolower(session()->get('code')) ){
            $validator->errors()->add('code', '验证码输入错误!');
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
       //  4. 判断是否有此用户
            $user = User::where('uname',$input['username'])->first();
        if(!$user){
            $validator->errors()->add('username', '无该用户');
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
        //  5. 判断密码是否正确（
          if($input['password'] != Crypt::decrypt($user->upass)) {
             $validator->errors()->add('password', '密码输入错误!');
              return redirect('admin/login')->withErrors($validator)->withInput();
          }
          //  7. 保存用户信息到session中
         Session::put('user',$user);
        return redirect('admin/index');
    }
    //退出登录
    public function logout()
    {
        session()->forget('user');

        return redirect('admin/login');
    }

}
