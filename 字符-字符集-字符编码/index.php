<?php
header("Content-Type: text/html; charset=UTF-8");

$str = unicode_decode('\u949f\u4e3d\u7f07', 'UTF-8', true, '\u', ''); // Unicode编码 转 UTF-8
var_dump("Unicode编码 转 UTF-8 : " . $str);
var_dump("检查编码 : " . mb_detect_encoding($str, array("ASCII", 'UTF-8', 'GB2312', 'GBK', 'BIG5'))); // 检查编码

var_dump("UTF-8 转 gbk : " . iconv("UTF-8", "gbk//TRANSLIT", $str));  // UTF-8 转 gbk
var_dump("UTF-8 转 gbk : " . mb_convert_encoding($str, 'gbk', 'auto')); //  UTF-8 转 gbk


var_dump("UTF-8 转 gb2312 : " . iconv("UTF-8", "gb2312//TRANSLIT", '123—123哈哈')); // UTF-8 转 gb2312
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



/**
 *  检测字符串是否UTF8
 *
 * @param string $str
 * @return boolean
 */
function isUtf8($str)
{
    return ($str === iconv('UTF-8', 'UTF-8//IGNORE', $str));
}

var_dump("检测字符串是否UTF8 : " . isUtf8("123—123哈哈"));


/**
 *  递归转换成utf8编码
 *
 * @param string|array $data
 * @return string|array
 */
function toUtf8($data)
{
    //字符串
    if (!is_array($data)) {
        if ($data === iconv('UTF-8', 'UTF-8//IGNORE', $data)) {
            return $data;
        }
        return getUTFString($data);
    }
    foreach ($data as &$value) {
        $value = toUtf8($value);
    }
    return $data;
}


/**
 * 编码转换成 Gbk
 *
 * @param $data string
 * @return string
 */
function getGbkString($string)
{
    $encoding = mb_detect_encoding($string, array('ASCII', 'GB2312', 'UTF-8', 'BIG5'));
    return mb_convert_encoding($string, 'GBK', $encoding);
}

/**
 * 编码转换成 utf-8
 *
 * @param $data string
 * @return string
 */
function getUTFString($string)
{
    $encoding = mb_detect_encoding($string, array('ASCII', 'GB2312', 'GBK', 'BIG5'));
    return mb_convert_encoding($string, 'utf-8', $encoding);
}

$data = mb_convert_encoding('你好呀', 'gbk', 'auto'); // utf8 转 gbk
var_dump("gbk 转 utf8 : " . getUTFString($data));  // gbk 转 utf8
var_dump("gbk 转 utf8 : " . toUtf8($data));
