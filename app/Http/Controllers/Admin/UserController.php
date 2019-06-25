<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function list(Request $request)
    {
        if (!$request->ajax()) {
            return ['status' => 1000, 'msg' => '请求不是ajax'];
        }
        $username = $request->get('username');
        // 排序字段
        $orderFieldIndex = $request->get('order')[0]['column'] ?? 1;
        $orderFieldName = $request->get('column')[$orderFieldIndex]['data'] ?? 'id';
        // 排序的类型
        $orderType = $request->get('order')[0]['dir'] ?? 'asc';

        // 搜索
        $builder = User::when($username, function ($query) use ($username) {
            $query->where('username', 'like', "%{$username}%");
        });

        // 记录总数
        $count = $builder->count();
        // 分页数据
        $data = $builder->orderBy($orderFieldName, $orderType)->offset($request->start)->limit($request->length)->get();
        $result = [
            'draw' => $request->get('draw'),
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data
        ];

        return $result;

    }

    public function del(User $user){
        $user->delete();
        return ['status'=>0,'msg'=>'删除成功'];
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function add(Request $request)
    {
        $post = $this->validate($request, [
              'username' => 'required|unique:users,username',
            'nickname' => 'required',
            'password' => 'required',
            'email' => 'nullable|email',
        ]);
        dump($post);
//        echo 1;
    }
}
