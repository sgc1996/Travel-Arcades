<?php
//index.php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

error_reporting(0);
$msg='';

if (isset($_POST['submit'])) {
$message = '
  <h3 align="center">Sender Details</h3>
  <table border="1" width="100%" cellpadding="5" cellspacing="5">
   <tr>
    <td width="30%">Name</td>
    <td width="70%">'.$_POST["name"].'</td>
   </tr>
   <tr>
    <td width="30%">Email</td>
    <td width="70%">'.$_POST["email"].'</td>
   </tr>
   <tr>
    <td width="30%">Contact Number</td>
    <td width="70%">'.$_POST["phone"].'</td>
   </tr>
   <tr>
    <td width="30%">Your Message</td>
    <td width="70%">'.$_POST["message"].'</td>
   </tr>
  </table>
 ';

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();        //Sets Mailer to send message using SMTP
    $mail->Host = 'mail.travelarcades.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '465';        //Sets the default SMTP server port
    $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'mail@travelarcades.com';     //Sets SMTP username
    $mail->Password = 'M~lcC9ruRYAA';     //Sets SMTP password
    $mail->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = $_POST["email"];     //Sets the From email address for the message
    $mail->FromName = $_POST["name"];    //Sets the From name of the message
    $mail->AddAddress('gayanc@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('buwanekav@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('ameshm@aitech.lk', 'Travel Arcade'); //Adds a "To" address
    $mail->AddAddress('gayanchathuranga1992@gmail.com', 'Travel Arcade'); //Adds a "To" address
    //$mail->AddAddress('info@travelarcades.com', 'Travel Arcade'); //Adds a "To" address
    $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);       //Sets message type to HTML
    // $mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
    $mail->Subject = $_POST["subject"];    //Sets the Subject of the message
    $mail->Body = $message;       //An HTML or plain text message body

 if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  $msg = '<div class="alert alert-success" style="text-align: center; color: green;">Email Sent Successfully</div>';
  // unlink($path);
 }
 else
 {
  $msg = '<div class="alert alert-danger" style="text-align: center; color: red;">There is an Error</div>';
 }
}

?>