<?php
/**
 * Created by IntelliJ IDEA.
 * User: lq
 * Date: 2018/7/22
 * Time: 12:21
 */
namespace app\admin\model;
use   think\Model;



class  Activity extends Model {
    protected $auto =[
       'create_time'
    ];

    /**
     * @return false|string
     */
    Public  function  setCreateTimeInsertAtr(){
    return  date("Y-m-d h:i:sa");
    }
}
