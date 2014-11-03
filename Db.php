<?php

class Db {

	protected static $dbh; //contient la connexion à la db

	public static function getDbh(){

		if (!empty(self::$dbh)){
			return self::$dbh;
		}

		try {
	        //connexion à la base avec la classe PDO et le dsn
			self::$dbh = new PDO('mysql:host='.Config::DBHOST.';dbname='.Config::DBNAME, Config::DBUSER, Config::DBPASS, array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			));

			return self::$dbh;

		} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
		    echo 'Erreur de connexion : ' . $e->getMessage();
		}

	}

}