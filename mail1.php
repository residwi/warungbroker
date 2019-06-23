<?php


include "classes/class.phpmailer.php";



$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'tls'; 
$mail->Host = "srv47.niagahoster.com"; //host masing2 provider email
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = "cs@warungbroker.com"; //user email
$mail->Password = "wb2018"; //password email 
$mail->SetFrom("cs@warungbroker.com", "WarungBroker.com"); //set email pengirim
$mail->Subject = "Test mail"; //subyek email
$mail->AddAddress("sgendenk@gmail.com");  //tujuan email
$mail->AddBCC("cs@warungbroker.com", "Notif WarungBroker");
$mail->MsgHTML ("

tes wb

");
//$mail->IsHTML(true);
                //$mail->Body    = "pusinngggg.....";
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>