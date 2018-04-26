<?php
header("Content-Type: text/html; charset=UTF-8");

/**
 * 参数数组转字符串
 * @param array $params 接收的参数数组
 * @return string 字符串路径
 */
function stitchParams($params)
{
    $temp_params = [];
    foreach ($params as $key => $value) {
        array_push($temp_params, "{$key}={$value}");
    }
    $params_str = implode('&', $temp_params);
    return $params_str;
}

$params = array(
    'wechat' => 'wechat',
    'openid' => 'openid'
);
echo stitchParams($params);

/*
  wechat=wechat&openid=openid
*/






