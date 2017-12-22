<?php
namespace app\index\controller;

use think\Controller;
use think\Cookie;
use app\index\controller\CheckLogin;



class Link extends CheckLogin
{
    //加载登录页面
    public function loginpage()
    {
        return $this->fetch();
    }

    //加载后台管理页面
    public function homepage()
    {
        return $this->fetch();
    }

    //欢迎页面
    public function welcome()
    {
        return $this->fetch();
    }

    //员工管理页面
    public function membermanage()
    {
        return $this->fetch();
    }

    //权限管理页面
    public function permissionmanage()
    {
        return $this->fetch();
    }

    //前台用户管理页面
    public function usermanage()
    {
        return $this->fetch();
    }

    //众筹查询管理页面
    public function crowdfundingmanage()
    {
        return $this->fetch();
    }

    //限时抢购发布页面
    public function flashsell()
    {
        return $this->fetch();
    }

    //未支付订单页面
    public function ordernotpay()
    {
        return $this->fetch();
    }

    //已支付订单页面
    public function orderpay()
    {
        return $this->fetch();
    }

    //操作日志
    public function dailylog()
    {
        return $this->fetch();
    }

    //统计报表页面
    public function showchart()
    {
        return $this->fetch();
    }

    //广告管理页面
    public function admanage()
    {
        return $this->fetch();
    }

    //客服页面
    public function custom()
    {
        return $this->fetch();
    }

    public function curlHttp($url,$method,$data)
    {
        $curl = curl_init();   //$.ajax
        curl_setopt($curl, CURLOPT_URL,$url);   //ajax中的url参数
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST,$method);  //ajax中的type参数
        curl_setopt($curl, CURLOPT_POSTFIELDS,$data);  //ajax中的data参数
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $res = json_decode(curl_exec($curl),true);
        curl_close($curl);
        return $res;
    }
}
