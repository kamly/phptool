<?php
    header ( "Content-Type: text/html; charset=UTF-8" );
	/**
     * 生成随机码
     * @param  int $length
     * @return string
     */
    function rand_code($length,$type = null) {
    	if($type == 'num'){
    		$rand_factor = array("123456789");
    	}else{
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

    var_dump(rand_code(8));
    var_dump(rand_code(8,'num'));
