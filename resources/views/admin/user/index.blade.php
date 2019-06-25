@extends('layouts.main')

@section('cnt')
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 用户中心
        <span class="c-gray en">&gt;</span> 用户管理
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>

    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="username">
            <button type="button" class="btn btn-success radius" id="searchBtn"><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="{{route('admin.user.create')}}"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>88</strong> 条</span></div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">ID</th>
                    <th width="100">用户名</th>
                    <th width="100">昵称</th>
                    <th width="150">邮箱</th>
                    <th width="130">加入时间</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection








@section('js')
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{web()}}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{web()}}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{web()}}/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript">
        let dataTables = $('.table-sort').dataTable({
            // 下拉分页数量
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "所有"]],
            // 以第2列降序
            "order": [[1, "desc"]],
            "columnDefs": [
                // 索引0列和第6列，不进行排序
                {targets: [0, 6], orderable: false}
            ],
            // 不需要右上角搜索
            searching: false,
            // ajax时有友好性提示
            processing: true,
            // ajax请求
            // 开启服务器模式
            serverSide: true,
            // ajax发起请求
            ajax: {
                // 请求地址
                url: '{{ route("admin.user.list") }}',
                // 请求方式 get/post
                type: 'GET',

                // 传过来的数据
                data: function (d) {
                    d.username = $.trim($('#username').val())
                }
            },
            // 一行列表中的数据展示的数据源的指定
            columns: [
                {'data': 'aa', "defaultContent": '<input type="checkbox" value="1" name="">', className: 'text-c'},
                {'data': 'id', className: 'text-c'},
                {'data': 'username', className: 'text-c'},
                {'data': 'nickname', className: 'text-c'},
                {'data': 'email'},
                {'data': 'created_at', className: 'text-c'},
                {'data': 'bb', "defaultContent": "操作", className: 'text-c'}
            ],
            // 回调方法
            // 当前tr的dom
            // 当前tr的数据
            // 当前数据索引
            createdRow: function (row, data, dataIndex) {
                var td = $(row).find('td:eq(6)');
                // 字符串模板
                var html = `<a class="btn size-S btn-primary radius">修改</a>
                    <a data-id="${data.id}" class="btn size-S btn-danger radius deluser">删除</a>`;
                td.html(html);
            }
        });
        // 搜索
        $('#searchBtn').click(function () {
            dataTables.api().ajax.reload();
        });

        // 删除
        $('.table-sort').on('click', '.deluser', function (evt) {
            //console.log(evt.target.dataset);
            let id = $(this).attr('data-id');
            let url = `/admin/user/del/${id}`;
            $.ajax({
                url,
                data:{_token:"{{ csrf_token() }}"},
                type: 'DELETE',
                dataType: 'json'
            }).then(ret => {
                //console.log(ret);
                // 重载
                //location.reload();
                $(this).parents('td').parents('tr').remove();


            })
        });

    </script>
@endsection