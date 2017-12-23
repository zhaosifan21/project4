<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/23
 * Time: 10:37
 */
namespace  app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Response;

set_time_limit(0);
class Test extends Controller
{
    public function test()
    {
        Db::name('province')->delete(true);
        Db::name('city')->delete(true);
        Db::name('town')->delete(true);
        $obj = json_decode(input('post.obj'),true);
        foreach($obj as $province){
            $pro_id = Db::name('province')->insertGetId(['pro_name'=>$province['name']]);
            foreach($province['city'] as $city){
                $city_id = Db::name('city')->insertGetId(['city_name'=>$city['name'],'pro_id'=>$pro_id]);
                foreach($city['area'] as $town){
                    Db::name('town')->insert(['town_name'=>$town,'city_id'=>$city_id]);
                }
            }
        }
    }
}