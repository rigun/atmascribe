<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../config/database.php';
include_once '../objects/jadwal.php';
$database = new Database();
$db = $database->getConnection();
$product = new Jadwal($db);
$product->user_id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $product->getTanggal();
$num = $stmt->rowCount();



if($num>0){
    $products_arr=array();
    $products_arr["jadwal"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $product_item=array(
            "tanggal" => $tanggal,
         );
         
        array_push($products_arr["jadwal"], $product_item);
    }
    echo json_encode($products_arr);
}
else{
    echo json_encode(
        array("message" => "No jadwal found.")
    );
}
?>