<?php

class AdminManager
    {

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM produits WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$_GET['id']]);
            $comment = $query->fetchObject('Produit', [$this->pdo]);
            return $comment;
        }

        public function create(...)
        {
            $admin = new Admin($this->pdo);

            $admin->setTitle($title);
            $admin->setContent($content);
            $admin->setMedia($media);
            $admin->setPrice($price);

            $sql = "INSERT INTO produits (title, content, media, price) VALUES (?, ?, ?, ?)";
          	$query = $this->pdo->prepare($sql);
          	$query->execute([$admin->getTitle(),
                             $admin->getContent(),
                             $admin->getMedia(),
                             $admin->getPrice()]);
          	$id = $this->pdo->lastInsertId();
          	return $this->findById($id);
        }
    }

?>