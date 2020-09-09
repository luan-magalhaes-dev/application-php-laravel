<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;

if (!function_exists('menuActive')) {
	
	function menuActive($list)
	{
		$class = '';
		
		if (in_array(str_replace('-', '_', request()->segment(2)), $list, true)) {
			$class = 'active open';
		}
		return $class;
	}
}

if (!function_exists('cashFormat')) {
	
	function cashFormat($value, $decimals = 2, $p = ',', $p2 = '.')
	{
		return number_format($value, $decimals, $p, $p2);
	}
}

if (!function_exists('formatMask')) {
	
	function formatMask($val, $mask)
	{
		$maskared = '';
		$k = 0;
		for ($i = 0; $i <= strlen($mask) - 1; $i++) {
			if ($mask[$i] === '#') {
				if (isset($val[$k])) {
					$maskared .= $val[$k++];
				}
			} else if (isset($mask[$i])) {
				$maskared .= $mask[$i];
			}
		}
		return $maskared;
	}
}