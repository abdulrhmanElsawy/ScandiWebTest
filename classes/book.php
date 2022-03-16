<?php

include "product.php";

    class Book extends Product{
        private $weight;

        public function setWeight($weight){
            $this->weight = $weight;
        }

        public function getWeight(){
            return $this->weight;
        }
    }