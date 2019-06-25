@extends('layouts.main')


@section('cnt')
    <div class="pd-20">
        <div class="Huiform">
            <form action="{{route('admin.user.create')}}" method="post">
                @csrf
                <table class="table table-bg">
                    <tbody>
                    <tr>
                        <th width="100" class="text-r"><span class="c-red">*</span> 用户名：</th>
                        <td><input type="text" style="width:200px" class="input-text" value="" placeholder=""  name="username" datatype="*2-16" nullmsg="用户名不能为空"></td>
                    </tr>

                    <tr>
                        <th class="text-r"><span class="c-red">*</span> 昵称：</th>
                        <td><input type="text" style="width:300px" class="input-text" value="" placeholder=""  name="nickname"></td>
                    </tr>
                    <tr>
                        <th class="text-r">邮箱：</th>
                        <td><input type="text" style="width:300px" class="input-text" value="" placeholder=""  name="email"></td>
                    </tr>
                    <tr>
                        <th class="text-r">密码：</th>
                        <td><input type="password" style="width:300px" class="input-text" name="password" multiple></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input class="btn btn-success radius" type="submit" value=" 确定"><i class="icon-ok"></i></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

@endsection