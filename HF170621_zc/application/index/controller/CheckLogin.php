<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 10:34
 */
namespace  app\index\controller;
use think\Controller;
use think\Session;
use think\Response;
use think\Request;


class CheckLogin extends Controller
{
    public function _initialize()
    {
        $request = Request::instance();
        if(!($request->controller()=='Link'&&$request->action()=='loginpage'||$request->controller()=='Login')){
            if(empty(Session::get('nowemployee'))){
                $this->error('请先登录,将跳转至登录页面',url('index/Link/loginpage'));
            }
        }
    }
}