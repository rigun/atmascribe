<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, PATCH, POST");
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
 
// set ID property of product to be edited
$product->id = $data->id;
$newfilename = $data->foto;
if(isset($_FILES["file"]["type"]))
{
    $newfilename = "didalam";
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 100000) && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }
        else
        {
           
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $filename=$_FILES["file"]["name"];
                $extension=end(explode(".", $filename));
                $newfilename=$data->id .".".$extension;

                $targetPath = "../upload/".$newfilename; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
     
        }
    }
}

$product->email = $data->email; 
$product->nama = $data->nama; 
$product->password = password_hash($data->password, PASSWORD_DEFAULT); 
$product->passwordL = $data->passwordL; 
$product->foto = $newfilename; 
$product->ttl = $data->ttl; 
$product->kutipan = $data->kutipan; 

if($product->passwordL == null){
    if($product->update()){
        echo '{';
            echo '"message": "Data berhasil di perbaharui."';
        echo '}';
    }
     
    // if unable to update the product, tell the user
    else{
        echo '{';
            echo '"message": "Gagal memperbaharui data. Coba lagi"';
        echo '}';
    }
}else{
    if($product->updateWithPassword()){
        echo '{';
            echo '"message": "Data berhasil di perbaharui."';
        echo '}';
    }
     
    // if unable to update the product, tell the user
    else{
        echo '{';
            echo '"message": "Gagal memperbaharui data. Coba lagi."';
        echo '}';
    }
}
// update the product

?>