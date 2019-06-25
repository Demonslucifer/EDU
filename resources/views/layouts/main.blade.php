<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />

    <link rel="stylesheet" type="text/css" href="{{web()}}/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="{{web()}}/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="{{web()}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="{{web()}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{web()}}/static/h-ui.admin/css/style.css" />

    <title>中华武校</title>
@yield('css')
</head>
<body>
@yield('cnt')
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{web()}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{web()}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{web()}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{web()}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
@yield('js')
</body>
</html>