<?php

namespace App\Controller;

use App\Core\View;

class Cart {
	public function defaultAction() {
		$a = explode('\\', __METHOD__);
		echo end($a).' called';
	}
}