<?php
    class Panier
    {
        private $id;
        private $id_commande;
        private $id_produit;
        private $id_user;

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
    }
?>
