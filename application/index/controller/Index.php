<?php
namespace app\index\controller;

class Index
{
    public function index1()
    {
//        echo "111";
//        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架uuuuuuu</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
        return  "1";
    }

    public function addajax(){
         $this->ajaxReturn("-99","添加活动",1) ;
    }
    /**
     * php 后台为伪代码
     */
    //创建活动
    public function add()
    {
        $add = 1;
        //验证用户信息
        if(!check_auth()){
            return $this->ajaxReturn(-99) ;
        }
        //验证字段
        if(!check_form()){
            return $this->ajaxReturn(-98)  ;
        }
        //验证验证码
        $validate_activity_code =validate_activity_code(11);
        if(1!=$validate_activity_code){
            return  $validate_activity_code;
        }
        //创建活动
//        return save_activity($data);
    }
    function  check_auth(){
        return true ;

    }

    function  check_form(){
        return true ;

    }

    function  validate_activity_code($activityCode){
        $activity = M("Activity");
        $arry = $activity->find($activityCode);
        if($arry){
            return  1 ;
        }
        return  -1 ;
    }

    function  save_activity($data){
        $User = new Activity(); //实例化User对象
        $result = $User->save($data);
        if($result){
            return 1 ;
        } else {
            return -2;
        }
    }
}
