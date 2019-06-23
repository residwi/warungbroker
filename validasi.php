<?php 
session_start();
    if (!isset($_SESSION["email"])) {
        require 'include/fungsi.php';
    }else{
        
        require 'include/fungsi.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
    }

    $juhal = "validasi";
    //cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
    $tangg = ($_POST["tang"]);
    $tanggal = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);
    if (!isset($_SESSION["email"])) {
        $email = $_POST["email"];
        
        $user = query("SELECT * FROM member WHERE email_member = '$email'") [0];
       
        $aff = $user["aff"];

        if ($aff === "oeangkoe") {
            echo "<script>
                    alert('Email Anda Belum terdaftar di warungbroker.com');
                    document.location.href = 'login';    
                 </script>";
            return false;
        }
        if ($aff === "rti") {
            echo "<script>
                    alert('Email Anda Belum terdaftar di warungbroker.com');
                    document.location.href = 'login';    
                 </script>";
            return false;
        }
        
        $cekemail = mysqli_query($conn, "SELECT email_member FROM member WHERE email_member = '$email'");
            $jml=mysqli_num_rows($cekemail);
            if($jml == 0){
                echo "<script>
                        alert('email anda belum terdaftar');
                        document.location.href = 'validasi.php';    
                     </script>";
                 return false;
                 
            }
             // if (mysqli_fetch_assoc($cekemail)) {
                 
             // }else{
             //    echo "<script>
             //             alert('no akun sudah terdaftar');
             //            document.location.href = 'validasi.php';    
             //         </script>";
             //     return false;
             // }
    }else{$email = $user["email_member"];}
    
    $kodemember = $user["kode_member"];
    $nama = htmlspecialchars($_POST["namaakun"]);
    $broker = strtolower(stripcslashes($_POST["broker"]));
    $no_akun = htmlspecialchars($_POST["nomorakun"]);
    $aff = $user["aff"];
    $status = 1;
    
    if ($broker === "pilih broker") {
        echo "<script>
                 alert('Broker belum dipilih');
                document.location.href = 'validasi';    
             </script>";
        return false;
    }

    //cek no akun sudah ada atau belum
     $cekakun = mysqli_query($conn, "SELECT no_akun FROM validasi WHERE no_akun = '$no_akun'");
     if (mysqli_fetch_assoc($cekakun)) {
         echo "<script>
                 alert('no akun sudah terdaftar');
                document.location.href = 'validasi.php';    
             </script>";
         return false;
     }    

    //query insert data
    $query = "INSERT INTO validasi
                VALUES 
                ('','$tanggal','$jam','$kodemember','$email','$nama','$broker','$no_akun','$aff','$status') 
            ";

    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0 ) {
        
        
    // echo "
    //     <script>   
    //         alert('validasi berhasil');             
    //         document.location.href ='validasi';           
    //     </script>
    //     ";
        $ceka = mysqli_query($conn,"SELECT * FROM validasi WHERE no_akun = $no_akun");
            $data = mysqli_fetch_array($ceka);
            $cEmail = $data['email'];
            $cNama = ucwords($data['nama']);
            $no_akun = $data['no_akun'];
            $broker = $data['broker'];
            
            $ceku = mysqli_query($conn,"SELECT * FROM member WHERE email_member = '".$cEmail."'");
            $user = mysqli_fetch_array($ceku);
            $cUser = $user['username_member'];

            require 'classes/v.php';

            require_once('classes/class.phpmailer.php');

     
            $to = $cEmail;
            $SubjectMsg = "Validasi Akun";
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
                $mail->SetFrom("cs@warungbroker.com", "WarungBroker"); //set email pengirim
                $mail->Subject = $SubjectMsg; //subyek email
                $mail->AddAddress($cEmail);  //tujuan email
                $mail->AddBCC("cs@warungbroker.com", "WarungBroker");
                $mail->MsgHTML ($bodyMsg);
    
              if($mail->Send())
              {
                echo '
                    <script> 
                        alert("Terimakasih telah melakukan validasi akun trading. Anda akan menerima notifikasi melalui email");             
                        document.location.href ="profile";
                    </script>
                    ';

                
              }
              else
              {
                echo "Mail Error - >".$mail->ErrorInfo;
              }

        
    } else {
        echo "
            <script> 
                alert('validasi gagal');
                document.location.href = 'validasi';                
            </script>
            ";
    }
    
    
}
    
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Daftar Broker</h2>
                                    
                                </div>
                            </div>
                        </div> -->
                        <div class="row ">
                            <?php if (!isset($_SESSION["email"])) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Validasi</strong> Akun
                                    </div>
                                    
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                            value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                    echo $date->format('Y-m-d'); ?>" 
                                            readonly="">
                                            <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                            value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                    echo $date->format('H:i:s'); ?>" 
                                            readonly="">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" placeholder="" class="form-control" required="">
                                                    <small class="form-text text-muted">Email yang sudah terdaftar</small>
                                                </div>
                                            </div>
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Broker</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="broker" id="select" class="form-control">
                                                        <option >Pilih Broker</option>
                                                        <option value="fbs">FBS</option>
                                                        <option value="firewoodfx">FirewoodFX</option>
                                                        <option value="insta forex">Insta Forex</option>
                                                        <option value="octafx">OctaFX</option>
                                                        <option value="just forex">Just Forex</option>
                                                        <option value="tickmill">Tickmill</option>
                                                        <option value="tifia">Tifia</option>
                                                         <option value="weltrade">Weltrade</option>
                                                        <option value="xm">XM</option>
                                                        <option value="binary">Binary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="namaakun" placeholder="" class="form-control" required="">
                                                    <small class="form-text text-muted">Isikan Nama Akun Anda</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nomor Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nomorakun" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                    <small class="form-text text-muted">Isikan Nomor Akun Anda</small>
                                                </div>
                                            </div>
                                            
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                                    <i class="fa fa-dot-circle-o"></i> Validasi Akun
                                                </button>
                                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button> -->
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?php else : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Validasi</strong> Akun
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                            value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                    echo $date->format('Y-m-d'); ?>" 
                                            readonly="">
                                            <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                            value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                    echo $date->format('H:i:s'); ?>" 
                                            readonly="">
                                           <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Broker</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="broker" id="select" class="form-control">
                                                        <option >Pilih Broker</option>
                                                        <option value="fbs">FBS</option>
                                                        <option value="firewoodfx">FirewoodFX</option>
                                                        <option value="insta forex">Insta Forex</option>
                                                        <option value="just forex">Just Forex</option>
                                                        <option value="octafx">OctaFX</option>
                                                        <option value="tickmill">Tickmill</option>
                                                        <option value="tifia">Tifia</option>
                                                         <option value="weltrade">Weltrade</option>
                                                        <option value="xm">XM</option>
                                                        <option value="binary">Binary</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="namaakun" placeholder="" class="form-control" required="">
                                                    <small class="form-text text-muted">Isikan Nama Akun Anda</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nomor Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nomorakun" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                    <small class="form-text text-muted">Isikan Nomor Akun Anda</small>
                                                </div>
                                            </div>
                                            
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                                    <i class="fa fa-dot-circle-o"></i> Validasi Akun
                                                </button>
                                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button> -->
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?php endif ; ?>

                            <div class="col-md-6 text-left" >
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <strong class="card-title text-light">Syarat Dan Kondisi</strong>
                                    </div>
                                    <div class="card-body text-white bg-danger">
                                        <ol class="vue-ordered">
                                          <li>Pastikan anda sudah open account pada broker dibawah affiliasi Warung Broker.</li>
                                          <li>Validasi akun ini bertujuan untuk database Warung Broker dalam membagi Cashbasck / Komisi / Rebate kepada anda.</li>
                                          <li>Apabila anda belum mem-validasi akun anda maka akun anda belum bisa melakukan Deposit / Withdrawal melalui Warung Broker.</li>
                                          
                                        </ol>
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
