<?php
    class Comment
    {
        private $id;
        private $content;
        private $date;
        private $id_article;
        private $id_author;

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

        public function getIdArticle()
        {
            return $this->id_article;
        }

        public function getIdAuthor()
        {
            return $this->id_author;
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

        public function setIdArticle($id_article)
        {
            $this->id_article = $id_article;
        }

        public function setIdAuthor($id_author)
        {
            $this->id_author = $id_author;
        }
    }

?>
