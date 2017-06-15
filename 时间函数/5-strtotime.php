<?php

header('content-type:text/html;charset=utf-8');

// 英文文本转换时间戳

echo time();
echo '<br/>';

echo strtotime('now');
echo '<br/>';

echo date('Y-m-d H:i:s');
echo '<br/>';


echo date('Y-m-d H:i:s', time()+24*3600);
echo '<br/>';


echo date('Y-m-d H:i:s', strtotime('+1 day'));
echo '<br/>';


echo date('Y-m-d H:i:s', strtotime('-1 day'));
echo '<br/>';


echo date('Y-m-d H:i:s', strtotime('+1 month'));
echo '<br/>';

echo date('Y-m-d H:i:s', strtotime('+1 year 3 month 12 day'));
echo '<br/>';


echo date('Y-m-d H:i:s', strtotime('last Monday'));
echo '<br/>';










