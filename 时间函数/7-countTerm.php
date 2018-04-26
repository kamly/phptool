<?php

header('content-type:text/html;charset=utf-8');

// count

var_dump("time() : " . time());
var_dump("strtotime('2017-2-20') : " . strtotime('2017-2-20'));
var_dump("time()-strtotime('2017-2-20') : " . (time() - strtotime('2017-2-20')));
var_dump("ceil((time()-strtotime('2017-2-20'))/(3600*24*7)) : " . ceil((time() - strtotime('2017-2-20')) / (3600 * 24 * 7)));


