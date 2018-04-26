<?php
header('content-type:text/html;charset=utf-8');


// date()函数的使用及常用参数介绍

var_dump("date('Y年m月d日') : " . date('Y年m月d日'));
var_dump("date('Y~m~d~') : " . date('Y~m~d~'));
var_dump("date('Y/m/d H:i:s') : " . date('Y/m/d H:i:s'));
var_dump("date('Y') : " . date('Y'));
var_dump("date('y-n-j') : " . date('y-n-j'));
var_dump("date('H:i:s A') : " . date('H:i:s A'));
var_dump("date('H:i:s a') : " . date('H:i:s a'));
var_dump("date('w') : " . date('w'));  // 一周内的第几天，0-6

switch (date('w')) {
	case 0:
		var_dump('今天是日');
		break;
	case 1:
		var_dump('今天是一');
		break;
	case 2:
		var_dump('今天是二');
		break;
	case 3:
		var_dump('今天是三');
		break;
	case 4:
		var_dump('今天是四');
		break;
	case 5:
		var_dump('今天是五');
		break;
	case 6:
		var_dump('今天是六');
		break;
}

$year = date('Y');
if($year % 4 == 0 && ( $year % 100 != 0 || $year % 400 == 0)){
	var_dump('是不是闰年 : yes');
} else {
	var_dump('是不是闰年 : no');
}

$data = date('L') ? 'yes':'no';
var_dump('是不是闰年 : ' . $data);

var_dump('本周是全年中的第'.date('W').'周');

var_dump('当前是全年中第'.date('z').'天');

var_dump('当前月中有'.date('t').'天');

