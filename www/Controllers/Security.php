<?php

namespace App\Controller;

use App\Core\Security as Secu;
use App\Core\View;
use App\Core\Helpers as h;

session_start();
$h = new Helpers();

class Security {

	public function defaultAction(){
		echo "Controller security action default";
	}


	public function loginAction(){
		if (isset($_POST["Submit"]) ) {
			$Email = strtolower(isset($_POST["Email"]) ? $_POST["Email"] : '');
			$Password = isset($_POST["password"]) ? $_POST["password"] : '';
			$hashed_password = $h->hashPwd($Password);
			
			function emailExist($email) {
				// Verify if the user exists
				if ($email === "test@gmail.com"){
					return true;
				}
				return false;
			}

			function checkPassword($password){
				// Verify if password is same as one in database
				if ($password === $password){
					return true;
				}
				return false;
			}

			if (isset($Email) && isset($Password)){
				if (emailExist($Email)){
					if (checkPassword($hashed_password)){
						$_SESSION["Email"] = $Email;
						// If connexion is successful, redirect to home page
						header("Location:home.view.php");
						exit;
					}else{
						echo "Wrong password";
					}
				}else{
					echo "Wrong email";
				}
			}else{
				echo "All fields needs to be filled";
			}

		}
	}

	public function registerAction(){
		echo "Controller security action login";
	}

	public function logoutAction(){

		$security = new Secu();
		if($security->isConnected()){
			session_destroy(); /* Destroy started session */
			header("location:login.view.php");
			exit;
		}else{
			header("location:login.view.php");
		}
	}
}