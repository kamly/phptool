<?php
header("Content-Type: text/html; charset=UTF-8");


// php 其他函数/files_count.php . php md

// 获取要查询后缀的名字
for ($i = 2; $i < $argc; $i++) {
    $arr[] = $argv[$i];
}

$count = getDirFiles($argv[1], $arr, $count);
// php 其他函数/files_count.php . php md  => getDirFiles('.', array('php', 'md'), $count);

// 拼接要查询的后缀名字
$str = $arr[0];
for ($i = 1; $i < count($arr); $i++) {
    $str = $str . '|' . $arr[$i];
}

var_dump("target: $str, sum: $count");

/*
 *  统计文件个数
 */
function getDirFiles($pathName, $exts, &$count)
{
    foreach (glob($pathName) as $fileName) {
        if (is_dir($fileName)) {
            getDirFiles($fileName . DIRECTORY_SEPARATOR . '*', $exts, $count);
        } else {
            if (in_array(pathinfo($fileName, PATHINFO_EXTENSION), $exts)) {
                $count++;
            }
        }
    }

    return $count;
}