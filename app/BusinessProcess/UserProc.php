<?php
namespace App\BusinessProcess;

use App\Eloquents\M_users;
use App\Libraries\CommonLib;
use App\Libraries\SessionLib;
use Firebase\JWT\JWT;

/**
 * This class is created just in case if you are using cross platform technology,
 * This class is Useful when you have business process,
 * So you have 1 business logic that can be used to all platform which consume this logic,
 * Note : Saparate logic in every controller will make developers confuse to maintain the business proces to your database
 */
class UserProc {

	/**
	 * Login
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return boolean
	 */
	public static function loginWeb($username, $password, &$useraccount = null)
	{
		$user = M_users::login($username, $password);
		if (! empty($user))
		{
			$useraccount = $user;
			$user->Token = CommonLib::encryptMd5(CommonLib::getKey() . $password);
			SessionLib::set('userdata', self::createToken($user));
			SessionLib::set('username', $user->Username);
			return true;
		}

		return false;
	}

	public static function createToken($data)
	{
		$token = JWT::encode($data, CommonLib::getKey());
		return $token;
	}

	public static function decodeToken($token)
	{
		// echo $token;
		$user = JWT::decode($token, CommonLib::getKey(), ['HS256']);
		return $user;
	}
}
