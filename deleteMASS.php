<?php 


include "init/init.php";

ob_start();



if (
    empty($_POST['delete'])
) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit('Missing/Invalid data submitted');  
    
}

if(isset($_POST['delete']))
{
    $newfunction = new Functions();
    $newfunction->deleteMass(...$_POST['delete']);
    
}



header('Location: ' . $_SERVER['HTTP_REFERER']);
