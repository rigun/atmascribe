<?php

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

?>