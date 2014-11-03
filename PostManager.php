<?php

	class PostManager {

		public function save(Post $post){

			$db = new Db();
			$dbh = $db->getDbh();

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

		public function update(){

		}

	}