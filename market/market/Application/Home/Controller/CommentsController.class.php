<?php
namespace Home\Controller;
use Think\Controller;

class CommentsController extends BaseController{
	
	/**
	 * @desc  获取评论信息
	 */
	public function viewComments($goodsId = 1,$pn = 0){
		$Comments = M('Comments');
		$User = D('User');
		$fields = array();
		$order = array();
	
		if($goodsId !="")
		{
			$fields['goods_id'] = $goodsId;
		}else{
			$result['message'] = "wrong";
			$this->ajaxReturn($result);
		}
	
		$data = $Comments->where($fields)->limit($pn*10,10)->getField('id,user_id,content');
		$commentsData = Array();
		//var_dump($data);
		foreach ($data as $value){
			$userName = $User->getUserName($value['user_id']);
			//var_dump($userName);
			if ($userName != NULL) {
				$value['username'] = $userName;
				$commentsData[] = $value;
			}
		}
		$result['data'] = $commentsData;
		$result['message'] = "success";
		
		$this->ajaxReturn($result);
	}
	
	/**
	 * 添加评论
	 * @desc  $content 最好使用post传递
	 */
	public function addComments($goodsId = 1){
		//实例化comment
		$Comments = M('Comments');
		$data = array();
		$data['goods_id'] = $goodsId;
		$data['user_id'] = I('post.userId');
		$data['content'] = I('post.content');
	
		$result = $Comments->add($data);
		//$sql = $Comments->getLastSql();
		//$addData['sql'] = $sql;
	
		if ($result){
			$addData['id'] = $result;
			$addData['message'] = "success";
		}else{
			$addData['id'] = -1;
			$addData['message'] = "wrong";
		}
		$this->ajaxReturn($addData);
	}
}
