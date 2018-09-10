<?php
// Check for empty fields
if(empty($_POST['name']))
   {
   echo "No arguments Provided!";
   return false;
   }
echo '<script>alert("tes");</script>';
return true;         
?>