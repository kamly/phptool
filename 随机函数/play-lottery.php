<?php
	header ( "Content-Type: text/html; charset=UTF-8" );
	$prize_arr = array( 
		'0' => array('id'=>1,'prize'=>true,'v'=>5), 
		'1' => array('id'=>2,'prize'=>false,'v'=>95), 
	);

	function getRand($proArr) { 
		$result = '';

		//概率数组的总概率精度 
		$proSum = array_sum($proArr); 
		var_dump('概率数组的总概率精度：'.$proSum);

		//概率数组循环 
		foreach ($proArr as $key => $proCur) { 
			$randNum = mt_rand(1, $proSum); //比rand()速度快
			var_dump('序号key:'.$key);   //id从1开始  1=>1
			var_dump('中奖概率'.$proCur); //中奖概率
			var_dump('随机数'.$randNum); //随机数
			var_dump('剩余量'.$proSum);  //剩余量
			var_dump(" 随机数 <= 中奖概率，结束循环，完成抽奖");
			var_dump("---------------------");
			if ($randNum <= $proCur) { 
				$result = $key; 
				break; 
			} else { 
				$proSum -= $proCur; 
			}
		}
		unset ($proArr); 

		return $result; 
	}

	// 程序开始----
	echo '中奖数组：';
	var_dump($prize_arr);
	foreach ($prize_arr as $key => $val) { 
		$arr[$val['id']] = $val['v']; 
	} 
	echo '简化中奖数组：';
	var_dump($arr);

	$rid = getRand($arr); //根据概率获取奖项id
	var_dump('id:'.$rid);
	$res = $prize_arr[$rid-1]; // 返回的是id，所以要减一
	echo '结果';
	var_dump($res);


