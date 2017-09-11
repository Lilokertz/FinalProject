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

        public function getIdUser()
        {
            $manager = new UserManager($this->pdo);
            $this->user = $manager->findById($this->id_user);
            return $this->user;
        }

        public function getCommande()
        {
            $manager = new CommandeManager($this->pdo);
            $this->commande = $manager->findById($this->num_commande);
            return $this->commande;
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

        public function setStatus($status)
        {
            $this->status = $status;
        }

    }

?>
