<?php
namespace Home\Controller;
use Think\Controller;
use Think\Think;

class BaseController extends Controller{
	
	const MESSAGEERROR = "wrong";
	const MESSAGESUCCSEE = "success";
	public static $userid = '';
	
	/**
	 * @desc  自动执行，验证是否登录
	 */
	public function _initialize()
    {
        header("Access-Control-Allow-Origin: *");
        // 判断用户是否登录
//        if (session('uid')) {
//            $this->userid = session('uid');
//        } else {
//            $data['message'] = 'notLogin';
//            $this->ajaxReturn($data);
//            //$this->error('对不起,您还没有登录,正跳转至登录面...', U('User/index'));
//        }
    }
	
	/**
	 * @desc  异步上传图片函数
	 */
	public function uploadPic(){
        $fileName = "file";
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件
		$info   =   $upload->upload();
//        var_dump($info);
//        var_dump($upload->getError());
		if ($info){
			$path = 'http://'.$_SERVER['HTTP_HOST'].__ROOT__."/Uploads/".$info[$fileName]['savepath'].$info[$fileName]['savename'];
			//var_dump($path);
			return $path;
		}else {
			return "";
		}
	}
	
	
}
