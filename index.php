<?php
    
    ob_start();
    include 'init/init.php';




?>
<div class="container">
<form action="deleteMASS.php" method="POST">
<!-- Start navbar section -->
<nav class="land-nav">
    <h1>Product List</h1>
    <div class="btns">
        <button  type="button" onclick="location.href='addproduct.php'" class="ADD">ADD</button>
        <button  type='submit' id="delete-product-btn">MASS DELETE</button>
    </div>
</nav>

<!-- End Navbar Section -->

<section class="products">
    <div class="row">
        <?php 
            $newItems = new Functions();
            $allItems = $newItems->getAllItems();
                if ($allItems) {
                    foreach ($allItems  as $Item) {
                        echo '
                    
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div data-aos="fade-right" class="product-box">
                        <input name="delete[]" value="'.  $Item['id']  .'" type="checkbox" class="delete-checkbox">
                            <h2>'. $Item['sku'] .'</h2>
                            <h2>'. $Item['name'] .'</h2>
                            <h2>'. $Item['price'] .'$</h2>
                            ';
    
                        if ($Item['size']) {
                            echo " <h2>Size: ". $Item['size'] ."MB</h2>";
                        } elseif ($Item['weight']) {
                            echo " <h2>Weight: ". $Item['weight'] ."KG</h2>";
                        } elseif ($Item['height']) {
                            echo " <h2>Dimension: ". $Item['width'] . "x" . $Item['length'] . "x" . $Item['height']."</h2>";
                        }
    
                        echo '</div>
                            </div>
                            ';
                    }
                }else{
                    echo "<h1 style='text-align:center;'>No Items To Show Try To Add One</h1>";
                }
            
        ?>
</form>
    </div>
</section>







<?php

    include  $tpl ."footer.php";
    ob_end_flush();

?>