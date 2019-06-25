<?php
/**
 * 后台路由
 */

Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    //登录显示
    Route::get('login','LoginController@index')->name('admin.login');
    //登录处理
    Route::post('login','LoginController@login')->name('admin.login');
    //中间件防翻墙
    Route::group(['middleware'=>'Checkout'],function (){
        //后台首页
        Route::get('index','IndexController@index')->name('admin.index.index');
        //欢迎页
        Route::get('welcome','IndexController@welcome')->name('admin.index.welcome');
        //退出
        Route::get('logout','IndexController@logout')->name('admin.index.logout');
        //用户列表展示
        Route::get('user/index','UserController@index')->name('admin.user.index');
        //ajax
        Route::get('user/list','UserController@list')->name('admin.user.list');
        //删除用户
        Route::delete('/user/del/{user}','UserController@del')->name('admin.user.del');
        //添加用户
        Route::get('user/create','UserController@create')->name('admin.user.create');
        Route::post('user/create','UserController@add')->name('admin.user.create');
    //
    });
});