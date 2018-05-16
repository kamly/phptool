<?php

header('content-type:text/html;charset=utf-8');


// microtime()  getdate() gettimeofday() checkdate() 函数的使用及常用参数介绍

// microtime()

var_dump("microtime() : " . microtime()); // 微妙，时间戳 0.76630800 1497483740
var_dump("time() : " . time());
var_dump("microtime(true) : " . microtime(true)); // 1497483740.7663


$start = microtime(true);
for ($i = 0; $i <= 100000; $i++) {
    $arr[] = $i;
}
$end = microtime(true);
var_dump("round($end-$start, 4) : " . round($end - $start, 4));

// getdate() 
// gettimeofday() 
// checkdate(month, day, year)

var_dump(getdate());

var_dump(gettimeofday());

var_dump("checkdate(8, 12, 2016) : " . checkdate(8, 12, 2016));

var_dump("checkdate(18, 12, 2016) : " . checkdate(18, 12, 2016));


/**
 * 获取当前的微妙级时间戳数字串
 * @param bool $onlySecond 是否只是包含秒，默认false
 * @return mixed
 */
function getNumByTime($onlySecond = false) {
    list($s1, $s2) = explode(' ', microtime());
    $retStr = $onlySecond ? $s2 : $s2 . $s1;
    return str_replace('.', '', $retStr);
}

var_dump("getNumByTime() : " . getNumByTime());
var_dump("getNumByTime(true)" . getNumByTime(true));

