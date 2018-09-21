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
            echo 'berhasil';
    }
}else{
    echo 'gagal';
}

?>