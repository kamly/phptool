<?php


/**
 * 转换Ip地址
 * @param $ip
 * @return float|int
 */
function getIpLong($ip)
{
    //bindec(decbin(ip2long('这里填ip地址')));
    //ip2long();的意思是将IP地址转换成整型 ，
    //之所以要decbin和bindec一下是为了防止IP数值过大int型存储不了出现负数。
    return bindec(decbin(ip2long($ip)));
}

// 127.0.0.1 ~ 127.255.255.255   2130706433  -  2147483647
var_dump("get_iplong('127.0.0.1') : " . getIpLong('127.0.0.1'));
var_dump("get_iplong('127.255.255.255') : " . getIpLong('127.255.255.255'));


/**
 * 身份证号码末尾大小写转换
 * @param $idCards
 * @param bool $status 默认大小写转换，X 转换 X, x 转换 x
 * @return string
 */
function idCardsConvertCase($idCards, $status = true)
{
    $idCardsLastLetter = substr($idCards, -1);
    if (strtolower($idCardsLastLetter) !== 'x') {
        // 获取最后一个，转换小写，判断是不是x
        return $idCards;
    }
    $baseIdcards = substr($idCards, 0, strlen($idCards) - 1); // 剔除最后一个
    if ($status === true) {
        return (120 === ord($idCardsLastLetter)) ? $baseIdcards . 'X' : $baseIdcards . 'x';
    } else if ($status === 'X') {
        return $baseIdcards . 'X';
    } else if ($status === 'x') {
        return $baseIdcards . 'x';
    }
}

var_dump("idCardsConvertCase('44018119960516069x') : " . idCardsConvertCase('44018119960516069x'));
var_dump("idCardsConvertCase('44018119960516069x', 'X') : " . idCardsConvertCase('44018119960516069x', 'X'));
var_dump("idCardsConvertCase('44018119960516069x', 'x') : " . idCardsConvertCase('44018119960516069x', 'x'));


/**
 * 判断长度是否为身份证
 * @param $str
 * @return bool
 */
function isCards($str)
{
    $len = strlen((string)$str);
    if (!in_array($len, array(15, 18))) {
        return false;
    }
    return true;
}

var_dump("isCards('44018119960516069x') : " . isCards('44018119960516069x'));


/**
 * 检查身份证号码
 * @param string $idCards 15位或18位身份证号码
 * @param string $len 是否可以是15位号码。
 * @return string | boolean 失败返回FALSE，成功返回一个18位的身份证号
 */
function isIdCardsCorrect($idCards, $len = 'both')
{
    if (strlen($idCards) == 15 && $len == 'both') {
        //当$len不等于'both'时，15位号码无效
        $truenum = substr($idCards, 0, 6) . '19' . substr($idCards, 6);
        //为返回18位号码作准备。
        $preg = "/^[\\d]{8}((0[1-9])|(1[0-2]))((0[1-9])|([12][\\d])|(3[01]))[\\d]{3}$/";
    } else if (strlen($idCards) == 18) {
        $truenum = substr($idCards, 0, 17);
        $preg = "/^[\\d]{6}((19[\\d]{2})|(200[0-8]))((0[1-9])|(1[0-2]))((0[1-9])|([12][\\d])|(3[01]))[\\d]{3}[0-9xX]$/";
    } else {
        return false;
    }
    if (!preg_match($preg, $idCards)) {
        return false; //完成正则表达式检测
    }
    /* -----------以下计算第18位验证码------------- */
    $nsum = substr($truenum, 0, 1) * 7;
    $nsum = $nsum + substr($truenum, 1, 1) * 9;
    $nsum = $nsum + substr($truenum, 2, 1) * 10;
    $nsum = $nsum + substr($truenum, 3, 1) * 5;
    $nsum = $nsum + substr($truenum, 4, 1) * 8;
    $nsum = $nsum + substr($truenum, 5, 1) * 4;
    $nsum = $nsum + substr($truenum, 6, 1) * 2;
    $nsum = $nsum + substr($truenum, 7, 1) * 1;
    $nsum = $nsum + substr($truenum, 8, 1) * 6;
    $nsum = $nsum + substr($truenum, 9, 1) * 3;
    $nsum = $nsum + substr($truenum, 10, 1) * 7;
    $nsum = $nsum + substr($truenum, 11, 1) * 9;
    $nsum = $nsum + substr($truenum, 12, 1) * 10;
    $nsum = $nsum + substr($truenum, 13, 1) * 5;
    $nsum = $nsum + substr($truenum, 14, 1) * 8;
    $nsum = $nsum + substr($truenum, 15, 1) * 4;
    $nsum = $nsum + substr($truenum, 16, 1) * 2;
    $yzm = 12 - $nsum % 11;
    if ($yzm == 10) {
        $yzm = 'x';
    } elseif ($yzm == 12) {
        $yzm = '1';
    } elseif ($yzm == 11) {
        $yzm = '0';
    }
    /* ----------18位验证码计算完成------------- */
    if (strlen($idCards) == 18) {
        if (strtolower(substr($idCards, 17, 1)) != $yzm) {
            return false;
        }
    }
    return $truenum . $yzm;
}


var_dump("isIdCardsCorrect('440181199605060612') : " . isIdCardsCorrect('440181199605060612'));
