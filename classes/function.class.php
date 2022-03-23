<?php 

        include "classes/product.class.php";
        include "classes/furniture.class.php";
        include "classes/dvd.class.php";
        include "classes/book.class.php";



        
    class Functions extends ConnectDb
    {


        // checking if the item is exist or not
        public function checkSku($sku)
        {
            $checker = 0;
            $sql ="SELECT * FROM products WHERE sku = '$sku'";
            $result = $this->connect()->query($sql);
            if ($result) {
                $numRows = $result->num_rows;
                if ($numRows >0) {
                    $checker = 1;
                }
            }
            return $checker;
            
        }

        //get all items from the database and put them in an array

        public function getAllItems()
        {
            $sql = "SELECT * FROM products";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            if ($numRows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }


        // function to insert items in db
        public function insertItem($sku, $name, $price, $size = null, $weight=null, $height=null, $length=null, $width=null){
            if ($size !== null) {
                if ($sku === null || $sku ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry sku cann't be empty</h2></div>";
                } elseif ($name === null || $name ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry name cann't be empty</h2></div>";
                } elseif ($price === null || $price ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry price cann't be empty</h2></div>";
                } elseif ($size === "") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry size cann't be empty</h2></div>";
                } 
                    $newdvd = new Dvd();
                    $newdvd->setSku($sku);
                    $newdvd->setName($name);
                    $newdvd->setPrice($price);
                    $newdvd->setSize($size);
                    $sql = "INSERT INTO products (sku, name, price, size) VALUES ('{$newdvd->getSku()}','{$newdvd->getName()}',{$newdvd->getPrice()},{$newdvd->getSize()})";
                    if ($this->connect()->query($sql) === TRUE) {
                        
                    } else {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>please try again an unexpected error happened</h2></div>";
                    }
                
            }else if($weight !== null){
                if ($sku === null || $sku ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry sku cann't be empty</h2></div>";
                } elseif ($name === null || $name ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry name cann't be empty</h2></div>";
                } elseif ($price === null || $price ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry price cann't be empty</h2></div>";
                } elseif ($weight === "") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry weight cann't be empty</h2></div>";
                } 
                    
                    $newBook = new Book();
                    $newBook->setSku($sku);
                    $newBook->setName($name);
                    $newBook->setPrice($price);
                    $newBook->setWeight($weight);
                    $sql = "INSERT INTO products (sku, name, price, weight) VALUES ('{$newBook->getSku()}','{$newBook->getName()}',{$newBook->getPrice()},{$newBook->getWeight()})";
                    if ($this->connect()->query($sql) === TRUE) {
                        
                    } else {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>please try again an unexpected error happened</h2></div>";
                    }
                
            }else if($height !== null && $length !== null && $width !== null){
                if ($sku === null || $sku ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry sku cann't be empty</h2></div>";
                } elseif ($name === null || $name ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry name cann't be empty</h2></div>";
                } elseif ($price === null || $price ==="") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry price cann't be empty</h2></div>";
                } elseif ($height === "") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry height cann't be empty</h2></div>";
                } elseif ($length === "") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry length cann't be empty</h2></div>";
                }elseif ($width === "") {
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry width cann't be empty</h2></div>";
                }
                    $newFurn = new Furniture();
                    $newFurn->setSku($sku);
                    $newFurn->setName($name);
                    $newFurn->setPrice($price);
                    $newFurn->setHeight($height);
                    $newFurn->setLength($length);
                    $newFurn->setWidth($width);
                    $sql = "INSERT INTO products (sku, name, price, height,length,width) VALUES ('{$newFurn->getSku()}','{$newFurn->getName()}',{$newFurn->getPrice()},{$newFurn->getHeight()},{$newFurn->getLength()},{$newFurn->getWidth()})";
                    
                    if ($this->connect()->query($sql) === TRUE) {
                        
                        } else {
                        echo "<div class='error-msg '><h2 class='alert alert-danger'>please try again an unexpected error happened</h2></div>";
                        }
                
            }
        }

        //delete records

        public Function deleteMass(...$itemsId){
            foreach($itemsId as $itemId){
                $sql = "SELECT * FROM products WHERE id = $itemId";
                $result = $this->connect()->query($sql);
                $numRows = $result->num_rows;
                if ($numRows > 0) {
                    $sql2 = "DELETE FROM products WHERE id = $itemId";
                    $this->connect()->query($sql2);
                }else{
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry there is no item with this id</h2></div> ";
                }
            }
        }
    }

?>