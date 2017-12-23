<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/23
 * Time: 20:00
 */
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Cookie;
use think\Session;
use think\Response;
use think\Request;
use app\index\controller\CheckLogin;

class CrowdfundingManage extends CheckLogin
{
    public function showCrowdfunding()
    {

        $len = Db::name('crowdfunding')->count();
        if(!empty($len)){
            $pageAll = ceil($len/5);
            $nowpage = input('?get.nowpage')?input('get.nowpage'):1;
            $data = Db::name('crowdfunding')->alias('a')
                ->join('originator b','a.cid=b.cid')
                ->join('user c','b.uid=c.uid')
                ->join('crowdfunding_type d','a.ctype_id=d.ctype_id')
                ->join('crowdfunding_state e','a.cstate_id=e.cstate_id')
                ->field('a.*,b.uid,c.uname,d.ctype_name,e.cstate_name')
                ->paginate(5,false,['page'=>$nowpage]);
            return ['code'=>1001,'msg'=>'','data'=>['pageAll'=>$pageAll,'nowpage'=>$nowpage,'data'=>$data->items()]];
        }
        else{
            return ['code'=>1002,'msg'=>'获取数据失败','data'=>''];
        }
    }
}

?>