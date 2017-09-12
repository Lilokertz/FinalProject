<?php
    class Commande
    {
        private $id;
        private $date;
        private $id_user;
        private $num_commande;
        private $price;
        private $status;

        private $user;
        private $commande;

        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function getNumCommande()
        {
            return $this->num_commande;
        }

        public function getUser()
        {
            $manager = new UserManager($this->pdo);
            $this->user = $manager->findById($this->id_user);
            return $this->user;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getStatus()
        {
            return $this->status;
        }

        public function setNumCommande($num_commande)
        {
            $this->num_commande = $num_commande;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function setUser($user)
        {
            $this->user = $user;
            $this->id_user = $user->getId();
        }

        public function setStatus($status)
        {
            $this->status = $status;
        }

        public function addProduit(Produit $produit)
        {
            $manager = new CommandeManager($this->pdo);
            $manager->addProduit($this, $produit);
        }

        public function getArticles()
        {
            $manager = new ProduitManager($this->pdo);
            return $manager->findByCommande($this);
        }

    }

?>
