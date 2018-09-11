<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new User($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
 
 
$product->email = $data->email; 
$product->password = $data->password; 

if($product->login()){
    echo '{';
        echo '"message": "Login berhasil"';
    echo '}';
}
    
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Gagal login."';
    echo '}';
}

?>