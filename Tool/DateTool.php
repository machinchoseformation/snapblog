<?php
	
	namespace Tool;

	use \DateTime;
	use \DateInterval;

	class DateTool {

		public static function mysqlDateToFr($mysqlDate){
			$frDate = date("d-m-Y H:i:s", strtotime($mysqlDate));
			return $frDate;
		}

		public static function timeRemaining($dateCreated){

			$now = new DateTime();
			$postDate = new DateTime($dateCreated);
			$postDate->add(new DateInterval('PT4H'));
			$interval = $now->diff($postDate);
			$timeRemaining = $interval->format("%hh%i ");

			return $timeRemaining;
			
		}

	}