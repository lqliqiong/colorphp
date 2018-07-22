<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;

use  app\admin\model\Activity;
use  app\admin\model\ActivityCode;

class Index extends  Controller
{
    public function addActivity(Request  $request)
    {
       //验证权限以及表单基本信息
       if(!$this->checkAuth($request)||!$this->checkForm($request)){
           return  json("-99", 200);
       }

        //验证验证码
        $validate_activity_code =$this->validateActivityCode($request);
        if(1!=$validate_activity_code){
            return  json($validate_activity_code, 200);
        }

        //创建活动
        $this->saveActivity($request);

        //验证码标记
        $this->updateActiveCode($request);
        return  json("1", 200);
    }

    /**
     * 核对用户信息、ip请求
     * @param Request $request
     * @return bool
     */
    protected function  checkAuth(Request $request){
        //验证token等信息
        return true ;
    }
    /**
     * 验证表单信息
     */
    protected function  checkForm(Request $request){
        if (empty($request-> ispost())
            ||empty( $request -> post("activtyName"))||empty( $request -> post("activityAddress"))
            ||empty( $request -> post("activtyCode"))||empty( $request -> post("activityDate")
            )){
            return false ;
        }
        return true ;
    }

    /**
     * 验证验证码合法性
     * 1.合法（可用）
     * -2.状态不合法(已失效or已使用)
     * -1.验证码不存在
     * @param Request $request
     * @return int
     */
    function  validateActivityCode(Request $request){
        //获取验证码
        $activtyCode = $request -> post("activtyCode");
        //活动券码表查询记录
        $res = ActivityCode::where("activity_code",$activtyCode)->select();
        //不存在或者存在多个
        if(empty($res)||sizeof($res)>1){
            return  -1 ;
        }else{
            $status=$res[0]->status ;
            if("0" ==$status){
                return  1 ;
            }else  {
                return  -2 ;
            }

        }
    }

    /***
     * 保存活动信息
     * @return int
     */
    function  saveActivity(Request $request){
        $res = Activity::create([
            'activty_name' => $request -> post("activtyName"),
            'activity_code'=> $request -> post("activtyCode"),
            'activity_data'=> $request -> post("activityDate"),
            'activity_address'=> $request -> post("activityAddress")
        ],true);
    }

    /**
     * 变更验证码使用状态
     * @param Request $request
     */
    function  updateActiveCode(Request $request){
        //获取验证码
        $activtyCode = $request -> post("activtyCode");
        //变更验证码使用状态为已用
        $res = ActivityCode::update([
            "status"=>1
        ],[
            'activity_code'=>$activtyCode
        ]);
    }



//============================临时测试区域============================///


    public function addActivityTest(Request  $request){
//        $v=$this -> checkForm($request);
//        if(!$v){
//            return  json(false, 200);
//        }
//        return  json( $this -> validateActivityCode($request), 200);

//        $res = ActivityCode::where("activity_code","111")->find();
//        dump($res->toArray());

        return  json( $this -> validateActivityCode($request), 200);

    }

}
