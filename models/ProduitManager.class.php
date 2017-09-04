<?php

    class ProduitsManager
    {
        private $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM produits WHERE id=?";
            $query = $this->pdo->prepare($pdo);
            $query->execute($id);
            $produits = $query->fetchObject('produits');
            return $produits;
        }

        public function create($content, $media, $note, $price, $title)
        {
            $produits = new Produits();

            $produits->setContent($content);
            $produits->setMedia($media);
            $produits->setNote($note);
            $produits->setPrice($price);
            $produits->setTitle($title);

            $sql = "INSERT INTO produits (content, media, note, price, title) VALUES (?, ?, ?, ?, ?)";
            $query = $this->pdo->prepare($sql);
            $query->execute([$produits->getContent(),
                            $produits->getMedia(),
                            $produits->getNote(),
                            $produits->getPrice(),
                            $produits->getTitle()]);
            $id = $this->pdo->lastInsertId();
            return $this->findById($id);
        }
    }


?>
