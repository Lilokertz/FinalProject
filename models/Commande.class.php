<?php
    class Commande
    {
        private $id;
        private $date;
        private $id_user;
        private $num_commande;
        private $valeur;

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

        public function getIdUser()
        {
            $manager = new UserManager($this->pdo);
            $this->user = $manager->findById($this->id_user);
            return $this->user;
        }

        public function getNumCommande()
        {
            $manager = new CommandeManager($this->pdo);
            $this->commande = $manager->findById($this->num_commande);
            return $this->commande;
        }

        public function getValeur()
        {
            return $this->valeur;
        }

        public function setValeur($valeur)
        {
            $this->valeur = $valeur;
        }

    }

?>
