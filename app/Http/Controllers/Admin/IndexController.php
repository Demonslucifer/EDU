<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
//        echo 1;
        return view('admin.index.index');
   }

    public function welcome()
    {
//        return 2;
        return view('admin.index.welcome');
   }

    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login'))->with('success','退出成功');
   }
}
