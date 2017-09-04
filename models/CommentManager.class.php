<?php

    class CommentManager
    {

        private $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM comments WHERE id=?";
            $query = $this->pdo->prepare($pdo);
            $query->execute($id);
            $comments = $query->fetchObject('comments');
            return $comments;
        }

        public function create($content, $id_article, $id_author)
        {
            $comments = new Comments();

            $comments->setContent($content);
            $comments->setId_article($article);
            $comments->setId_author($author);

            $sql = "INSERT INTO comments (content, id_article, id_author) VALUES (?, ?, ?)";
    		$query = $this->pdo->prepare($sql);
    		$query->execute([$comments->getContent(),
    						$comments->getId_article(),
    						$comments->getId_author()]);
    		$id = $this->pdo->lastInsertId();
    		return $this->findById($id);
        }

        public function remove(Comments $comments)
        {
            $sql = "DELETE FROM comments WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$comments->getId()]);
        }
    }


?>