<?php 
session_start();
    if (!isset($_SESSION["email"])) {
        require 'include/fungsi.php';
    }else{
        
        require 'include/fungsi.php';
        $cekuser = mysqli_query($conn,"SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'");
        $user = mysqli_fetch_array($cekuser);
        //$user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];

        $cekprofile = mysqli_query($conn,"SELECT * FROM profile WHERE kode_member = '$kodemember'");
        $profile = mysqli_fetch_array($cekprofile);
        //$profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
        //$akuntrading = query("SELECT * FROM validasi WHERE email = '$email' AND status = '2''");

        $ceksaku = mysqli_query($conn,"SELECT * FROM saku WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1");
        $sk = mysqli_fetch_array($ceksaku);
        //$sk = query("SELECT * FROM saku WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1")[0];
        $saku = $sk['saldo'];
        $kodesaku = $sk['kodesaku'];
    }

    $juhal = "layanan";

    $rate = query("SELECT * FROM rate WHERE status = 1");

//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["deposit"]) ) {
    $tangg = ($_POST["tang"]);
    $tanggal = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);

    if (!isset($_SESSION["email"])) {
        $email = strtolower(htmlspecialchars($_POST["email"]));
        $cekemail = mysqli_query($conn, "SELECT * FROM member WHERE email_member = '$email' ");
        if( mysqli_num_rows($cekemail) != 1 ) {
            echo "<script>
                        alert('Email Belum Terdaftar');
                        document.location.href = 'deposit';
                    </script>";
                return false;
        }
        $km = query("SELECT * FROM member WHERE email_member = '$email'") [0];
        $kodemember = $km["kode_member"];
    }else{
        $email = $user["email_member"];
        $kodemember = $user["kode_member"];
    }

    $broker = strtolower(stripcslashes($_POST["broker"]));
    $no_akun = htmlspecialchars($_POST["noakun"]);
    $nama_akun = strtolower(htmlspecialchars($_POST["namaakun"]));
    $deposit = htmlspecialchars($_POST["jumlahdeposit"]);
    $bank = strtolower(stripcslashes($_POST["bank"]));
    $unik =  rand(10,200);

    $cekemail = mysqli_query($conn, "SELECT * FROM member WHERE email_member = '$email' ");

        
    //cek password
    if( mysqli_num_rows($cekemail) === 1 ) {
        $cekakun = mysqli_query($conn, "SELECT * FROM validasi WHERE no_akun = '$no_akun' AND email = '$email' AND status = 2 ");
        
        if (mysqli_num_rows($cekakun) === 1) {
            $row = mysqli_fetch_assoc($cekakun);
            if ($broker === "pilih broker") {
                echo "<script>
                        alert('Broker Belum Di Pilih');
                        document.location.href = 'deposit';
                    </script>";
                return false;
            }elseif (($row["broker"] === $broker)) {
                if ($bank === "pilih bank") {
                    echo "<script>
                            alert('Bank Tujuan Belum Di Pilih');
                            document.location.href = 'deposit';
                        </script>";
                    return false;
                }
            }else{
                echo "<script>
                    alert('Broker tidak sesuai dengan No Akun Anda');
                    document.location.href = 'deposit';
                </script>";
                return false;
            }
        }else{
            echo "<script>
                    alert('No Akun Belum Terdaftar atau silahkan validasi akun dulu');
                    document.location.href = 'deposit';
                </script>";
            return false;
        }
       
     }else{
        echo "<script>
                    alert('Email belum terdaftar');
                    document.location.href = 'deposit';
                </script>";
             return false;
     }

    $ratedepo = query("SELECT * FROM rate WHERE broker = '$broker' ")[0];
    $dollar = $ratedepo['deposit'];
    
    $total = (int)$deposit*$dollar+$unik;
    $status = 1;

    

    //query insert data
    $query = "INSERT INTO deposit
                VALUES 
                ('','$tanggal','$jam','$kodemember','$email','$broker','$no_akun','$nama_akun','$deposit','$bank','$unik','$total','$status') 
            ";

    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0 ) {
        // $cekDps = mysqli_query($conn,"SELECT * FROM deposit WHERE no_akun = $no_akun AND unik = $unik ");
        //                 $dataDps = mysqli_fetch_array($cekDps);

        // echo '
        // <script>   
        //     alert("deposit berhasil");             
        //     document.location.href ="invoice.php?depo='.$dataDps["id"].'";           
        // </script>
        // ';
            //ambil data dari tabel validasi
            $ceka = mysqli_query($conn,"SELECT * FROM deposit WHERE no_akun = $no_akun AND unik = $unik");
            $data = mysqli_fetch_array($ceka);
            $cEmail = $data['email'];
            //$cNama = ucwords($data['nama']);
            $no_akun = $data['no_akun'];
            $bank = $data['bank'];
            $deposit = number_format($data['deposit'],2);
            $total = number_format($data['total']);

            if ($data["broker"]==="xm" OR $data["broker"]==="fbs") {
                $broker = strtoupper($data['broker']);
            }else{
                $broker = ucwords($data['broker']);
            }

            if($bank == 'bca'){
                $norek = "BCA - 088.608.8986 A/N Margareth Lindsay Y.";
            }elseif($bank == 'mandiri'){
                $norek = "Mandiri - 142.000.247.7999 A/N Margareth Lindsay Y.";
            }elseif($bank == 'bni'){
                $norek = "BNI - 063.021.5090 A/N Margareth Lindsay Y.";
            }elseif($bank == 'bri'){
                $norek = "BRI - 0412.0100.1323.565 A/N Melissa Vincentia J.";
            }
            
            $ceku = mysqli_query($conn,"SELECT * FROM member WHERE email_member = '".$cEmail."'");
            $user = mysqli_fetch_array($ceku);
            $cUser = $user['username_member'];

            require 'classes/depo.php';

            require_once('classes/class.phpmailer.php');

     
            $to = $cEmail;
            $SubjectMsg = "Deposit Akun Trading";
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
                $mail->AddAddress($cEmail);  //tujuan email
                $mail->AddBCC("cs@warungbroker.com", "Notif WarungBroker");
                $mail->MsgHTML ($bodyMsg);
    
              if($mail->Send())
              {
                echo '
                    <script> 
                        alert("deposit berhasil");             
                        document.location.href ="invoice.php?depo='.$data["id"].'";
                    </script>
                    ';

                
              }
              else
              {
                echo "Mail Error - >".$mail->ErrorInfo;
              }
        
    } else {
        echo '
            <script> 
                alert("deposit gagal");             
                document.location.href ="invoice.php?depo='.$data["id"].'";
            </script>
            ';
    }
    
    
}

//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["depositsaku"]) ) {
    
    $tangg = ($_POST["tang"]);
    $tanggal = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);

    

    $broker = strtolower(stripcslashes($_POST["broker"]));
    $no_akun = htmlspecialchars($_POST["noakun"]);
    $nama_akun = strtolower(htmlspecialchars($_POST["namaakun"]));
    $deposit = htmlspecialchars($_POST["jumlahdeposit"]);
    $bank = $kodesaku;
    $unik =  0;

    
    $ratedepo = query("SELECT * FROM rate WHERE broker = '$broker' ")[0];
    $dollar = $ratedepo['deposit'];
    
    $total = (int)$deposit/$dollar;
    $status = 1;

    if($deposit < 10000){
      echo '<script>
                alert("Minimal Deposit Saku Rp. 10,000");
                document.location.href ="deposit.php?id='.$_GET["id"].'&saku='.$_GET["saku"].'";                
            </script>';
        return false;
    }
    if($deposit > $saku){
      echo '<script>
                alert("Dana Saku Anda Tidak Mencukupi");
                document.location.href ="deposit.php?id='.$_GET["id"].'&saku='.$_GET["saku"].'";                
            </script>';
        return false;
    }
    

    //query insert data
    $query = "INSERT INTO deposit
                VALUES 
                ('','$tanggal','$jam','$kodemember','$email','$broker','$no_akun','$nama_akun','$total','$bank','$unik','$deposit','$status') 
            ";

    mysqli_query($conn, $query);

    $saldosaku =(int) $saku - $deposit;
    //query insert data
    $querys = "INSERT INTO saku
    VALUES 
    ('','$kodemember','$email','$kodesaku','$tanggal','$jam','deposit','0','$deposit','$saldosaku') 
    ";
    mysqli_query($conn, $querys);

    if( mysqli_affected_rows($conn) > 0 ) {
        $cekDps = mysqli_query($conn,"SELECT * FROM deposit WHERE no_akun = $no_akun AND unik = $unik ");
                        $dataDps = mysqli_fetch_array($cekDps);
        
    // echo '
    //     <script>   
    //         alert("deposit berhasil");             
    //         document.location.href ="invoice.php?dpsaku='.$dataDps["id"].'";           
    //     </script>
    //     ';
        //ambil data dari tabel validasi
            $ceka = mysqli_query($conn,"SELECT * FROM deposit WHERE no_akun = $no_akun AND deposit = $total AND total = $deposit" );
            $data = mysqli_fetch_array($ceka);
            $cEmail = $data['email'];
            //$cNama = ucwords($data['nama']);
            $no_akun = $data['no_akun'];
            //$bank = $data['bank'];
            $saku = substr($data['bank'],0,1)  ;
            $deposit = number_format($data['deposit'],2);
            $total = number_format($data['total']);

            if ($saku==="S" ) {
                $bank = $data['bank'];;
            }

            
            
            $ceku = mysqli_query($conn,"SELECT * FROM member WHERE email_member = '".$cEmail."'");
            $user = mysqli_fetch_array($ceku);
            $cUser = $user['username_member'];

            require 'classes/deposaku.php';

            require_once('classes/class.phpmailer.php');

     
            $to = $cEmail;
            $SubjectMsg = "Deposit Akun Trading By Saku";
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
                $mail->AddAddress($cEmail);  //tujuan email
                $mail->AddBCC("cs@warungbroker.com", "Notif WarungBroker");
                $mail->MsgHTML ($bodyMsg);
    
              if($mail->Send())
              {
                echo '
                    <script> 
                        alert("deposit berhasil");             
                        document.location.href ="invoice.php?dpsaku='.$data["id"].'";
                    </script>
                    ';

                
              }

        
    } else {
        echo '
            <script> 
                alert("deposit gagal");
                document.location.href ="invoice.php?dpsaku='.$dataDps["id"].'";                
            </script>
            ';
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

                        <script type="text/javascript">
               
                            $(document).ready(function(){
                                $('#broker').change(function() { // Jika Select Box id provinsi dipilih
                                    var broker = $(this).val(); // Ciptakan variabel provinsi
                                    var kodemember = $("[name='kodemember']").val();
                                    $.ajax({
                                        type: 'POST', // Metode pengiriman data menggunakan POST
                                        url: 'addjs/addnoakun.php', // File yang akan memproses data
                                        data: 'broker=' + broker + '&kodemember=' + kodemember, // Data yang akan dikirim ke file pemroses
                                        success: function(response) { // Jika berhasil
                                            $('#noakun').html(response); // Berikan hasil ke id kota
                                        }
                                    });
                                });
                                
                            });

                            $(document).ready(function(){
                                $('#noakun').change(function() { // Jika Select Box id provinsi dipilih
                                    var noakun = $(this).val(); // Ciptakan variabel provinsi
                                    var kodemember = $("[name='kodemember']").val();
                                    $.ajax({
                                        type: 'POST', // Metode pengiriman data menggunakan POST
                                        url: 'addjs/addnamaakun.php', // File yang akan memproses data
                                        data: 'noakun=' + noakun + '&kodemember=' + kodemember, // Data yang akan dikirim ke file pemroses
                                        success: function(response) { // Jika berhasil
                                            $('#namaakun').html(response); // Berikan hasil ke id kota
                                        }
                                    });
                                });
                                
                            });

                        </script>

                        <div class="row ">
                            
                                
                            <?php if (isset($_GET["id"])) : ?>
                            <?php 
                                $idepo =  $_GET["id"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM validasi WHERE id  = '$idepo'");
                                $depo = mysqli_fetch_array($cekDps);
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                                $namaakun = $depo['nama'];
                            ?>
                                <?php if (isset($_GET["saku"])) : ?>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Deposit</strong> Akun Trading by Saku
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
                                                <input type="hidden" id="kodemember" name="kodemember" class="form-control" placeholder="" 
                                                value="<?= $kodemember; ?>" 
                                                readonly="">
                                               <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Broker</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="broker" name="broker" value="<?= ucwords($broker) ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">No Akun</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                         <input type="text" name="noakun" id="noakun" value="<?= $noakun ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Nama Akun</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                         <input type="text" name="namaakun" id="namaakun" value="<?= ucwords($namaakun) ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Saku Rp.</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" class="form-control" required="" value="<?= number_format($saku)  ?>" readonly="">
                                                        <small class="form-text text-muted">Balance Saku Anda</small>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Jumlah Deposit</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="jumlahdeposit" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                        <small class="form-text text-muted">Isikan angka saja (Rupiah)</small>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="depositsaku">
                                                        <i class="fa fa-dot-circle-o"></i> Deposit by Saku
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
                                            <strong>Deposit</strong> Akun Trading
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
                                                <input type="hidden" id="kodemember" name="kodemember" class="form-control" placeholder="" 
                                                value="<?= $kodemember; ?>" 
                                                readonly="">
                                               <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Broker</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="broker" name="broker" value="<?= ucwords($broker) ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">No Akun</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                         <input type="text" name="noakun" id="noakun" value="<?= ucwords($noakun) ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Nama Akun</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                         <input type="text" name="namaakun" id="namaakun" value="<?= ucwords($namaakun) ?>" class="form-control" required="" readonly>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="select" class=" form-control-label">Bank</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <select name="bank" id="select" class="form-control">
                                                            <option >Pilih Bank</option>
                                                            <option value="bca">BCA</option>
                                                            <option value="bni">BNI</option>
                                                            <option value="bri">BRI</option>
                                                            <option value="mandiri">MANDIRI</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Jumlah Deposit</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="jumlahdeposit" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                        <small class="form-text text-muted">Isikan angka saja (USD)</small>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="deposit">
                                                        <i class="fa fa-dot-circle-o"></i> Deposit
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

                            <?php elseif (isset($_GET["saku"])) : ?>
                            <?php 
                                $idepo =  $_GET["saku"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM validasi WHERE id  = '$idepo'");
                                $depo = mysqli_fetch_array($cekDps);
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                            ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Deposit</strong> Akun Trading by Saku
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
                                            <input type="hidden" id="kodemember" name="kodemember" class="form-control" placeholder="" 
                                            value="<?= $kodemember; ?>" 
                                            readonly="">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Broker</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="broker" id="broker" class="form-control">
                                                        <option >Pilih Broker</option>
                                                        
                                                        <option value="firewoodfx">FirewoodFX</option>
                                                        <option value="insta forex">Insta Forex</option>
                                                        <option value="tickmill">Tickmill</option>
                                                        <option value="xm">XM</option>
                                                        <!-- <option value="binary">Binary</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">No Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="noakun" id="noakun" class="form-control">
                                                        <option ></option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Nama Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="namaakun" id="namaakun" class="form-control">
                                                        <option ></option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Saku Rp.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" class="form-control" required="" value="<?= number_format($saku)  ?>" readonly="">
                                                    <small class="form-text text-muted">Balance Saku Anda</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jumlah Deposit</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="jumlahdeposit" placeholder="" class="form-control" required=" onkeypress="return hanyaAngka(event)"">
                                                    <small class="form-text text-muted">Isikan angka saja (Rupiah)</small>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="depositsaku">
                                                    <i class="fa fa-dot-circle-o"></i> Deposit by Saku
                                                </button>
                                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button> -->
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?php elseif (isset($_SESSION['email'])) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Deposit</strong> Akun Trading
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
                                            <input type="hidden" id="kodemember" name="kodemember" class="form-control" placeholder="" 
                                            value="<?= $kodemember; ?>" 
                                            readonly="">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Broker</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="broker" id="broker" class="form-control">
                                                        <option >Pilih Broker</option>
                                                        
                                                        <option value="firewoodfx">FirewoodFX</option>
                                                        <option value="insta forex">Insta Forex</option>
                                                        <option value="tickmill">Tickmill</option>
                                                        <option value="xm">XM</option>
                                                        <!-- <option value="binary">Binary</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">No Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="noakun" id="noakun" class="form-control">
                                                        <option ></option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Nama Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="namaakun" id="namaakun" class="form-control">
                                                        <option ></option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Bank</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="bank" id="select" class="form-control">
                                                        <option >Pilih Bank</option>
                                                        <option value="bca">BCA</option>
                                                        <option value="bni">BNI</option>
                                                        <option value="bri">BRI</option>
                                                        <option value="mandiri">MANDIRI</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jumlah Deposit</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="jumlahdeposit" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                    <small class="form-text text-muted">Isikan angka saja (USD)</small>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="deposit">
                                                    <i class="fa fa-dot-circle-o"></i> Deposit
                                                </button>
                                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Reset
                                                </button> -->
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?php else  : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Deposit</strong> Akun Trading
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
                                                    <small class="form-text text-muted">Masukkan email yang sudah terdaftar</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Broker</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="broker" id="broker" class="form-control">
                                                        <option >Pilih Broker</option>
                                                        
                                                        <option value="firewoodfx">FirewoodFX</option>
                                                        <option value="insta forex">Insta Forex</option>
                                                        <option value="tickmill">Tickmill</option>
                                                        <option value="xm">XM</option>
                                                        <!-- <option value="binary">Binary</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">No Akun</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="noakun" name="noakun" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                    <small class="form-text text-muted">Masukkan no akun yang sudah di validasi</small>
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Bank</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="bank" id="select" class="form-control">
                                                        <option >Pilih Bank</option>
                                                        <option value="bca">BCA</option>
                                                        <option value="bni">BNI</option>
                                                        <option value="bri">BRI</option>
                                                        <option value="mandiri">MANDIRI</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jumlah Deposit</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="jumlahdeposit" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                                    <small class="form-text text-muted">Isikan angka saja (USD)</small>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm" name="deposit">
                                                    <i class="fa fa-dot-circle-o"></i> Deposit
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


                            <div class="col-lg-6">
                                
                                
                                <div class="overview-wrap">
                                    <h4 class="title-1">Kurs Dollar</h4>
                                    
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-data3">
                                        <thead>

                                            <tr>
                                                <th>Broker</th>
                                                <th class="text-right">Deposit</th>
                                                <th class="text-right">Withdrawal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($rate as $row ) : ?> 

                                            <tr>
                                                <?php if ($row["broker"]==="xm" OR $row["broker"]==="fbs") : ?>
                                                <td><?= "<b>" . strtoupper($row["broker"]) . " </b>" ?></td>
                                                <?php else: ?>
                                                <td><?= "<b>" . ucwords($row["broker"]) . " </b>" ?></td>
                                                <?php endif; ?>

                                                <td class="text-right">Rp. <?= "<b>" . number_format($row["deposit"]) . " </b>" ?></td>
                                                <td class="text-right">Rp. <?= "<b>" . number_format($row["withdrawal"]) . " </b>" ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <strong class="card-title text-light">Bank Transfer Warung Broker</strong>
                                    </div>
                                    <div class="card-body text-white bg-primary">
                                        <table >
                                            <tr class="" style="color: white;">
                                                <td>
                                                    <img class="" src="images/bca.png" style="width: 75px;">
                                                </td>
                                                <td>
                                                    <p class=""> 088.608.8986</p>
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-secondary">Margareth Lindsay Y.</span></h4>
                                                </td>
                                            </tr>
                                            <tr class="" style="color: white;">
                                                <td>
                                                    <img class="m-b-5 m-r-15" src="images/bni.png" style="width: 75px;">
                                                </td>
                                                <td>
                                                    <p class="m-r-15">063.021.5090</p>
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-secondary">Margareth Lindsay Y.</span></h4>
                                                </td>
                                            </tr>
                                            
                                            <tr class="" style="color: white;">
                                                <td>
                                                    <img class="m-b-5 m-r-15" src="images/mandiri.png" style="width: 75px;">
                                                </td>
                                                <td>
                                                    <p class="m-r-15">142.000.247.7999</p>
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-secondary">Margareth Lindsay Y.</span></h4>
                                                </td>
                                            </tr>
                                            <tr class="" style="color: white;">
                                                <td>
                                                    <img class="m-b-5 m-r-15" src="images/bri.png" style="width: 75px;">
                                                </td>
                                                <td>
                                                    <p class="m-r-15">0412.0100.1323.565</p>
                                                </td>
                                                <td>
                                                    <h4><span class="badge badge-secondary">Melissa Vincentia J.</span></h4>
                                                </td>
                                            </tr>
                                        </table>
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
