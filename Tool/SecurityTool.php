<?php

	namespace Tool;

	class SecurityTool {

		//convertit en entités HTML une chaîne
		public static function safeOnGet($string){
			return htmlspecialchars($string, ENT_NOQUOTES);
		}

		//convertit en entités HTML une chaîne
		public static function safeOnSet($string){
			return strip_tags($string);
		}

	}