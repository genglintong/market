<?php
namespace Home\Controller;
use Think\Controller;

class GoodsController extends BaseController{
	const ERRORMESSAGE = "wrong";
	const SUCCSEEMESSAGE = "success";
    
    /**
     * 搜索接口
     * @param number $pn  pagenum  默认为0
     * @param string $type  类型   为空则表示不按照类型展示
     * @param string $title  按照title模糊搜索  为空则表示不按照标题搜索
     * @param number $price  0  不按照价格搜索   -1  从低到高   -2  从高到低    >0   表示大于$title的商品
     * @param number $vol  0  不按照余量搜索   1  从低到高   2  从高到低
     */
    public function searchGoods($pn = 0,$type = "",$title = "",$price = 0,$vol = 0){
        //实例化  Goods
        $Goods = M('Goods');
        
        $fields = array();
        $order = array();
        
        //$fields['pn'] = $pn;
        
        if ($type != ""){
            $fields['type'] = array('eq',$type);
        }
        if ($title != ""){
            $fields['title'] = array('like',"%".$title."%");
        }
        if ($price == -1){
           //从低到高排序
           $order['price'] = 'asc';
        }elseif ($price == -2){
            //从高到低排序
            $order['price'] = 'desc';
        }elseif ($price > 0){
            $fields['price'] = array('gt',$price);
        }
        if ($vol == -1){
            //从低到高排序
            $order['vol'] = 'asc';
        }elseif ($vol == -2){
            //从高到低排序
            $order['vol'] = 'desc';
        }elseif ($vol > 0){
            $fields['vol'] = array('gt',$vol);
        }
        
        $data = $Goods->where($fields)->order($order)->limit($pn*10,10)->getField('id,title,price,overplus,intro,user_id,type,img');
        $sql = $sql = $Goods->getLastSql();
        
        //echo $sql;
        $serchData['sql'] = $sql;
        $serchData['data'] = $data;
        
        $this->ajaxReturn($serchData);
    }
    
    /**
     * 添加商品
     * 
     */
    public function addGoods($userId =1){
    	//实例化  Goods
    	$Goods = M('Goods');
    	$data = array();
    	$data['title'] = I("post.title");
    	$data['price'] = I("post.price");
    	$data['overplus'] = I("post.vol");
    	$data['intro'] = I("post.intro");
    	$data['user_id'] = $userId;
    	$data['type'] = I("post.type");
    	$data['img'] = $this->uploadPic();
    	
    	$result = $Goods->add($data);
    	$sql = $Goods->getLastSql();
    	$addData['sql'] = $sql;
    	if ($result){
    		$addData['id'] = $result;
    		$addData['message'] = self::SUCCSEEMESSAGE;
    	}else{
    		$addData['id'] = -1;
    		$addData['message'] = self::ERRORMESSAGE;
    	}
    	$this->ajaxReturn($addData);
    }
    
    /**
     * desc  根据goodsid  查找是商品信息
     */
    public function getGoods($goodId = 0 , $pn = 0){
    	$Goods = M('Goods');
    	$fields = array();
    	$data = array();
    	
    	$fields['id'] = $goodId;
    	//$user_id = I("post.userId");
    	$data = $Goods->where($fields)->limit($pn*10,10)->getField('id,title,price,overplus,intro,type,img');
    	//$sql = $sql = $Goods->getLastSql();
    	
    	
    	//$serchData['sql'] = $sql;
    	$serchData['message'] = "success";
    	$serchData['data'] = $data;
    	
    	$this->ajaxReturn($serchData);
    }
    
    /**
     * @desc  根据userid获取商品信息
     * @param number $user_id
     */
    public function viewGoods($user_id= 1 , $pn = 0){
    	//header("Access-Control-Allow-Origin: *");
    	$Goods = M('Goods');
    	$fields = array();
    	$data = array();
        
    	$fields['user_id'] = $user_id;
    	//$user_id = I("post.userId");
    	$data = $Goods->where($fields)->limit($pn*10,10)->getField('id,title,price,overplus,intro,type,img');
    	$sql = $sql = $Goods->getLastSql();
    
    	//echo $sql;
    	$serchData['sql'] = $sql;
    	$serchData['data'] = $data;
    
    	$this->ajaxReturn($serchData);
    }
    
    /**
     * 删除商品
     * @param number $user_id
     */
    public function deleteGoods($goodsId = 1){
    	$Goods = M('Goods');
    	$fields['id'] = $goodsId;
       	$result = $Goods->where($fields)->delete();
        //var_dump($result); 	
    	if ($result) {
    		$data['message'] = self::MESSAGESUCCSEE;
    	}else {
    		$data['message'] = self::MESSAGEERROR;
    	}
    	$this->ajaxReturn($data);
    }
    
    /**
     * 更新商品
     * @param number $user_id
     */
    public function updateGoods($goodsId = 1){
    	//实例化  Goods
    	$Goods = M('Goods');
    	$data = array();
		$fields['id'] = $goodsId;
    	if (I("post.title")) {
    		$data['title'] =  I("post.title");
    	}
    	if (I("post.price")) {
    		$data['price'] = I("post.price");
    	}
    	if (I("post.vol")) {
    		$data['overplus'] = I("post.vol");;
    	}
    	if (I("post.intro")) {
    		$data['intro'] = I("post.intro");
    	}
    	if (I("post.type")) {
    	 	$data['type'] = I("post.type");
    	}
    	if (I("post.goodsId")) {
			$fields['id'] = I("post.goodsId");
		}
		//$data['title'] = 'ddd';
    	$result = $Goods->where($fields)->save($data);
    	//var_dump(I("post."));
    	$sql = $Goods->getLastSql();
		$updateData['sql'] = $sql;
		if ($result) {
    		$updateData['message'] = self::MESSAGESUCCSEE;
    	}else {
    		$updateData['message'] = self::MESSAGEERROR;
    	}
    	
    	$this->ajaxReturn($updateData);
    }
    
}
