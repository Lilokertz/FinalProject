<?php
    class Produit
    {
        private $id;
        private $content;
        private $media;
        private $note;
        private $price;
        private $title;

        public function getId()
        {
            return $this->id;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function getMedia()
        {
            return $this->media;
        }

        public function getNote()
        {
            return $this->note;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setMedia($media)
        {
            $this->media = $media;
        }

        public function setNote($note)
        {
            $this->note = $note;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }
    }

?>
