<?php

return array(
    'DB_TYPE' => 'mysql', //数据库类型
    'DB_HOST' => 'localhost', //数据库主机
    'DB_NAME' => 'kilo', //数据库名称
    'DB_USER' => 'root', //数据库用户名
    'DB_PWD' => '', //数据库密码
    'DB_PORT' => '3306', //数据库端口
    'DB_PREFIX' => 'db_', //数据库前缀9+
    'DB_CHARSET'=> 'utf8', // 字符集
    'DB_DEBUG'  => '', // 数据库调试模式 开启后可以记录SQL日志
    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',		//自定义success跳转页面
    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',		//自定义error跳转页面
    'IMG_ROOT_PATH'    => '/Uploads/goods/'
);