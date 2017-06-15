<?php

header('content-type:text/html;charset=utf-8');

// 时间戳的一个列子

echo time();
echo '<br/>';

echo date('Y-m-d H:i:s'); // 第二个参数默认当前时间戳
echo '<br/>';

echo date('Y-m-d H:i:s', time());
echo '<br/>';

echo date('Y-m-d H:i:s', time()+24*3600);
echo '<br/>';

echo date('Y-m-d H:i:s', time()+7*24*3600);
echo '<br/>';

echo date('Y-m-d H:i:s', time()-7*24*3600);
echo '<br/>';


//获取指定日期的时间戳 mktime(h,i,s,n,j,Y)
echo mktime(0, 0, 0, 8, 12, 2016);// 2016 8 12 00 00 00
echo '<br/>';

echo mktime(0, 0, 0, 6, 1, 1996);
echo '<br/>';

echo date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6, 1996));
echo '<br/>';

echo date('Y-m-d H:i:s', mktime(0, 0, 0, 5, 6));
echo '<br/>';

echo date('Y-m-d H:i:s', mktime(0, 0, 0, 5));
echo '<br/>';

// 两个日期的时间差

$birth = mktime(0, 0, 0, 5, 6, 1996);
$time = time();
echo floor(($time-$birth)/(24*3500*365));
























































