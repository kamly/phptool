<?php

header('content-type:text/html;charset=utf-8');

// 格式化本地日期时间

// date()函数的使用及常用参数介绍
echo date('Y年m月d日');
echo '<br/>';
echo date('Y~m~d~');
echo '<br/>';
echo date('Y/m/d H:i:s');
echo '<br/>';
echo date('Y');
echo '<br/>';
echo date('y-n-j');
echo '<br/>';
echo date('y-n-j');
echo '<br/>';
echo date('H:i:s A');
echo '<br/>';
echo date('H:i:s a');
echo '<br/>';
// date('w') // 一周内的第几天，0-6
echo date('w');
echo '<br/>';
switch (date('w')) {
	case 0:
		echo '日';
		break;
	case 1:
		echo '一';
		break;
	case 2:
		echo '二';
		break;
	case 3:
		echo '三';
		break;
	case 4:
		echo '四';
		break;
	case 5:
		echo '五';
		break;
	case 6:
		echo '六';
		break;
}

echo '<br/>';
$year = date('Y');
if($year % 4 == 0 && ( $year % 100 != 0 || $year % 400 == 0)){
	echo 'yes';
}else{
	echo 'no';
}
echo '<br/>';
echo date('L') ? 'yes':'no';
echo '<br/>';

echo '本周是全年中的第'.date('W').'周';
echo '<br/>';

echo '当前是全年中第'.date('z').'天';
echo '<br/>';

echo '当前月中有'.date('t').'天';
echo '<br/>';
