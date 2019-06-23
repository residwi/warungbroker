<?php 
    session_start();
    if (isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }
    require 'include/fungsi.php';

//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["reset"]) ) {

    $email = $_POST['email'];
    
    $cekemail = mysqli_query($conn, "SELECT * FROM member WHERE email_member = '$email'");
    if( mysqli_num_rows($cekemail) === 1 ) {
        // echo "
        //     <script>
        //         alert('Silahkan Klik link Reset Password yang terkirim pada email anda');
        //     </script>
        //     ";
        
        require 'classes/rp.php';

        require_once('classes/class.phpmailer.php');

     
            $to = $email;
            $SubjectMsg = "Reset Password";
            $bodyMsg = $message;
  
                $mail = new PHPMailer;
                $mail->IsSMTP();
                $mail->SMTPSecure = 'tls'; 
                $mail->Host = "srv47.niagahoster.com"; //host masing2 provider email
                //$mail->SMTPDebug = 3;
                $mail->Debugoutput = 'html';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = "cs@warungbroker.com"; //user email
                $mail->Password = "wb2018"; //password email 
                $mail->SetFrom("cs@warungbroker.com", "WarungBroker.com"); //set email pengirim
                $mail->Subject = $SubjectMsg; //subyek email
                $mail->AddAddress($email);  //tujuan email
                $mail->AddBCC("cs@warungbroker.com", "Notif WarungBroker");
                $mail->MsgHTML ($bodyMsg);
        
            //cek apakh data wd berhasil di tambahkan
            if($mail->Send())  {
                

                    // $cekDps = mysqli_query($conn,"SELECT * FROM withdraw WHERE no_akun = '".$no_akun."' AND total = '".$total."'");
                    //     $dataDps = mysqli_fetch_array($cekDps);

                echo '
                    <script>
                        alert("Silahkan Klik link Reset Password yang terkirim pada email anda");
                        document.location.href = "login";  
                    </script>
                    ';
            } else {
                echo "Mail Error - >".$mail->ErrorInfo;
            }
            


    }else {
        echo "
            <script>   
                alert('Email Belum Terdaftar');             
                document.location.href = 'lupass';                
            </script>
            ";
    }
        
    
}
$juhal = "broker";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'include/header.php'; ?>

<body class="animsition">
    <div class="page-wrapper">
        
        <?php require 'include/headermobile.php'; ?>

        <?php require 'include/sidebar.php'; ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            
            <?php require 'include/headerdesktop.php'; ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <!-- <div class="section__content section__content--p5">
                    <div class="container-fluid">
                        <div class="row"> -->
                            
                            <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/wblogo271.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div> -->
                                <div class="login-checkbox">
                                    <!-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label> -->
                                    <label>
                                        <a href="#">Masukkan email yg sudah terdaftar</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="reset">Reset Password</button>
                                
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Belum Punya Akun?
                                    <a href="reg">Registrasi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                        </div>
                    </div>
                </div>
                
            </div><!-- END MAIN CONTENT-->
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->

    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
