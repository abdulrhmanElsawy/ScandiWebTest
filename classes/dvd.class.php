<?php 
    class Dvd extends Product{
        private $size;

        public function setSize($size){
            $this->size = $size;
        }

        public function getSize(){
            return $this->size;
        }
    }

?>