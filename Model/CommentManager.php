<?php

	namespace Model;

	//classe responsable de réaliser les requêtes à la bdd pour les objets posts

	class CommentManager {

		//enregistre un nouveau Comment
		public function save(Comment $comment){

			$dbh = Db::getDbh();

			$sql = "INSERT INTO comment (postId, content, username, email, published, dateModified, dateCreated)
					VALUES (:postId, :content, :username, :email, :published, NOW(), NOW())";

			$stmt = $dbh->prepare($sql);
			
			$stmt->bindValue(":postId", $comment->getPostId());
			$stmt->bindValue(":content", $comment->getContent());
			$stmt->bindValue(":username", $comment->getUsername());
			$stmt->bindValue(":email", $comment->getEmail());
			$stmt->bindValue(":published", true);

			return $stmt->execute();

		}

		public function findCommentsByPostId($postId){
			$dbh = Db::getDbh();

			$sql = "SELECT * 
					FROM comment 
					WHERE published = 1 
					AND postId = :postId
					ORDER BY dateCreated DESC
					LIMIT 100";

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":postId", $postId);
			$stmt->execute();
			$comments = $stmt->fetchAll(\PDO::FETCH_CLASS, "\Model\Comment");

			return $comments;
		}

	}