<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../config/database.php';
include_once '../objects/jadwal.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$jadwal = new Jadwal($db);
 
// set ID property of user to be edited
$jadwal->user_id = isset($_GET['id']) ? $_GET['id'] : die();
$jadwal->tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : die();
// read the details of user to be edited
$stmtJadwal = $jadwal->readOne();

$jadwal_arr=array();
$jadwal_arr["jadwal"]=array();

while ($rowJadwal = $stmtJadwal->fetch(PDO::FETCH_ASSOC)){

    extract($rowJadwal);
    $product_item=array(
        "id" => $id,
        "jadwal" => $jadwal,
        "waktu" => $waktu,
        "tanggal" => $tanggal,
        "tempat" => $tempat,
        "prioritas" => $prioritas,
     );
        
    array_push($jadwal_arr["jadwal"], $product_item);
}
echo json_encode($jadwal_arr);
?>