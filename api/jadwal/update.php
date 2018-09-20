<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, PATCH, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/jadwal.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Jadwal($db);
 
$data = json_decode(file_get_contents("php://input"));
 
$product->jadwal = $data->jadwal;
$product->waktu = $data->waktu;
$product->tanggal = $data->tanggal;
$product->tempat = $data->tempat;
$product->prioritas = $data->prioritas;
$product->id = $data->id;

// update the product
if($product->update()){
    echo '{';
        echo '"message": "Jadwal Berhasil Diupdate."';
    echo '}';
}
 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Jadwal Gagal Diupdate."';
    echo '}';
}
?>