<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($name = '',$age = ''){
        $data['name'] = 'genglintong';
        $data['sex'] = 'man';
        $data['age'] = '22';
        
        //$name = $this->__get($name);
        
        //$sex = I(post.sex,'a');
        //$age = I(get.age,'a');
        //echo $name."\n";
        if ($name != ''){
            $data['name'] = $name;
        }
        
        if ($sex != ''){
            $data['sex'] = $age;
        }
        
        $this->ajaxReturn($data);
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function test(){
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
