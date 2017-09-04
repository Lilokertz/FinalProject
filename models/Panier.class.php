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

        public function getId_commande()
        {
            return $this->id_commande;
        }

        public function getId_produit()
        {
            return $this->id_produit;
        }

        public function getId_user()
        {
            return $this->id_user;
        }
    }
?>
