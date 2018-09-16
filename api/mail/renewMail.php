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
    $email_subject = "Website Contact From:  Atma Scribe";
    $headers = "From: atmascribe@atmascribe.000webhostapp.com"."\r\n";
    $headers .= "Reply-To:noreply@atmascribe.000webhostapp.com" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    $message ='<html>';
    $message .='<body>';
        $message .='<div class="mail" style="margin: auto; width: 100%; max-width: 350px; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 30px;">';
            $message .='<div class="mail-header" style="color: white; background-color: #003365; width: 100%; font-size: 20px; padding: 20px; border-top-left-radius: 25px; border-top-right-radius: 25px;">';
                $message .='<strong>VERIFIKASI EMAIL DARI <br/>ATMASCRIBE</strong>';
            $message .='</div>';
            $message .='<div class="mail-body" style="color: black; background-color:  #CFE7EA; width: 100%; padding: 20px;">';
                $message .='<h1>Silahkan tekan tombol berikut untuk melakukan perubahan password </h1>';
                $message .='<a href="https://atmascribe.000webhostapp.com/renew/input-password.php?token='.$token.'"><button style="background-image: linear-gradient(to left, #0025BC , #0071BC); width: 100%; text-align: center; margin: auto; min-height: 40px; color: white; font-size: 30px; cursor: pointer;">Klik disini</button></a>';
            $message .='</div>';
            $message .='<div class="mail-footer" style="color: black; background-color: #adadad; width: 100%; font-size: 20px;padding: 20px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">';
                $message .='Apabila tombol tersebut bermasalah, silahkan akses url berikut:';
                $message .='https://atmascribe.000webhostapp.com/renew/input-password.php?token='.$token;
            $message .='</div>';
        $message .='</div>';
    $message .='</body>';
    $message .='</html>';
    
    if(mail($email,$email_subject,$message,$headers)){
        echo "berhasil";
        return true; 
    }else{
        echo "gagal";
    }
}else{
    echo "token tidak ditemukan";
}


        
?>