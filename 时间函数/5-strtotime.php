<?php

header('content-type:text/html);charset=utf-8');

//  strtotime() 函数的使用及常用参数介绍

var_dump("time() : " . time());

var_dump("strtotime('now') : " . strtotime('now'));

var_dump("date('Y-m-d H:i:s') : " . date('Y-m-d H:i:s'));

var_dump("date('Y-m-d H:i:s', time()+24*3600) : " . date('Y-m-d H:i:s', time() + 24 * 3600));

var_dump("date('Y-m-d H:i:s', strtotime('+1 day')) : " . date('Y-m-d H:i:s', strtotime('+1 day')));
var_dump("date('Y-m-d H:i:s', strtotime('-1 day')) : " . date('Y-m-d H:i:s', strtotime('-1 day')));
var_dump("date('Y-m-d H:i:s', strtotime('+1 month')) : " . date('Y-m-d H:i:s', strtotime('+1 month')));
var_dump("date('Y-m-d H:i:s', strtotime('+1 year 3 month 12 day')) : " . date('Y-m-d H:i:s', strtotime('+1 year 3 month 12 day')));
var_dump("date('Y-m-d H:i:s', strtotime('last Monday')) : " . date('Y-m-d H:i:s', strtotime('last Monday')));



