<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin/login/login');
    }

    public function login(Request $request)
    {
        $post = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
//        dump($post);
        $res = auth()->attempt($post);
        if($res){
            return redirect(route('admin.index.index'))->with('success','登陆成功');
        }

        return redirect()->back()->with('error','登录失败,用户名或密码错误');
    }
}
