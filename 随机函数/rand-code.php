<?php
header("Content-Type: text/html; charset=UTF-8");
/**
 * 生成随机码
 * @param  int $length
 * @return string
 */
function rand_code($length, $type = null)
{
    if ($type == 'num') {
        $rand_factor = array("123456789");
    } else {
        $rand_factor = array("0123456789",
            "abcdefghijklmnopqrstuvwxyz",
            "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    }

    $rand_src = implode('', $rand_factor);

    $code = '';
    $count = strlen($rand_src) - 1;
    for ($i = 0; $i < $length; $i++) {
        $code .= $rand_src[rand(0, $count)];
    }
    return $code;
}

var_dump("rand_code(8) : " . rand_code(8));
var_dump("rand_code(8, 'num') : " . rand_code(8, 'num'));


/**
 * 生成随机8位密码  可以有多种方式生成随机密码
 * @return string 8位字符串
 */
function makeRandPwd()
{
    $chars = 'abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $cnt = strlen($chars);
    //$chars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $code = $chars[mt_rand(23, $cnt - 10)] //大写
        . $chars[mt_rand(0, $cnt - 1)]
        . $chars[mt_rand(0, $cnt - 1)]
        . $chars[mt_rand(0, 22)] //小写
        . $chars[mt_rand(0, $cnt - 1)]
        . $chars[mt_rand(0, $cnt - 1)]
        . $chars[mt_rand($cnt - 10, $cnt - 1)]
        . $chars[mt_rand(0, $cnt - 1)];
    return $code;
}

var_dump("makeRandPwd() : " . makeRandPwd());


/**
 * 根据当前时间生成一个唯一识别码
 * @return string 21位字符串
 */
function makeGuid() {
    list($s1, $s2) = explode(' ', microtime());
    $times = str_replace('.', '', $s2 . $s1);
    return $times . mt_rand(0, 9) . mt_rand(0, 9);
}

var_dump("makeGuid() : " . makeGuid());

/**
 * 生成唯一标识的数字，用来产生邀请码
 * @return int
 */
function guid() {
    return crc32(strtoupper(md5(uniqid(mt_rand(), true))));
}

var_dump("guid() : " . guid());


