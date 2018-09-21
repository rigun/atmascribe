<?php

if(isset($_FILES["imageUpload"]["type"]))
{
    $id = $_GET['id'];
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["imageUpload"]["name"]);
    $file_extension = end($temporary);
    
    if ($_FILES["imageUpload"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["imageUpload"]["error"] . "<br/><br/>";
    }
    else
    {
        
            $sourcePath = $_FILES['imageUpload']['tmp_name']; // Storing source path of the file in a variable
            $filename=$_FILES["imageUpload"]["name"];
            $extension=end(explode(".", $filename));
            $newfilename=$id .".".$extension;

            $targetPath = "../../upload/".$newfilename; // Target path where file is to be stored
            move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
            // include database and object files
            include_once '../config/database.php';
            include_once '../objects/user.php';
            
            // get database connection
            $database = new Database();
            $db = $database->getConnection();
            
            // prepare product object
            $product = new User($db);

            $product->id = $id;
            $product->foto = $newfilename;
            if($product->updatePicture()){
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
    }
}else{
    echo 'gagal';
}

?>