<?php 


include "init/init.php";

ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['size']) && $_POST['size'] !== "" || isset($_POST['weight']) && $_POST['weight'] !== "" || isset($_POST['height']) && $_POST['height'] !== "" && isset($_POST['length']) && $_POST['length'] !== "" && isset($_POST['width']) && $_POST['width'] !== "" ){
        if(isset($_POST['sku']) && $_POST['sku'] !== "" && isset($_POST['name']) && $_POST['name'] !=="" && isset($_POST['price']) && $_POST['price'] !==""){

            $sku = filter_var($_POST['sku'], FILTER_SANITIZE_STRING);

            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $price = filter_var($_POST['price'], FILTER_VALIDATE_INT);

            if(is_numeric($price) && isset($_POST['weight']) && is_numeric($_POST['weight']) || isset($_POST['size']) && is_numeric($_POST['size']) || isset($_POST['height']) && is_numeric($_POST['height']) && isset($_POST['length']) && is_numeric($_POST['length']) && isset($_POST['width']) && is_numeric($_POST['width'])){
                $newItem = new Functions();
                if ($newItem->checkSku($sku) !== 1) {
                    $newItem -> insertItem($sku, $name, $price, (isset($_POST['size']))? $_POST['size']:null, (isset($_POST['weight']))? $_POST['weight']:null, (isset($_POST['height']))? $_POST['height']:null, (isset($_POST['length']))? $_POST['length']:null, (isset($_POST['width']))? $_POST['width']:null);
                    header('Location: index.php');
                }else{
                    echo "<div class='error-msg '><h2 class='alert alert-danger'>sorry this sku is exist try another one</h2></div>";
                }
            }else{
                echo "<div class='error-msg '><h2 class='alert alert-danger'>Data must be in the correct way</h2></div>";

            }


        }else{
            echo "<div class='error-msg '><h2 class='alert alert-danger'>Sorry all fields are required</h2></div>";
        }
    }else{
        echo"<div class='error-msg '><h2 class='alert alert-danger'>Sorry all fields are required</h2></div>";
    }
}




?>


<!-- Start navbar Section -->
<div class="container">

    <form id="product_form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" > 
<nav class="land-nav">
    <h1>Product Add</h1>
    <div class="btns">
        <button  type="submit" class="ADD">SAVE</button>
        <button  type="button"  onclick="location.href='index.php'">CANCEL</button>
    </div>
</nav>

<!-- End navbar Section -->

<div class="main-form">
    <label>Product Sku</label>
    <input required type="text" placeholder="SKU" id="sku" name="sku">
    <label>product name</label>
    <input required type="text" placeholder="product name" id="name" name="name">
    <label>Product Price</label>
    <input required type="number" placeholde="price" id="price" name="price">
    <label>Product Type</label>
    <select required name="type" id="productType">
        <option value="">...</option>
        <option value="book">Book</option>
        <option value="furniture">Furniture</option>
        <option value="dvd">DVD</option>
    </select>
</div>

<div id="sec-form">

</div>




</form>



<?php 

include  $tpl ."footer.php";
    ob_end_flush();
    ?>
