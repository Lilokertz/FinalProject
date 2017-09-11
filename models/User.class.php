<?php
    class User
    {
        private $id;
        private $pseudo;
        private $password;
        private $email;

        private $commande;

        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getCommande()
        {
            $manager = new CommandeManager($this->pdo);
            $this->commande = $manager->findByUser($this);
            return $this->commande;
        }

        public function getId()
        {
            return $this->id;
        }

        public function getPseudo()
        {
            return $this->pseudo;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setPseudo($pseudo)
        {
            if(strlen($pseudo) >= 4 && strlen($pseudo) <= 63)
            {
                $this->pseudo = $pseudo;
            }
            else
            {
                throw new Exception("Login invalide(La taille doit etre comprise entre 4 et 64 caracteres)");
            }
        }

        public function setPassword($password)
        {
            if(strlen($password) >= 6 && strlen($password) <= 127)
            {
                $this->password = $password;
            }
            else
            {
                throw new Exception("Password invalide (La taille doit etre comprise entre 6 et 127 caracteres)");
            }
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
    }

?>
