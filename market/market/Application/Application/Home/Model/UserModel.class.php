<?php
namespace  Home\Model;
use Think\Model;
class  UserModel extends Model {
    //数据表定义
    protected $TableName = 'user';
    
    /**
     * @desc  根据user_id获取用户信息
     * @param unknown $userId
     * @return Ambigous <\Think\mixed, boolean, NULL, multitype:, mixed, unknown, string, object>
     */
    public function getUserName($userId){
    	$fields['user_id'] = $userId;
    	
    	$name = $this->where($fields)->getField("name");
    	
    	return $name;
    }
}