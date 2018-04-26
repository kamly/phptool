<?php
header('content-type:text/html;charset=utf-8');

//  time() mktime() 函数的使用及常用参数介绍

var_dump("time() : " . time());
var_dump("date('Y-m-d H:i:s') : " . date('Y-m-d H:i:s')); // 第二个参数默认当前时间戳
var_dump("date('Y-m-d H:i:s', time()) : " . date('Y-m-d H:i:s', time()));
var_dump("date('Y-m-d H:i:s', time() + 24 * 3600) : " . date('Y-m-d H:i:s', time() + 24 * 3600));
var_dump("date('Y-m-d H:i:s', time() + 7 * 24 * 3600) : " . date('Y-m-d H:i:s', time() + 7 * 24 * 3600));
var_dump("date('Y-m-d H:i:s', time() - 7 * 24 * 3600) : " . date('Y-m-d H:i:s', time() - 7 * 24 * 3600));


// 获取指定日期的时间戳 mktime(h,i,s,n,j,Y)
var_dump("mktime(0, 0, 0, 8, 12, 2016) : " . mktime(0, 0, 0, 8, 12, 2016)); // 2016 8 12 00 00 00
var_dump("mktime(0, 0, 0, 6, 1, 1996) : " . mktime(0, 0, 0, 6, 1, 1996));

var_dump("date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6, 1996)) : " . date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6, 1996)));
var_dump("date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6)) : " . date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6)));
var_dump("date('Y-m-d H:i:s', mktime(0, 0, 0, 5)) : " . date('Y-m-d H:i:s', mktime(0, 0, 0, 5)));


// 两个日期的时间差
$birth = mktime(0, 0, 0, 5, 6, 1996);
$time = time();
var_dump("floor(($time - $birth)/(24 * 3500 * 365)) : " . floor(($time - $birth) / (24 * 3500 * 365)));



