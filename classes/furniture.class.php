<?php 
        class  Furniture extends Product{
        private $height;
        private $length;

        private $width;

        public function setHeight($height){
            $this->height = $height;

        }

        public function setLength($length){

            $this->length = $length;
        }

        public function setWidth($width){
            $this->width = $width;
        }


        public function getHeight(){
            return $this->height;
        }

        public function getLength(){
            return $this->length;
        }

        public function getWidth(){
            return $this->width;
        }
    }

?>