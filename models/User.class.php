<?php
    class User
    {
        private $id;
        private $pseudo;
        private $password;
        private $email;

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
            $this->pseudo = $pseudo;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }
    }

?>
