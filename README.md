## 技术
前端：JS  + JQUERY +HTML
后端：php + thinkPHP
数据库: mysql
服务器: nginx

## 功能
已完成文件的上传，浏览，商品的添加修改，评论的修改添加，用户的创建。
前端已完成异步获取接口数据以及对数据动态修改，异步刷新。

## 遇到的问题
登录界面post 数据密码如何做到安全？
1.使用https加密
2.在post之前，对密码进行加密再进行传输

前后端分离，如何做到登录验证。
传统方式？
JWT?     尝试一下！
nshu.com/p/180a870a308a

JS  ajax异步提交数据
post方式


在各个页面之间如何获取传递参数？？
http://www.runoob.com/w3cnote/js-get-url-param.html

# service
现在后端已经完成了数据库搭建，服务器nginx，php搭建，以及后端代码商品添加，上传等功能。

本代码已经上传至服务器
http://111.230.233.124/market/index.php/home/goods/addGoods    //添加商品 <br>
http://111.230.233.124/market/index.php/home/goods/searchGoods   //搜索商品 <br>

前段测试时，访问controller里indexcontroller  的test方法，讲所需返回数据写在data里，访问  http://111.230.233.124/market/index.php/home/index/test
即可获得对应json数据。

访问数据库：
http://111.230.233.124/phpMyAdmin   databaseName：market
账号密码在群里分享


