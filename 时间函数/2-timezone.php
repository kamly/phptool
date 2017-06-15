<?php

// 设置时区
 
header('content-type:text/html;charset=utf-8');

/**
 * date_default_timezone_set() // 动态设置
 * date_default_timezone_get()
 * ini_set()
 * ini_get()
 * 亚洲时区: PRC Asia/Shanghai
 * 1.修改php配置文件，date.timezone=PRC，重启服务器，针对所有脚本
 */

// 方法2
// echo '当前市区'.date_default_timezone_get();

// var_dump(date_default_timezone_set('Asia/Shanghai'));

// echo '当前市区'.date_default_timezone_get();


// 方法3
// var_dump(ini_get('date.timezone'));

// var_dump(ini_set('date.timezone', 'PRC'));

// var_dump(ini_get('date.timezone'));
