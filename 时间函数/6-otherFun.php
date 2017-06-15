<?php

header('content-type:text/html;charset=utf-8');


// 微妙

echo microtime(); // 微妙，时间戳 0.76630800 1497483740
echo '<br/>';
echo time();
echo '<br/>';
echo microtime(true); // 1497483740.7663
echo '<br/>';

$start = microtime(true); 
for ($i=0; $i <= 100000 ; $i++) { 
	$arr[] = $i;
}
$end = microtime(true); 
echo round($end-$start,4);

// getdate() 
// gettimeofday() 
// checkdate(month, day, year)

var_dump(getdate());
echo '<br/>';

var_dump(gettimeofday());
echo '<br/>';

var_dump(checkdate(8, 12, 2016));

var_dump(checkdate(18, 12, 2016));
