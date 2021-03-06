<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new User($db);
 
 
// check if more than 0 record found
if($product->sumData()){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();


        $product_item=array(
            "user" => $product->jumlahUser,
            "catatan" => $product->jumlahCatatan,
            "jadwal" => $product->jumlahJadwal,
         );
         
         // "description" => html_entity_decode($description),
   

 
        array_push($products_arr["records"], $product_item);
 
    echo json_encode($products_arr);
}
 
else{
    echo json_encode(
        array("message" => "Data tidak ditemukan")
    );
}
?>