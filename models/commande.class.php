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

        public function getId_user()
        {
            return $this->id_user;
        }

        public function getNum_commande()
        {
            return $this->num_commande;
        }

        public function getValeur()
        {
            return $this->valeur;
        }

        public function setNum_commande($num_commande)
        {
            $this->num_commande = $num_commande;
        }

        public function setValeur($valeur)
        {
            $this->valeur = $valeur;
        }

    }

?>
