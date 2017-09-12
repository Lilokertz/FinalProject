<?php

    class CommentManager
    {

        private $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findByArticle(Produit $produit)
        {
            $sql = "SELECT * FROM comments WHERE id_article=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$produit->getId()]);
            $comment = $query->fetchAll(PDO::FETCH_CLASS,'Comment', [$this->pdo]);
            return $comment;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM comments WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$_GET['id']]);
            $comment = $query->fetchObject('Comment', [$this->pdo]);
            return $comment;
        }

        public function create($content, Produit $article, User $author)
        {
            $comment = new Comment($this->pdo);

            $comment->setContent($content);
            $comment->setArticle($article);
            $comment->setAuthor($author);

            $sql = "INSERT INTO comments (content, id_article, id_author) VALUES (?, ?, ?)";
    		$query = $this->pdo->prepare($sql);
    		$query->execute([$comment->getContent(),$comment->getArticle()->getId(),$comment->getAuthor()->getId()]);
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
