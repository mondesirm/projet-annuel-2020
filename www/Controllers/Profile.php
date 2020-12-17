<?php

namespace App\Controller;

use App\Core\View;

class Profile {
	public function defaultAction() {
		$a = explode('\\', __METHOD__);
		echo end($a).' called';
	}
}