<?php 

include "classes/funiture.php";
include "init/init.php";

ob_start();





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the variables from the form
    

    // Check the product if it was DVD
    if ($_POST['type'] == "dvd") {
        $newdvd = new Dvd();
        $newdvd->setSku($_POST['sku']);
        $newdvd->setName($_POST['name']);
        $newdvd->setPrice($_POST['price']);
        $newdvd->setSize($_POST['size']);
        $newdvd->setType($_POST['type']);

        // validate the FORM

        // check if Category exist in database or not




        //Insert Category Info in data base

        $stmt = $con->prepare("INSERT INTO products(sku, name, price ,size, type )
                    VALUES (:zsku, :zname, :zprice, :zsize, :ztype)");
        $stmt->execute(array(
                'zsku'     =>$newdvd->getSku(),
                'zname'     =>$newdvd->getName(),
                'zprice'   =>$newdvd->getPrice(),
                'zsize'    =>$newdvd->getSize(),
                'ztype'    =>$newdvd->getType()
            ));

        //echo succes message

        $theMsg = "<div class='alert alert-success'>"  . $stmt->rowCount(). "Record Iserted </div>";
    }


    // Check the product if it was book

    elseif ($_POST['type'] == "book") {
        $newbook = new Book();
        $newbook->setSku($_POST['sku']);
        $newbook->setName($_POST['name']);
        $newbook->setPrice($_POST['price']);
        $newbook->setWeight($_POST['weight']);
        $newbook->setType($_POST['type']);
    
        // validate the FORM
    
        // check if Category exist in database or not
    
    
    
    
        //Insert Category Info in data base
    
        $stmt = $con->prepare("INSERT INTO products(sku, name, price ,weight, type )
                        VALUES (:zsku, :zname, :zprice, :zweight, :ztype)");
        $stmt->execute(array(
                    'zsku'     =>$newbook->getSku(),
                    'zname'     =>$newbook->getName(),
                    'zprice'   =>$newbook->getPrice(),
                    'zweight'    =>$newbook->getWeight(),
                    'ztype'    =>$newbook->getType()
                ));
    
        //echo succes message
    
        $theMsg = "<div class='alert alert-success'>"  . $stmt->rowCount(). "Record Iserted </div>";
    }


    // Check the product if it was furniture

    elseif ($_POST['type'] == "furniture") {
        $newfur = new Furniture();
        $newfur->setSku($_POST['sku']);
        $newfur->setName($_POST['name']);
        $newfur->setPrice($_POST['price']);
        $newfur->setHeight($_POST['height']);
        $newfur->setWidth($_POST['width']);
        $newfur->setLength($_POST['length']);
        $newfur->setType($_POST['type']);

        
        // validate the FORM
        
        // check if Category exist in database or not
        
        
        
        
        //Insert Category Info in data base
        
        $stmt = $con->prepare("INSERT INTO products(sku, name, price ,height,width, length, type )
                            VALUES (:zsku, :zname, :zprice, :zheight, :zwidth, :zlength, :ztype)");
        $stmt->execute(array(
                        'zsku'     =>$newfur->getSku(),
                        'zname'     =>$newfur->getName(),
                        'zprice'   =>$newfur->getPrice(),
                        'zheight'    =>$newfur->getHeight(),
                        'zwidth'    =>$newfur->getWidth(),
                        'zlength'    =>$newfur->getLength(),
                        'ztype'    =>$newfur->getType()


                    ));
        
        //echo succes message
        
        $theMsg = "<div class='alert alert-success'>"  . $stmt->rowCount(). "Record Iserted </div>";
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