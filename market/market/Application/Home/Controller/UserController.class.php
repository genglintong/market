<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index($name = '',$age = ''){
    	$this->display("login");
    }
    
    public function test(){
        $User  = M("User"); //实例化User对象
        $fields['name'] = 'genglintong';
        
        //查询
        $data = $User->where($fields)->select();
        //echo $User->count();
        //var_dump($data);
        
        $this->ajaxReturn($data);
    }
    
    /**
     * login 用户注册
     * @param name  用户名
     * @param password  用户密码
     * @param is_sale  是否卖/买家  默认买家
     * @param email  卖家邮箱
     * @return  boolean  是否成功
     */
    public function register(){
    	header("Access-Control-Allow-Origin: *");
    	$put=file_get_contents('php://input');
    	$postData=json_decode($put,true);
    	
    	$User  = M("User"); //实例化User对象
        $data['name'] = $postData['name'];
        $data['password'] = md5($postData['password']);
        $fields['name'] = $postData['name'];
        
        if (isset($postData['is_sale']) && $postData['is_sale'] == '1'){
        	$data['is_sale'] = intval($postData['is_sale']);
        	$data['email'] = $postData['email'];
        }
        
        //判断是否已经注册
        $isRegister = $User->where($fields)->find();
        
        $registerData = Array();
        if ($isRegister){
        	$registerData['message'] = "nameRepeat";
        }
        else{
        	$result = $User->add($data);
        	if ($result){
        		$registerData['message'] = "success";
        	}else {
        		$registerData['message'] = "wrong";
        	}
        }
        $this->ajaxReturn($registerData);
    }
    
    /** logout  用户登录验证
     * @param name 用户名
     * @param password 密码
     * @return  boolean
     */
    public function login(){
        header("Access-Control-Allow-Origin: *");
        $put=file_get_contents('php://input');
		$postData=json_decode($put,true);
    	$name = $postData['name'];
        $password = $postData['password'];        

        $User  = M("User"); //实例化User对象
        $fields['name'] = $name;
        $password = md5($password);
        //查询
        $data = $User->where($fields)->limit(1)->getField('user_id,name,password,vol,is_sale');
        $loginData = array();
        $data = current($data);
        if ($data && $data['password']== $password) {
			session('uid',$data['user_id']);
			session('name',$data['name']);
			session('is_sale',$data['is_sale']);
			$userData['uid'] = $data['user_id'];
			$userData['name'] = $data['name'];
			$userData['is_sale'] = $data['is_sale'];
			
			$loginData['message'] = 'success';
			$loginData['user'] = $userData;
        }
        else{
            $loginData['message'] = 'wrong';
        }
        $this->ajaxReturn($loginData); 
    }
}
