<?php

header('content-type:text/html;charset=utf-8');

var_dump(time());
var_dump(strtotime('2017-2-20'));
var_dump(time()-strtotime('2017-2-20'));

$time = ceil((time()-strtotime('2017-2-20'))/(3600*24*7));

var_dump($time);


