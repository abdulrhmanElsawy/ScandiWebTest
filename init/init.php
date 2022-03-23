<?php


// Error Reporting

ini_set('display_errors', 'On');

error_reporting(E_ALL);


include 'classes/classescall.php';


// Routes

$tpl = "includes/templates/";  //Template Directory

$css =  "layout/css/";  // css directory

$func = "includes/functions/";  // functions directory

$js =  "layout/js/";  // js directory

$lang = 'includes/languages/';


// include the important files 
include $tpl . 'header.php';




