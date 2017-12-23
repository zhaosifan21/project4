<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 13:23
 */

namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Db;
use think\Cookie;
use think\Session;
use think\Response;
use think\Request;
use app\index\controller\CheckLogin;

class Login extends CheckLogin
{
    //登录验证
    public function login()
    {
        if(input('?post.eid')&&input('?post.pwd')&&input('?post.code')){
            $eid = input('post.eid');
            $pwd = input('post.pwd');
            $code = input('post.code');
            $login_msg = Config::get('login_msg');
            if($eid==''||$pwd==''||$code==''){
                return ['code'=>0,'msg'=>$login_msg['login_empty'],'data'=>[]];
            }
            elseif(!captcha_check($code)){
                return ['code'=>3,'msg'=>$login_msg['login_codeError'],'data'=>[]];
            }
            else {
                //$where = ['elogid'=>$eid,'epwd'=>md5($pwd)];
                $where = ['elogid'=>$eid];
                $res = Db::name('employee')->where($where)->find();
                if(empty($res)){
                    return ['code'=>2,'msg'=>$login_msg['login_faild'],'data'=>[]];
                }
                else{
                    $true_pwd = $res['epwd'];
                    if(password_verify($pwd,$true_pwd)){
                        Session::set('nowemployee',$res['eid']);
                        Cookie::set('nowemployee',$res['eid']);
                        return ['code'=>1,'msg'=>$login_msg['login_success'],'data'=>['url'=>url('index/Link/homepage')]];
                    }
                    else{
                        return ['code'=>2,'msg'=>$login_msg['login_faild'],'data'=>[]];
                    }
                }
            }
        }
        else{
            return ['code'=>4,'msg'=>'数据传输发生错误','data'=>[]];
        }
    }

    //注销操作
    public function logout()
    {
        Session::delete('nowemployee');
        Cookie::delete('nowemployee');
        return ['code'=>1001,'msg'=>'您已成功退出','data'=>['url'=>url('index/Link/loginPage')]];
    }

    //登录后的欢迎页面显示个人角色和信息
    public function welcome()
    {
        $eid = Session::get('nowemployee');

        $res = Db::name('employee')->alias('a')->join('zc_character b','a.cha_id = b.cha_id')->where('eid',$eid)->find();
        if(!empty($res)){
            $ename = $res['ename'];
            $cha_name = $res['cha_name'];
            return ['code'=>1001,'msg'=>'','data'=>['ename'=>$ename,'eid'=>$eid,'cha_name'=>$cha_name]];
        }
        else{
            return ['code'=>1002,'msg'=>'员工信息获取失败','data'=>[]];
        }
    }
}