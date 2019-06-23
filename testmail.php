<?php 
//require 'classes/reg.php';
require "classes/class.phpmailer.php";
//$to = $cEmail;
    $cEmail = "shidka@hostinger.com";
    $SubjectMsg = "Registrasi WarungBroker.com";
    //$bodyMsg = $message;

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = "srv47.niagahoster.com"; //host masing2 provider email
        $mail->SMTPDebug = 3;
        $mail->Debugoutput = 'html';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "cs@warungbroker.com"; //user email
        $mail->Password = "br0k3r"; //password email 
        $mail->SetFrom($mail->Username, "WarungBroker.com"); //set email pengirim
        $mail->Subject = $SubjectMsg; //subyek email
        $mail->AddAddress($cEmail);  //tujuan email
        $mail->AddBCC("cs@warungbroker.com", "Notif WarungBroker");
        $mail->MsgHTML ("bodyMsg");

      if($mail->Send()) {
        echo"
            <script> alert ('Register Berhasil! Silahkan Login') ;
             document.location.href = 'index.php';
            </script>
            ";                    
      }
      else
      {
        echo "Mail Error - >".$mail->ErrorInfo;
      } 

?>