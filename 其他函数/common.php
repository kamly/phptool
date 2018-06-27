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


/**
 * 检测是否JSON串
 * @param $str
 * @return bool
 */
function isJsonStr($str)
{
    return is_string($str);
}

$data_1 = [1, 2, 3];
$data_2 = json_encode($data_1);
var_dump("isJsonStr([1, 2, 3]) : " . isJsonStr($data_1));
var_dump("isJsonStr(json_encode([1, 2, 3])) : " . isJsonStr($data_2));

/**
 * 根据生日返回星座
 * @param $birthday
 * @return mixed|null
 */
function getConstellationByBirthday($birthday)
{
    $names = array('魔羯座', '水瓶座', '双鱼座', '白羊座', '金牛座', '双子座', '巨蟹座',
        '狮子座', '处女座', '天秤座', '天蝎座', '射手座', '魔羯座');
    $times = array(
        '0101' => '0119', '0120' => '0218', '0219' => '0320', '0321' => '0419', '0420' => '0520',
        '0521' => '0621', '0622' => '0722', '0723' => '0822', '0823' => '0922', '0923' => '1023',
        '1024' => '1121', '1122' => '1221', '1222' => '1231'
    );
    $i = 0;
    foreach ($times as $s => $e) {
        if ($birthday >= $s && $birthday <= $e) {
            break;
        }
        $i++;
    }
    return $i >= 13 ? null : $names[$i];
}

var_dump("getConstellationByBirthday(\"0506\") : " . getConstellationByBirthday("0506"));


/**
 * 替换字符串中的预替换变量为数组中的值
 * @example $str = '<a href="{URL}">{NAME}</a>';
 *           $data = array(
 *              'URL'  => 'http://www.dodoedu.com',
 *              'NAME' => '多多社区'
 *           );
 *           返回值：<a href="http://www.dodoedu.com">多多社区</a>
 * @param $str
 * @param $data
 * @return mixed
 */
function replaceVar($str, $data)
{
    if (!$str || !$data) {
        return $str;
    }
    $rs = array();
    if (!preg_match_all('/{(.*?)}/', $str, $rs)) {
        return $data;
    }
    foreach ($rs[1] as $value) {
//            ECHO '<BR>{' . $value . '}'.' === '. $data[$value].'<BR>';
        $data[$value] && $str = str_replace('{' . $value . '}', $data[$value], $str);
    }
    return $str;
}

$str = '<a href="{URL}">{NAME}</a>';
$data = array(
    'URL' => 'http://www.dodoedu.com',
    'NAME' => '多多社区'
);
var_dump('replaceVar($str, $data) : ' . replaceVar($str, $data));


/**
 *  输出调试信息
 *
 * @param string|array $msg 要输出的数组或字符串
 * @param string $title 信息提示标题
 * @param string $spaceChar 换行符
 * @param boolean $isVarDump 是否var_dump方式输出
 */
function debug($msg, $title = null, $spaceChar = '<br>', $isVarDump = FALSE)
{
    $titleMsg = $title ? $title . ' ==> ' : '';
    echo $spaceChar . $titleMsg;
    if ($isVarDump) {
        var_dump($msg);
    } else {
        if (is_array($msg)) {
            print_r($msg);
        } else {
            echo $msg;
        }
    }
    echo $spaceChar;
}

debug('test', 'warm', "", TRUE);

/**
 * 返回邮箱的域名地址
 *
 * @param string $email
 * @return string
 */
function getMailHost($email)
{
    $ps = strpos($email, '@') + 1;
    $mailHost = substr($email, $ps, strlen($email) - $ps);
    $ret = ('gmail.com' == $mailHost) ? 'google.com' : $mailHost;
    return 'mail.' . $ret;
}

var_dump("getMailHost('121368588@qq.com') : " . getMailHost('121368588@qq.com'));


/**
 * file_get_contents 方式获取接口数据，入口参数GET
 *
 * @param $aRs 调用接口时的参数
 * @return 返回JSON数据串或错误码
 */
function getRemoteData($url, $timeOut = 5, $post = null)
{
    $opts = array(
        'http' => array(
            'method' => 'GET',
            'timeout' => 5
        )
    );
    $context = stream_context_create($opts); // 创建并返回一个文本数据流并应用各种选项
    if (is_array($post)) {
        ksort($post);
        $param = http_build_query($post, '', '&');
        $url = $url . '?' . $param;
    }
    $ret = file_get_contents($url, false, $context);
    //匹配是否是正则串
    $isJsonStr = preg_match("/^(\[\{(.*?):(.*?)\}\])|(\{(.*?):(.*?)\})$/", $ret);
    $retRs = $isJsonStr ? json_decode($ret, TRUE) : FALSE;
    return $retRs;
}


/**
 * 对象转数组
 * @param object $obj
 * @return array
 */
function object2array($obj)
{
    $arr = is_object($obj) ? get_object_vars($obj) : $obj;
    foreach ((array)$arr as $key => $val) {
        $val = (is_array($val) || is_object($val)) ? object2array($val) : $val;
        $arr[$key] = $val;
    }
    return $arr;
}

class person
{
    public $name = "王美人";
    public $age = 25;
    public $birth;
}

$p = new person();
var_dump('object2array($p) : ');
var_dump(object2array($p));


/**
 * 将数组转换成JSON串,并base64编码，便于在URL传递
 * @param array $msgRs
 * @return string
 */
function encodeStr($msgRs)
{
    return base64_encode(json_encode($msgRs));
}


var_dump("encodeStr('https://charmingkamly.cn/ajsodfjoi23&*^234') : " . encodeStr('https://charmingkamly.cn/ajsodfjoi23&*^234'));

/**
 * 对 encodeStr 的解码
 *
 * @return array
 */
function decodeStr($encodeStr)
{
    return json_decode(base64_decode($encodeStr), TRUE);
}

var_dump("decodeStr('Imh0dHBzOlwvXC9jaGFybWluZ2thbWx5LmNuXC9hanNvZGZqb2kyMyYqXjIzNCI=') : " . decodeStr('Imh0dHBzOlwvXC9jaGFybWluZ2thbWx5LmNuXC9hanNvZGZqb2kyMyYqXjIzNCI='));














