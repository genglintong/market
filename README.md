# service
现在后端已经完成了数据库搭建，服务器nginx，php搭建，以及后端代码商品添加，上传等功能。
后台接口还需要进一步去完成，这个版本只是一个简略的版本。

本代码已经上传至服务器
http://111.230.233.124/market/index.php/home/goods/addGoods    //添加商品 <br>
http://111.230.233.124/market/index.php/home/goods/searchGoods   //搜索商品 <br>

前段测试时，访问controller里indexcontroller  的test方法，讲所需返回数据写在data里，访问  http://111.230.233.124/market/index.php/home/index/test
即可获得对应json数据。

访问数据库：
http://111.230.233.124/phpMyAdmin   databaseName：market
账号密码在群里分享
