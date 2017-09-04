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
            $query->execute([$id]);
            $comments = $query->fetchObject('Comment');
            return $comments;
        }

        public function create($content, $idArticle, $idAuthor)
        {
            $comments = new Comments();

            $comments->setContent($content);
            $comments->setIdArticle($article);
            $comments->setIdAuthor($author);

            $sql = "INSERT INTO comments (content, id_article, id_author) VALUES (?, ?, ?)";
    		$query = $this->pdo->prepare($sql);
    		$query->execute([$comments->getContent(),
    						$comments->getIdArticle(),
    						$comments->getIdAuthor()]);
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
