<?php
    class Panier
    {
        private $id;
        private $id_commande;
        private $id_produit;
        private $id_user;

        private $pdo;
        private $article;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getIdCommande()
        {
            return $this->id_commande;
        }

        public function getIdProduit()
        {
            return $this->id_produit;
        }

        public function getIdUser()
        {
            return $this->id_user;
        }

        public function setIdCommande($id_commande)
        {
            $this->id_commande = $id_commande;
        }

        public function setIdProduit($id_produit)
        {
            $this->id_produit = $id_produit;
        }

        public function setIdUser($id_user)
        {
            $this->id_user = $id_user;
        }
    }
?>
