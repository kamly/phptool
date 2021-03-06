<?php



// php 其他函数/files_dom.php
// php 其他函数/files_dom.php 其他函数


if (isset ($argv[1])) {
    $basedir = $argv[1];
} else {
    $basedir = '.';
}

$auto = 1;

checkdir($basedir);

function checkdir($basedir)
{
    if ($dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
                if (!is_dir($basedir . "/" . $file)) { // 如果是文件
                    var_dump("filename: $basedir/$file " . checkBOM("$basedir/$file"));
                } else {
                    $dirname = $basedir . "/" . $file; // 如果是目录
                    checkdir($dirname); // 递归
                }
            }
        }
        closedir($dh);
    }
}

function checkBOM($filename)
{
    global $auto;
    $contents = file_get_contents($filename);
    $charset [1] = substr($contents, 0, 1);
    $charset [2] = substr($contents, 1, 1);
    $charset [3] = substr($contents, 2, 1);
    if (ord($charset [1]) == 239 && ord($charset [2]) == 187 && ord($charset [3]) == 191) { // BOM 的前三个字符的ASCII 码分别为 239 187 191
        if ($auto == 1) {
            $rest = substr($contents, 3);
            rewrite($filename, $rest);
            return ("BOM found, automatically removed.");
        } else {
            return ("BOM found.");
        }
    } else
        return ("BOM Not Found.");
}

function rewrite($filename, $data)
{
    $filenum = fopen($filename, "w");
    flock($filenum, LOCK_EX);
    fwrite($filenum, $data);
    fclose($filenum);
}