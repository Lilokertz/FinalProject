<?php

    class Admin
    {
        private $id;
        private $title;
        private $content;
        private $media;
        private $price;
        
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }



        public function getId()
        {
            return $this->id;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function getArticle()
        {
            $manager = new ProduitManager($this->pdo);
            $this->article = $manager->findById($this->id_article);
            return $this->article;
        }

        public function getAuthor()
        {
            $manager = new UserManager($this->pdo);
            $this->author = $manager->findById($this->id_author);
            return $this->author;
        }

        public function setContent($content)
        {
            if (strlen($content) >= 20 && strlen($content) <= 4095)
            {
                $this->content = $content;
            }
            else {
                throw new Exception("Le contenue de votre commentaire est trop long il doit etre compris entre 20 et 4095 caracteres");
            }
        }

        public function setArticle(Produit $article)
        {
            $this->id_article = $article->getId();
            $this->article = $article;
        }

        public function setAuthor(User $author)
        {
            $this->id_author = $author->getId();
            $this->author = $author;
        }
    }

?>
