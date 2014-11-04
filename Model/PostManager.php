<?php

	namespace Model;

	//classe responsable de réaliser les requêtes à la bdd pour les objets posts

	class PostManager {

		//enregistre un nouveau Post
		public function save(Post $post){

			$dbh = Db::getDbh();

			$sql = "INSERT INTO post (title, content, username, email, published, dateModified, dateCreated)
					VALUES (:title, :content, :username, :email, :published, NOW(), NOW())";

			$stmt = $dbh->prepare($sql);
			
			$stmt->bindValue(":title", 	$post->getTitle());
			$stmt->bindValue(":content", $post->getContent());
			$stmt->bindValue(":username", $post->getUsername());
			$stmt->bindValue(":email", $post->getEmail());
			$stmt->bindValue(":published", true);

			return $stmt->execute();

		}

		public function findAll(){

		}

		//récupère un Post en fonction d'un id
		public function findById($id){
			$dbh = Db::getDbh();

			$sql = "SELECT * FROM post
					WHERE id = :id";
			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->execute();

			//fetchObject retourne directement un objet du type spécifié
			$post = $stmt->fetchObject("\Model\Post");
			return $post;
		}

		//Récupère les x derniers Posts
		public function findLatest(){

			$dbh = Db::getDbh();

			$sql = "SELECT * 
					FROM post 
					WHERE published = 1 
					AND dateCreated > NOW() - INTERVAL 4 HOUR
					ORDER BY dateCreated DESC
					LIMIT 10";

			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$posts = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Model\Post");

			return $posts;
		}

		public function update(){

		}

		public function delete(){

		}

	}