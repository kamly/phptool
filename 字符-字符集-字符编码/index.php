<?php
header("Content-Type: text/html; charset=UTF-8");

$str = unicode_decode('\u949f\u4e3d\u7f07', 'UTF-8', true, '\u', ''); // 转码 Unicode编码转汉字
var_dump(mb_detect_encoding($str, array("ASCII", 'UTF-8', 'GB2312', 'GBK', 'BIG5'))); // 检查编码


var_dump(iconv("UTF-8", "gbk//TRANSLIT", $str));  // 转码 UTF-8->gbk
var_dump(mb_convert_encoding($str, 'gbk', 'auto')); // 转码 UTF-8->gbk
var_dump($str);

var_dump(iconv("UTF-8", "gb2312//TRANSLIT", '123—123哈哈')); // 报错
// var_dump(iconv("UTF-8","gb2312",'123—123哈哈')); // 提示错误

/**
 * Unicode编码转汉字
 * @param string $str Unicode编码的字符串
 * @param string $decoding 原始汉字的编码
 * @param boot $ishex 是否为十六进制表示（支持十六进制和十进制）
 * @param string $prefix 编码后的前缀
 * @param string $postfix 编码后的后缀
 */
function unicode_decode($unistr, $encoding = 'UTF-8', $ishex = false, $prefix = '&#', $postfix = ';')
{
    $arruni = explode($prefix, $unistr);
    $unistr = '';
    for ($i = 1, $len = count($arruni); $i < $len; $i++) {
        if (strlen($postfix) > 0) {
            $arruni[$i] = substr($arruni[$i], 0, strlen($arruni[$i]) - strlen($postfix));
        }
        $temp = $ishex ? hexdec($arruni[$i]) : intval($arruni[$i]);
        $unistr .= ($temp < 256) ? chr(0) . chr($temp) : chr($temp / 256) . chr($temp % 256);
    }

    // return iconv('UCS-2', $encoding, $unistr);
    return iconv('UCS-2BE', $encoding, $unistr);
}

/**
 * 汉字转Unicode编码
 * @param string $str 原始汉字的字符串
 * @param string $encoding 原始汉字的编码
 * @param boot $ishex 是否为十六进制表示（支持十六进制和十进制）
 * @param string $prefix 编码后的前缀
 * @param string $postfix 编码后的后缀
 */
function unicode_encode($str, $encoding = 'UTF-8', $ishex = false, $prefix = '&#', $postfix = ';')
{
    $str = iconv($encoding, 'UCS-2', $str);
    $arrstr = str_split($str, 2);
    $unistr = '';
    for ($i = 0, $len = count($arrstr); $i < $len; $i++) {
        $dec = $ishex ? bin2hex($arrstr[$i]) : hexdec(bin2hex($arrstr[$i]));
        $unistr .= $prefix . $dec . $postfix;
    }
    return $unistr;
}
