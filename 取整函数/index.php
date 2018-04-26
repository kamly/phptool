<?php
header("Content-Type: text/html; charset=UTF-8");

// ceil -- 进一法取整

$data = ceil(4.3);  // 5 
var_dump("ceil(4.3) => $data");
$data = ceil(9.999); // 10 
var_dump("ceil(9.999) => $data");


// floor -- 舍去法取整

$data = floor(4.3); // 4 
var_dump("floor(4.3) => $data");
$data = floor(9.999); // 9 
var_dump("floor(9.999) => $data");

// round -- 对浮点数进行四舍五入

$data = round(3.4); // 3 
var_dump("round(3.4) => $data");
$data = round(3.5); // 4 
var_dump("round(3.5) => $data");
$data = round(3.6); // 4 
var_dump("round(3.6) => $data");
$data = round(3.6, 0); // 4 
var_dump("round(3.6, 0) => $data");
$data = round(1.95583, 2); // 1.96 
var_dump("round(1.95583, 2) => $data");
$data = round(1241757, -3); // 1242000 
var_dump("round(1241757, -3) => $data");
$data = round(5.045, 2); // 5.05 
var_dump("round(5.045, 2) => $data");
$data = round(5.055, 2); // 5.06 
var_dump("round(5.055, 2) => $data");


// intval---对变数转成整数型态
$data = intval(4.3); // 4 
var_dump("intval(4.3) => $data");
$data = intval(4.6); // 4 
var_dump("intval(4.6) => $data");
