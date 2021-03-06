<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, PATCH, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/catatan.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Catatan($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$product->id = $data->id;
$product->catatan = $data->catatan;
$product->prioritas = $data->prioritas;

// update the product
if($product->update()){
    echo '{';
        echo '"message": "Catatan Berhasil Diupdate."';
    echo '}';
}
 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Catatan Gagal Diupdate."';
    echo '}';
}
?>