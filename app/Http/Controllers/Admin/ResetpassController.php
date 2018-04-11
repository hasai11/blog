<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Decrypt;
class ResetpassController extends Controller
{
    public function index($id)
    {
    	$user = User::find($id);
    	return view('Admin.repass',['user'=>$user]);
    }
    public function dorepass(Request $request)
    {
    	$input = $request->except('_token');
    	$user = User::find($input['id']);
    	$pass = decrypt($user->upass);
    	if ($input['upass'] !== $pass ) {
    		return back()->with('message','当前密码输入错误');
    	}
    	if ($input['npass'] !== $input['rnpass'] ) {
    		return back()->with('message','新密码两次输入不一致');
    	}
    	$user->upass = encrypt($input['npass']);
    	$res =  $user->save();
    	if ($res) {
    		return redirect('admin/index')->with('message','修改成功');
    	}else{
    		return back()->with('message','修改失败');
    	}
    }
}
