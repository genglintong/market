<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
    	$img = $this->uploadPic();
    	$result['isSuccess'] = 1;
    	$result['file'] = $img;
        $this->ajaxReturn($result);
    }
    public function test(){
    	\Think\Log::record('测试日志信息');
        $User  = M("Index"); //实例化User对象
        $fields['name'] = 'genglintong';
        
        //查询
        $data = $User->where($fields)->select();
        echo $User->count();
        var_dump($data);
        $data['test']=test;        
        $this->ajaxReturn($data);
    }
}
