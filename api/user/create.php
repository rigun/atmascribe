<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
 
$product->email = $data->email;
$product->nama = $data->nama;
$product->password = password_hash($data->password, PASSWORD_DEFAULT);
$product->foto = null;
$product->ttl = null;
$product->kutipan = null;
$product->status = 0;
$product->token = bin2hex(random_bytes(5));
$product->dibuat_pada = date('Y-m-d H:i:s');

$keywords= $data->email;
 
// query products
$stmt = $product->search($keywords);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    echo '{';
        echo '"message": "Email Sudah ada", "code": "403"';
    echo '}';
}
 
else{
    if($product->create()){
        echo '{';
            echo '"message": "User Berhasil Dibuat", "code":"200"';
        echo '}';
    }
     
    // if unable to create the product, tell the user
    else{
        echo '{';
            echo '"message": "Tidak Dapat Membuat User.", "code":"403"';
        echo '}';
    }
}

?>