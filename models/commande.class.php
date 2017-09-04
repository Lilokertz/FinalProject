<?php
    class Commande
    {
        private $id;
        private $date;
        private $id_user;
        private $num_commande;
        private $valeur;

        public function getId()
        {
            return $this->id;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function getIdUser()
        {
            return $this->id_user;
        }

        public function getNumCommande()
        {
            return $this->num_commande;
        }

        public function getValeur()
        {
            return $this->valeur;
        }

        public function setNumCommande($num_commande)
        {
            $this->num_commande = $num_commande;
        }

        public function setValeur($valeur)
        {
            $this->valeur = $valeur;
        }

    }

?>
