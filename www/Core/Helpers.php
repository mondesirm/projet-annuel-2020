<?php

namespace App\Core;

class Helpers {
	public static function clearLastname($lastname) {
		return mb_strtoupper(trim($lastname));
	}

	public static function clearEmail($email) {
		return strtolower(trim($email));
	}

	public static function clearPwd($email) {
		return strtolower(trim($email));
	}

	public static function hashPwd($password) {
		return crypt($password, '$5$rounds=69$SaltyHashSalt$');
	}
}