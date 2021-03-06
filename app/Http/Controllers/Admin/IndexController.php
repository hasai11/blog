<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }
    //退出登录
    public function logout()
    {
        session()->forget('user');

        return redirect('admin/login');
    }
}
