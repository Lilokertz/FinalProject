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

        public function getId_article()
        {
            return $this->id_article;
        }

        public function getId_author()
        {
            return $this->id_author;
        }

        public function setContent($content)
        {
            $this->content = $content;
        }
    }

?>
