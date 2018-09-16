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
$product->foto = $data->foto;
$product->ttl = $data->ttl;
$product->kutipan = $data->kutipan;
$product->status = $data->status;
$product->token = $data->token;
$product->dibuat_pada = $data->dibuat_pada;

// create the product
// query products
$stmt = $product->search($data->email);
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
            echo '"message": "User Berhasil Dibuat"';
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