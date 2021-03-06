<?php

    class UserManager
    {

        private $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM users WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$id]);
            $user = $query->fetchObject('User', [$this->pdo]);
            return $user;
        }

        public function findByPseudo($pseudo)
        {
            $sql = "SELECT * FROM users WHERE pseudo=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$pseudo]);
            $user = $query->fetchObject('User', [$this->pdo]);
            return $user;
        }

        public function create($pseudo, $password, $email)
        {
            $user = new User($this->pdo);

            $user->setPseudo($pseudo);
            $user->setPassword($password);
            $user->setEmail($email);

            $sql = "INSERT INTO users (pseudo, password, email) VALUES(?, ?, ?)";
            $query = $this->pdo->prepare($sql);
            $query->execute([$user->getPseudo(), $user->getPassword(), $user->getEmail()]);
            $id = $this->pdo->lastInsertId();
            return $this->findById($id);
        }

        /*
        public function remove(User $user)
        {
            $sql = "DELETE FROM users WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$user->getId()]);
        }


        public function update(User $user)
        {
            $sql = "UPDATE users SET pseudo=?, password=?, email=? WHERE id=?";
            $query = $this->pdo->prepare($sql);
            $query->execute([$user->getPseudo(), $user->getPassword(), $user->getEmail(), $user->getId()]);
            return $this->findById($user->getId());
        }
        */
    }


?>
