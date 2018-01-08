<?php
namespace  Home\Model;
use Think\Model;
class  CarModel extends Model {
	//数据表定义
	protected $TableName = 'car';
	
	/**
	 * 获取car  详细数据
	 */
	public function getCar($carId){
		$fields['id'] = $carId;
		$data = $this->where($fields)->select();
		return $data;
	}
}