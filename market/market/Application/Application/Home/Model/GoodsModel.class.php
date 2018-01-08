<?php
namespace  Home\Model;
use Think\Model;
class  GoodsModel extends Model {
    //数据表定义
    protected $TableName = 'goods';
    
    /**
     * 获取goods  详细数据
     */
    public function getGoods($goodId){
    	$fields['id'] = $goodId;
    	$data = $this->where($fields)->select();
    	return $data;
    }
    
    /**
     * 修改goods
     */
    public function updateGoods($data){
    	$goodsData = array();
    	
    	if (isset($data['title']) && $data['title']!=0) {
    		$goodsData['title'] = $data['title'];
    	}
    	if (isset($data['price']) && $data['price']!=0) {
    		$goodsData['price'] = $data['price'];
    	}
    	if (isset($data['overplus']) && $data['vol']!=0) {
    		$goodsData['overplus'] = $data['vol'];
    	}
    	if (isset($data['intro']) && $data['intro']!=0) {
    		$goodsData['intro'] = $data['intro'];
    	}
    	if (isset($data['type']) && $data['type']!=0) {
    		$goodsData['type'] = $data['type'];
    	}
    }
}