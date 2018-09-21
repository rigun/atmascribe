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
$jadwal->tanggal = $_GET['tanggal'];
// read the details of user to be edited
if($_GET['prioritas']==0){
    $stmtJadwal = $jadwal->readOne();
}else if($_GET['prioritas']==1){
    $stmtJadwal = $jadwal->readOnePrioritas();
}else{
    $stmtJadwal = $jadwal->readAll();
}

$numJadwal = $stmtJadwal->rowCount();

$jadwal_arr=array();
$jadwal_arr["jadwal"]=array();
$jadwal_arr["number"]=array();
array_push($jadwal_arr["number"], $numJadwal);
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