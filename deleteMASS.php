<?php 


include "init/init.php";

ob_start();



if (
    empty($_POST['ids'])
    // || array_filter($_POST['ids'], function($v) { return !ctype_digit($v); })
) {
    exit(header('Location: ' . $_SERVER['HTTP_REFERER']));  // be deliberately vague
    
}

$connect = new mysqli("localhost", "id18627216_scandiwebtestproject_db", "Elsawyx265***", "id18627216_scandiwebtestproject");
$count = count($_POST['ids']);
$stmt = $connect->prepare(
    sprintf(
        "DELETE FROM products WHERE id IN (%s)",
        implode(',', array_fill(0, $count, '?'))  // e.g if 3 ids, then "?,?,?"
    )
);
$stmt->bind_param(str_repeat('i', $count), ...$_POST['ids']);
$stmt->execute();

header('Location: index.html ');
