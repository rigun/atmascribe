<?php
// Check for empty fields
if(empty($_POST['email']))
{
echo "No arguments Provided!";
return false;
}

$email = strip_tags(htmlspecialchars($_POST['email']));

// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new User($db);

$token  = $product->getUserByToken($email);

if($token != null){
    $product->email = $email;
    $product->token = $token;
    $product->sendEmail();
}else{
    echo "Email tidak di temukan";
}


        
?>