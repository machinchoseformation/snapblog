<?php

	class PostManager {

		public function save(Post $post){

			$dbh = Db::getDbh();

			$sql = "INSERT INTO post (title, content, username, email, published, dateModified, dateCreated)
					VALUES (:title, :content, :username, :email, :published, NOW(), NOW())";

			$stmt = $dbh->prepare($sql);
			
			$stmt->bindValue(":title", 	$post->getTitle());
			$stmt->bindValue(":content", $post->getContent());
			$stmt->bindValue(":username", $post->getUsername());
			$stmt->bindValue(":email", $post->getEmail());
			$stmt->bindValue(":published", $post->getPublished());

			return $stmt->execute();

		}

		public function delete(){

		}

		public function findAll(){

		}

		public function findLatest(){

			$dbh = Db::getDbh();

			$sql = "SELECT * 
					FROM post 
					WHERE published = 1 
					ORDER BY dateCreated DESC
					LIMIT 10";

			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$posts = $stmt->fetchAll(PDO::FETCH_CLASS, "Post");

			return $posts;
		}

		public function update(){

		}

	}