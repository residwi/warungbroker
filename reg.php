<?php 
    session_start();
    if (isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }

    require 'include/fungsi.php';

    //cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["reg"]) ) {
    // ambil data dari tiap elemen form
    $tangg = ($_POST["tang"]);
    $tanggal = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);
    $email = htmlspecialchars($_POST["email"]);
    $username = strtolower(stripcslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    // $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
    if (isset($_GET["aff"])) {
        $affi = $_GET["aff"];
    }else{$affi="wb";}
    // $idaf = rand(100,900);
    $idaff = $username;

    $lastkode = query("SELECT * FROM member ORDER BY kode_member DESC LIMIT 1")[0];
    $lk =$lastkode['kode_member'] ;
    $noUrut = (int) $lastkode['kode_member'];
    $noUrut++;    
    $kodemember = sprintf("%03s", $noUrut);
        

    //cek username sudah ada atau belum
    $cekusername = mysqli_query($conn, "SELECT username_member FROM member WHERE username_member = '$username'");
    if (mysqli_fetch_assoc($cekusername)) {
        echo "<script>
                alert('username sudah terdaftar');
                document.location.href = 'reg';
            </script>";
        return false;

    }

    //cek  email sudah ada atau belum
    $cekemail = mysqli_query($conn, "SELECT email_member FROM member WHERE email_member = '$email'");
    if (mysqli_fetch_assoc($cekemail)) {
        echo "<script>
                alert('email sudah terdaftar');
                document.location.href = 'reg';
            </script>";
        return false;

    }
    
    

    // cek konfirmasi passqord
    // if ( $password !== $password2) {
    //     echo "<script>
    //             alert('konfirmasi password tidak sesuai');
    //             document.location.href = 'reg';
    //         </script>
    //         ";
    //     return false;
    // }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query tambah member
    $query = "INSERT INTO member 
                VALUES 
                ('','$kodemember','$username','$email','$password','$idaff','$affi','$tanggal')
            ";
    mysqli_query($conn, $query);

    $queryp = "INSERT INTO profile 
                VALUES 
                ('','$kodemember','$email','','','','lanang.png')
            ";
    mysqli_query($conn, $queryp);

    $queryk = "INSERT INTO komisi 
                VALUES 
                ('','$kodemember','$email','$tanggal','$jam','registrasi','0','0','0','0')
            ";
    mysqli_query($conn, $queryk);

    $queryr = "INSERT INTO rebate 
                VALUES 
                ('','$kodemember','$email','$tanggal','$jam','registrasi','0','0','0','0','0')
            ";
    mysqli_query($conn, $queryr);

    $ks = rand(100000,900000);
    $kodesaku = "S".$ks;

    $queryy = "INSERT INTO saku 
                VALUES 
                ('','$kodemember','$email','$kodesaku','$tanggal','$jam','registrasi','0','0','0')
            ";
    mysqli_query($conn, $queryy);
    
     

    //cek apakh data berhasil di tambahkan
    if( mysqli_affected_rows($conn) > 0 ) {
        
        // echo "
        //     <script>
        //         alert ('Register Berhasil! Silahkan Login') ;
        //         document.location.href = 'login';           
        //     </script>
        //     ";
        require 'classes/reg.php';

        require_once('classes/class.phpmailer.php');

     
            $to = $email;
            $SubjectMsg = "Registrasi WarungBroker";
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
                $mail->Password = "br0k3r"; //password email 
                $mail->SetFrom("cs@warungbroker.com", "WarungBroker"); //set email pengirim
                $mail->Subject = $SubjectMsg; //subyek email
                $mail->AddAddress($email);  //tujuan email
                $mail->AddBCC("cs@warungbroker.com", "WarungBroker");
                $mail->MsgHTML ($bodyMsg);
        
            //cek apakh data wd berhasil di tambahkan
            if($mail->Send())  {
                

                    // $cekDps = mysqli_query($conn,"SELECT * FROM withdraw WHERE no_akun = '".$no_akun."' AND total = '".$total."'");
                    //     $dataDps = mysqli_fetch_array($cekDps);

                echo '
                    <script>
                        alert ("Register Berhasil! Silahkan Login") ;
                        document.location.href = "login";  
                    </script>
                    ';
            } else {
                echo "Mail Error - >".$mail->ErrorInfo;
            }
    } else {
        echo "
            <script>  
                alert ('Register Gagal') ;              
                document.location.href = 'reg';                
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
                <!-- <div class="section__content section__content--p30">
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
                                    <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                        echo $date->format('Y-m-d'); ?>" 
                                                readonly="">
                                                <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                        echo $date->format('H:i:s'); ?>" 
                                                readonly="">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Email </label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="" required="">
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div> -->
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="reg">Register</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Sudah Punya Akun?
                                    <a href="login">Log In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                        <!-- </div>
                    </div>
                </div> -->
                
            </div><!-- END MAIN CONTENT-->
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->

    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
