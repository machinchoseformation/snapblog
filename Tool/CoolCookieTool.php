<?php

	namespace Tool;

	class CoolCookieTool {

		public static function createCookie($name, array $data, $exp = "+ 180 days"){
			$json = json_encode($data);
			setcookie($name, $json, strtotime($exp), "/");
		}

		public static function getCookie($name){
			if (self::cookieExists($name)){
				return json_decode($_COOKIE[$name], true); //true pour avoir un array
			}
			return false;
		}

		public static function cookieExists($name){
			if (!empty($_COOKIE[$name])){
				return true;
			}
			return false;
		}

	}