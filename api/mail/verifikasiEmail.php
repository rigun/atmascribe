<?php

// include database and object files
include_once './config/database.php';
include_once './objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
echo '{';
    echo '"message": "Updating"';
echo '}';
// prepare product object
$product = new User($db);
 
$product->token = isset($_GET['token']) ? $_GET['token'] : die();
 

if($product->updateByToken()){
    header('Location: https://atmascribe.thekingcorp.org/successVerifikasi.php');
    echo '{';
        echo '"message": "Sukses Update Status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Gagal Update Status."';
    echo '}';
}
?>