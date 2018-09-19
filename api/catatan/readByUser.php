<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

include_once '../config/database.php';
include_once '../objects/catatan.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$catatan = new Catatan($db);
 
// set ID property of user to be edited
$catatan->user_id = isset($_GET['id']) ? $_GET['id'] : die();
// read the details of user to be edited
$stmtCatatan = $catatan->readOne();

$catatan_arr=array();
$catatan_arr["catatan"]=array();

while ($rowCatatan = $stmtCatatan->fetch(PDO::FETCH_ASSOC)){

    extract($rowCatatan);
    $product_item=array(
        "catatan" => $catatan,
        "prioritas" => $prioritas,
        "id" => $id
        );
        
    array_push($catatan_arr["catatan"], $product_item);
}
echo json_encode($catatan_arr);
?>