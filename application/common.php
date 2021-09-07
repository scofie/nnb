<?php
if (!function_exists('effect')) {
	function effect($currency)
	{
		$effects = config('hello.currencys')[$currency]['effect'];
		if (is_null($effects)) {
			return [];
		}
		$all = config('hello.effects');
		if (is_array($effects)) {
			if (empty($effects)) {
				return $all;
			}
			return array_intersect_key($all, array_flip($effects));
		}
		return [];
	}
}
if (!function_exists('post')) {
	function post($url, $data, $header = [])
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (!empty($header)) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
	}
}
if (!function_exists('get')) {
	function get($url, $header = [])
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (!empty($header)) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		}
		$res = curl_exec($ch);
		curl_close($ch);
		return $res;
	}
}
if (!function_exists('encryption')) {
	function encryption($str, $secret = '')
	{
		$secret = $secret ?: config('hello.secret');
		return md5($str. sha1($str . $secret) . $secret);
	}
}
if (!function_exists('money')) {
	function money($number)
	{
		if (stripos($number, '0.0000') === 0 && $number != 0) {
			return rtrim($number, '0');
		}
		return (float) number_format($number, 8, '.', '');
	}
}
if (!function_exists('money_show')) {
	function money_show($number)
	{
		return number_format($number, 8, '.', '');
	}
}
if (!function_exists('avatar')) {
	function avatar($src, $idcard = null)
	{
		if (empty($src)) {
			if (!is_null($idcard) && strlen($idcard) == 18) {
				$year = substr($idcard, 6, 4);
				$zodiac = ['mouse', 'cattle', 'tiger', 'rabbit', 'dragon', 'snake', 'horse', 'sheep', 'monkey', 'chicken', 'dog', 'pig'];
				$idx = ($year - 4) % 12;
				return '/static/image/zodiac/' . $zodiac[$idx] . '.png';
			}
			return '/static/image/icon.png';
		} else {
			if (strlen($src) >=4 && substr($src, 0, 4) == 'http') {
				return $src;
			} else {
				return config('hello.avatar_path') . str_replace('\\', '/', $src);
			}
		}
	}
}
if (!function_exists('record_id')) {
	function record_id($business)
	{
		$zimu = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		$shuzi = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
		$token = config('hello.recode_token');
		$array = [];
		for ($i = 0;$i < count($zimu);$i++) {
		    for ($n = 0;$n < count($shuzi);$n++) {
		        $array[$token] = $zimu[$i] . '' . $shuzi[$n];
		        $token++;
		    }
		}
		return $array;
	}
}
if (!function_exists('jsonp_decode')) {
	function jsonp_decode($jsonp, $assoc)
	{
		$jsonp = trim($jsonp);
	    if(isset($jsonp[0]) && $jsonp[0] !== '[' && $jsonp[0] !== '{') {
	        $begin = strpos($jsonp, '(');
	        if(false !== $begin)
	        {
	            $end = strrpos($jsonp, ')');
	            if(false !== $end)
	            {
	                $jsonp = substr($jsonp, $begin + 1, $end - $begin - 1);
	            }
	        }
	    }
	    return json_decode($jsonp, $assoc);
	}
}
if (!function_exists('query')) {
	function query($str)
	{
		if (empty($str)) {
			return '';
		}
		$arr = [];
		parse_str($str, $arr);
		if (empty($arr) || (count($arr) == 1 && array_key_exists('s', $arr))) {
			return '';
		}
		if (array_key_exists('s', $arr)) {
			unset($arr['s']);
		}
	    return http_build_query($arr);
	}
}
if (!function_exists('curlOpen')) {
	function curlOpen($url, $config = array())
	{
	    $arr = array('post' => false,'referer' => $url,'cookie' => '', 'useragent' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; customie8)', 'timeout' => 20, 'return' => true, 'proxy' => '', 'userpwd' => '', 'nobody' => false,'header'=>array(),'gzip'=>true,'ssl'=>false,'isupfile'=>false);
	    $arr = array_merge($arr, $config);
	    $ch = curl_init();
	     
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, $arr['return']);
	    curl_setopt($ch, CURLOPT_NOBODY, $arr['nobody']); 
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_USERAGENT, $arr['useragent']);
	    curl_setopt($ch, CURLOPT_REFERER, $arr['referer']);
	    curl_setopt($ch, CURLOPT_TIMEOUT, $arr['timeout']);
	    //curl_setopt($ch, CURLOPT_HEADER, true);//获取header
	    if($arr['gzip']) curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
	    if($arr['ssl'])
	    {
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    }
	    if(!empty($arr['cookie']))
	    {
	        curl_setopt($ch, CURLOPT_COOKIEJAR, $arr['cookie']);
	        curl_setopt($ch, CURLOPT_COOKIEFILE, $arr['cookie']);
	    }
	     
	    if(!empty($arr['proxy']))
	    {
	        //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP); 
	        curl_setopt ($ch, CURLOPT_PROXY, $arr['proxy']);
	        if(!empty($arr['userpwd']))
	        {           
	            curl_setopt($ch,CURLOPT_PROXYUSERPWD,$arr['userpwd']);
	        }       
	    }   
	     
	    //ip比较特殊，用键值表示
	    if(!empty($arr['header']['ip']))
	    {
	        array_push($arr['header'],'X-FORWARDED-FOR:'.$arr['header']['ip'],'CLIENT-IP:'.$arr['header']['ip']);
	        unset($arr['header']['ip']);
	    }  
	    $arr['header'] = array_filter($arr['header']);
	     
	    if(!empty($arr['header']))
	    {
	        curl_setopt($ch, CURLOPT_HTTPHEADER, $arr['header']);
	    }
	 
	    if ($arr['post'] != false)
	    {
	        curl_setopt($ch, CURLOPT_POST, true);
	        if(is_array($arr['post']) && $arr['isupfile'] === false)
	        {
	            $post = http_build_query($arr['post']);           
	        }
	        else
	        {
	            $post = $arr['post'];
	        }
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	    }   
	    $result = curl_exec($ch);
	    //var_dump(curl_getinfo($ch));
	    curl_close($ch);
	 
	    return $result;
	}
}