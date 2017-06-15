<?php
header ( "Content-Type: text/html; charset=UTF-8" );

ceil -- 进一法取整
echo ceil(4.3);  // 5 
echo '<br/>';

echo ceil(9.999); // 10 
echo '<br/>';


// floor -- 舍去法取整

echo floor(4.3); // 4 
echo '<br/>';
echo floor(9.999); // 9 
echo '<br/>';

// round -- 对浮点数进行四舍五入

echo round(3.4); // 3 
echo '<br/>';
echo round(3.5); // 4 
echo '<br/>';
echo round(3.6); // 4 
echo '<br/>';
echo round(3.6, 0); // 4 
echo '<br/>';
echo round(1.95583, 2); // 1.96 
echo '<br/>';
echo round(1241757, -3); // 1242000 
echo '<br/>';
echo round(5.045, 2); // 5.05 
echo '<br/>';
echo round(5.055, 2); // 5.06 
echo '<br/>';


// intval---对变数转成整数型态
echo intval(4.3); //4 
echo '<br/>';
echo intval(4.6); //4 
echo '<br/>';
