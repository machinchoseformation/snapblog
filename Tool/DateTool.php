<?php
	
	namespace Tool;

	class DateTool {

		public static function mysqlDateToFr($mysqlDate){
			$frDate = date("d-m-Y H:i:s", strtotime($mysqlDate));
			return $frDate;
		}

	}