<?php

    class ProduitManager
    {
        private $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM produits WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$id]);
            $produit = $query->fetchObject('Produit', [$this->pdo]);
            return $produit;
        }

        public function findAll()
        {
            $sql = "SELECT * FROM produits";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $produits = $query->fetchAll(PDO::FETCH_CLASS, 'Produit', [$this->pdo]);
            return $produits;
        }

        public function findByRandom()
        {
            $sql = "SELECT * FROM produits ORDER BY RAND() LIMIT 5";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $produits = $query->fetchAll(PDO::FETCH_CLASS, 'Produit', [$this->pdo]);
            return $produits;
        }

        public function findByBest()
        {
            $sql = "SELECT * FROM produits ORDER BY note DESC, RAND() LIMIT 5";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $bestProduit = $query->fetchAll(PDO::FETCH_CLASS, 'Produit', [$this->pdo]);
            return $bestProduit;
        }

        public function findByCommande(Commande $commande)
        {
            $sql = "SELECT produits.* FROM produits INNER JOIN paniers ON paniers.id_produit=produits.id WHERE paniers.id_commande=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$commande->getId()]);
            $produits = $query->fetchAll(PDO::FETCH_CLASS, 'Produit', [$this->pdo]);
            return $produits;
        }

        public function create($content, $media, $note, $price, $title)
        {
            $produits = new Produits($this->pdo);

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
