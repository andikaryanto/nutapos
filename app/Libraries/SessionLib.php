<?php

namespace App\Libraries;

class SessionLib {

	public static function set($key, $value)
	{
		$newkey = CommonLib::encryptMd5(CommonLib::getKey() . $key);
		session()->set([$newkey => $value]);
	}

	public static function get($key)
	{
		$newkey = CommonLib::encryptMd5(CommonLib::getKey() . $key);
		return session($newkey);
	}

	public static function remove($key)
	{
		$newkey = CommonLib::encryptMd5(CommonLib::getKey() . $key);
		session()->remove($newkey);
	}
}
