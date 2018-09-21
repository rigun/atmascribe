<?php
// Check for empty fields
if(empty($_POST['email']))
{
echo "No arguments Provided!";
return false;
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

require '../vendor/autoload.php';
   
$email = strip_tags(htmlspecialchars($_POST['email']));
echo $email;
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/user.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new User($db);

$token  = $product->getUserByToken($email);

if($token != null){
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'kakuna.rapidplex.com;www.thekingcorp.org';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'atmaScribe@thekingcorp.org';                 // SMTP username
                $mail->Password = 'atmaScribe@Email-18';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465 ;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('atmaScribe@thekingcorp.org', 'Atma Scribe');
                $mail->addAddress($email);               // Name is optional
                $mail->addReplyTo('noreply@thekingcorp.org', 'noreply');
                $mail->addCC('atmaScribe@thekingcorp.org');
                $mail->addBCC('atmaScribe@thekingcorp.org');


                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Website Contact From:  Atma Scribe';
                $mail->Body  ='<html>';
                $mail->Body  .='<body>';
                    $mail->Body  .='<div class="mail" style="margin: auto; width: 100%; max-width: 350px; text-align: center; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 30px;">';
                        $mail->Body  .='<div class="mail-header" style="color: white; background-color: #003365; width: 100%; font-size: 20px; padding: 20px; border-top-left-radius: 25px; border-top-right-radius: 25px;">';
                            $mail->Body  .='<strong>VERIFIKASI EMAIL DARI <br/>ATMA SCRIBE</strong>';
                        $mail->Body  .='</div>';
                        $mail->Body  .='<div class="mail-body" style="color: black; background-color:  #CFE7EA; width: 100%; padding: 20px;">';
                            $mail->Body  .='<h1>Berikut ada link untuk melakukan perubahan karena lupa password, apabila anda tidak merasa meminta untuk merubah password, silahkan abaikan pesan ini.</h1>';
                            $mail->Body  .='<a href="https://atmaScribe.thekingcorp.org/renew/input-password.php?token='.$token.'"><button style="background-image: linear-gradient(to left, #0025BC , #0071BC); width: 100%; text-align: center; margin: auto; min-height: 40px; color: white; font-size: 30px; cursor: pointer;">UBAH PASSWORD</button></a>';
                        $mail->Body  .='</div>';
                        $mail->Body  .='<div class="mail-footer" style="color: black; background-color: #adadad; width: 100%; font-size: 20px;padding: 20px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;" >';
                            $mail->Body  .='<p>Apabila link tersebut bermasalah, silahkan akses url berikut: </p><br/>';
                            $mail->Body  .='https://atmaScribe.thekingcorp.org/renew/input-password.php?token='.$token;
                        $mail->Body  .='</div>';
                    $mail->Body  .='</div>';
                $mail->Body  .='</body>';
                $mail->Body  .='</html>';

                $mail->send();
                echo '200';
                return true;
            } catch (Exception $e) {
                echo "Terjadi kesalahan saat mengirim pesan, coba lagi";
                return false;
            }

    
}else{
    echo "Email tidak di temukan";
}


        
?>