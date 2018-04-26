<?php
header('content-type:text/html;charset=utf-8');

// 设置时区

/**
 * 1. 
 * 配置文件修改
 * 2.
 * date_default_timezone_set() // 动态设置
 * date_default_timezone_get()
 * 3.
 * ini_set()
 * ini_get()
 */

// 方法1
// 亚洲时区: PRC Asia/Shanghai
// 1.修改php配置文件，date.timezone=PRC，重启服务器，针对所有脚本

// 方法2
// echo '当前市区'.date_default_timezone_get();

// var_dump(date_default_timezone_set('Asia/Shanghai')); // 进行修改

// echo '当前市区'.date_default_timezone_get();


// 方法3
// var_dump(ini_get('date.timezone'));

// var_dump(ini_set('date.timezone', 'PRC'));  // 进行修改

// var_dump(ini_get('date.timezone'));
