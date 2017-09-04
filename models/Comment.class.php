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
            $this->content = $content;
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