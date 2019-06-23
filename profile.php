<?php 
session_start();
    if (!isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }else{
        
        require 'include/fungsi.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
        $akun = query("SELECT * FROM validasi WHERE kode_member = '$kodemember'") ;
        $bank = query("SELECT * FROM bank WHERE kode_member = '$kodemember'") ;
        $affiliasi = query("SELECT * FROM member WHERE aff = '$aff'") ;
        $affakun = query("SELECT * FROM validasi WHERE aff = '$aff'") ;

        $rb = query("SELECT * FROM rebate WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1")[0];
        $srb = $rb['saldo'];

        $rk = query("SELECT * FROM komisi WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1")[0];
        $srk = $rk['saldo'];

        $sk = query("SELECT * FROM saku WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1")[0];
        $saku = $sk['saldo'];
        $kodesaku = $sk['kodesaku'];
        
    }
    $juhal = "broker";
// kkd = Klaim rebate ke dompet
if( isset($_POST["klaimrebate"]) ) {
    

    $tangg = ($_POST["tang"]);
    $tang = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurd = htmlspecialchars($_POST["jurd"]);    
    $asalklaim = "rebate";
    
    if($srb < 1){
      echo "<script>
                alert('Dana rebate anda kosong');
                document.location.href = 'profile';                
            </script>";
        return false;
        }

    
    $saldorebate = $srb-$jurd;

    //query insert data
    $queryy = "INSERT INTO rebate
    VALUES 
    ('','$kodemember','$email','$tang','$jam','klaim saku','0','0','0','$jurd','$saldorebate') 
    ";
    mysqli_query($conn, $queryy); 

    $saldosaku = $saku + $jurd;
    //query insert data
    $querys = "INSERT INTO saku
    VALUES 
    ('','$kodemember','$email','$kodesaku','$tang','$jam','rebate','$jurd','0','$saldosaku') 
    ";
    mysqli_query($conn, $querys);

    //cek apakh data berhasil di tambahkan
    if( mysqli_affected_rows($conn) > 0 ) {
        echo "
        <script>
            alert('Klaim rebate ke saku berhasil');
            document.location.href = 'profile';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('klaim rebate gagal');
            document.location.href = 'profile';
        </script>
        ";
    }
    
}    

// kkd = Klaim rebate ke dompet
if( isset($_POST["klaimkomisi"]) ) {
    

    $tangg = ($_POST["tang"]);
    $tang = date('Y-m-d',strtotime($tangg));
    $jam = ($_POST["jam"]);
    $email = htmlspecialchars($_POST["email"]);
    $jurk = htmlspecialchars($_POST["jurk"]);    
    $asalklaim = "komisi";
    
    if($srk < 1){
      echo "<script>
                alert('Dana Komisi Anda Kosong');
                document.location.href = 'profile';                
            </script>";
        return false;
        }

    
    $saldokomisi = $srk-$jurk;

    //query insert data
    $queryy = "INSERT INTO komisi
    VALUES 
    ('','$kodemember','$email','$tang','$jam','klaim saku','0','0','$jurk','$saldokomisi') 
    ";
    mysqli_query($conn, $queryy); 

    $saldosaku = $saku + $jurk;
    //query insert data
    $querys = "INSERT INTO saku
    VALUES 
    ('','$kodemember','$email','$kodesaku','$tang','$jam','komisi','$jurk','0','$saldosaku') 
    ";
    mysqli_query($conn, $querys);

    //cek apakh data berhasil di tambahkan
    if( mysqli_affected_rows($conn) > 0 ) {
        echo "
        <script>
            alert('Klaim Komisi ke saku berhasil');
            document.location.href = 'profile';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('klaim komisi gagal');
            document.location.href = 'profile';
        </script>
        ";
    }
    
}   

if( isset($_POST["foto"]) ) {
    

    //cek apakh data berhasil di tambahkan
    if( postfoto($_POST) > 0 ) {
        echo "          
            <script>
                alert('update foto berhasil');
                document.location.href = 'profile';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('update foto gagal');
                document.location.href = 'profile';
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
                        
                        <div class="row ">
                            <div class="col-md-3">
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-primary">
                                            <div class="media">
                                                
                                                <div class="media-body">
                                                    <span class="badge badge-light"><p>Deposit</p></span>
                                                    <?php 
                                                        $tampil=mysqli_query($conn, "SELECT * FROM deposit WHERE email = '".$_SESSION['email']."'");
                                                        $jml=mysqli_num_rows($tampil);
                                                    ?>
                                                    <?php if ($jml > 0) : ?>
                                                    <?php 
                                                        $jumlahd = "SELECT SUM(total) AS total_d FROM deposit WHERE email = '".$email."' AND status = 2"; //perintah untuk menjumlahkan
                                                        $hasild = mysqli_query($conn, $jumlahd) ;//melakukan query dengan varibel $jumlahkan
                                                        $td = mysqli_fetch_array($hasild); //menyimpan hasil query ke variabel $t
                                                        $gtd = $td['total_d'];
                                                    ?>
                                                    <h3 class="text-light display-6">Rp.  <?= number_format($gtd) ;  ?></h3>
                                                    <?php else : ?>
                                                    <h3 class="text-light display-6">Rp.  0</h3>
                                                    <?php endif ; ?>
                                                    
                                                </div>

                                            </div>

                                        </div>
                                        <!-- <a class="btn btn-outline-primary" href="history.php?deposit" target="_blank">Detail</a> -->


                                        
                                    </section>
                                </aside>
                            </div>
                            <div class="col-md-3">
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-success">
                                            <div class="media">
                                                
                                                <div class="media-body">
                                                    <span class="badge badge-light"><p>Withdrawal</p></span>
                                                    <?php 
                                                        $tampil=mysqli_query($conn, "SELECT * FROM withdraw WHERE email = '".$_SESSION['email']."'");
                                                        $jml=mysqli_num_rows($tampil);
                                                    ?>
                                                    <?php if ($jml > 0) : ?>
                                                    <?php 
                                                        $jumlahw = "SELECT SUM(total) AS total_w FROM withdraw WHERE email = '".$email."' AND status = 2"; //perintah untuk menjumlahkan
                                                        $hasilw = mysqli_query($conn, $jumlahw) ;//melakukan query dengan varibel $jumlahkan
                                                        $tw = mysqli_fetch_array($hasilw); //menyimpan hasil query ke variabel $t
                                                        $gtw = $tw['total_w'];
                                                    ?>
                                                    <h3 class="text-light display-6">Rp.  <?= number_format($gtw) ;  ?></h3>
                                                    <?php else : ?>
                                                    <h3 class="text-light display-6">Rp.  0</h3>
                                                    <?php endif ; ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                         <a class="btn btn-outline-success" href="history.php?withdrawal" target="_blank">Detail</a> 

                                        
                                    </section>
                                </aside>
                            </div>
                            <div class="col-md-3">
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-info">
                                            <div class="media">
                                                
                                                <div class="media-body">
                                                    <form action="" method="post">
                                                    <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                                        echo $date->format('Y-m-d'); ?>" 
                                                                readonly="">
                                                    <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                                        echo $date->format('H:i:s'); ?>" 
                                                                readonly="">
                                                    <input type="hidden" class="form-control" name="email" id="email" value="<?= $email ?>" readonly="">
                                                    <input type="hidden" class="form-control"  name="jurk" id="jurk" value="<?= $srk ?>" readonly="" >

                                                    <!--<button type="submit" class="btn btn-success btn-sm" name="klaimkomisi"><span class="badge badge-light"><p>Klaim</p></span></button>-->
                                                    <span class="badge badge-light"><p>Komisi</p></span>
                                                    </a>

                                                    </form>
                                                    <?php 
                                                        $tampil=mysqli_query($conn, "SELECT * FROM komisi WHERE email = '".$_SESSION['email']."'");
                                                        $jml=mysqli_num_rows($tampil);
                                                    ?>
                                                    <?php if ($jml > 0) : ?>
                                                    <?php $komisi = query("SELECT * FROM komisi WHERE email = '".$_SESSION['email']."' ORDER BY id DESC LIMIT 1") [0]; ?>
                                                    <h3 class="text-light display-6">Rp.  <?= number_format($komisi['saldo'])  ?></h3>
                                                    <?php else : ?>
                                                    <h3 class="text-light display-6">Rp.  0</h3>
                                                    <?php endif ; ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-outline-info" href="history.php?komisi" target="_blank">Detail</a>

                                        
                                    </section>
                                </aside>
                            </div>
                            <div class="col-md-3">
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-secondary">
                                            <div class="media">
                                                
                                                <div class="media-body">
                                                    <form action="" method="post">
                                                    <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                                        echo $date->format('Y-m-d'); ?>" 
                                                                readonly="">
                                                    <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                                                        echo $date->format('H:i:s'); ?>" 
                                                                readonly="">
                                                    <input type="hidden" class="form-control" name="email" id="email" value="<?= $email ?>" readonly="">
                                                    <input type="hidden" class="form-control"  name="jurd" id="jurd" value="<?= $srb ?>" readonly="" >
                                                    
                                                    <!--<button type="submit" class="btn btn-success btn-sm" name="klaimrebate"><span class="badge badge-light"><p>Klaim</p></span></button>-->
                                                    
                                                    <span class="badge badge-light"><p>Rebate</p></span>
                                                    
                                                    </form>
                                                    <?php 
                                                        $tampil=mysqli_query($conn, "SELECT * FROM data_fbs WHERE email = '".$_SESSION['email']."'");
                                                        $jml=mysqli_num_rows($tampil);
                                                    ?>
                                                    <?php if ($jml > 0) : ?>
                                                    <?php $rebate = query("SELECT SUM(rebate_rupiah) AS total FROM data_fbs WHERE email = '".$_SESSION['email']."' and status=3 ") [0]; ?>
                                                    <h3 class="text-light display-6">Rp.  <?= number_format($rebate['total'])  ?></h3>
                                                    <?php else : ?>
                                                    <h3 class="text-light display-6">Rp.  0</h3>
                                                    <?php endif ; ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <a class="btn btn-outline-secondary" href="history.php?rebate" target="_blank">Detail</a>
                                        
                                        
                                    </section>
                                </aside>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Profile</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"> Email</i>
                                                    </div>
                                                    <input type="text" placeholder="" class="form-control" value="<?= $email  ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-link"> Affiliasi</i>
                                                    </div>
                                                    <input type="text" placeholder="" class="form-control" value="http://warungbroker.com/reg.php?reg=<?= $user['username_member']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"> Nama</i>
                                                    </div>
                                                    <input type="text" id="username" name="username" value="<?= $profile['nama']  ?>" class="form-control" readonly="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-mobile"> No Telp</i>
                                                    </div>
                                                    <input type="text" class="form-control" value="<?= $profile['hp']  ?>" readonly="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-home"> Alamat</i>
                                                    </div>
                                                    <textarea type="text" class="form-control" readonly=""><?= $profile['alamat']  ?></textarea> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions form-group">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateprofile">Update Profile</button>
                                                <!-- <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#editprofile">
                                            Small
                                        </button> -->
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php 
                                                    $tampil=mysqli_query($conn, "SELECT * FROM saku WHERE email = '".$_SESSION['email']."'");
                                                    $jml=mysqli_num_rows($tampil);
                                                ?>
                                                <?php if ($jml > 0) : ?>
                                                <?php $saku = query("SELECT * FROM saku WHERE email = '".$_SESSION['email']."' ORDER BY id DESC LIMIT 1") [0]; ?>
                                                <h2>Rp. <?= number_format($saku['saldo'])  ?></h2>
                                                <?php else : ?>
                                                <h2>Rp. 0</h2>
                                                <?php endif ; ?>
                                                <span>Saku</span>
                                            </div>
                                            
                                            <a class="nav-link dropdown-toggle float-right mt-1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Transaksi
                                                    <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="withdrawal.php?saku=<?= $kodesaku ?>">Withdrawal ke Bank</a>
                                                    <a class="dropdown-item" href="deposit.php?saku=<?= $kodesaku ?>">Deposit ke Akun</a>
                                                    
                                                </div>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Data Bank</strong>
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small float-right mt-1" data-toggle="modal" data-target="#tambahbank">
                                                        <i class="zmdi zmdi-plus"></i>Tambah Data Bank</button>    
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Nama </th>
                                                            <th>No Rekening</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bank as $row ) : ?>
                                                        <tr>
                                                            <!-- <td><?= $i  ?></td> -->
                                                            
                                                            <td><?= $row['nama']  ?></td>
                                                            <?php if ($row['bank'] != "mandiri" ) : ?>
                                                            <td><?= strtoupper($row['bank'])."  : ".$row['norek']  ?>    <a href="add/hapusbank.php?id=<?= $row["id"] ?>"> <span class="badge badge-pill badge-danger">Hapus</span></i></td>
                                                            <?php else : ?>
                                                            <td><?= ucwords($row['bank'])."  : ".$row['norek']  ?>    <a href="add/hapusbank.php?id=<?= $row["id"] ?>"> <span class="badge badge-pill badge-danger">Hapus</span></i></td>
                                                            <?php endif ; ?>
                                                        </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                                <!-- <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>1,086</h2>
                                                <span>this week</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div> -->
                            </div> 
                        </div>

                        

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Data Akun Trading</strong>
                                            <small>
                                                <!-- <span class="badge badge-success float-right mt-1">Success</span> -->
                                                <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small float-right mt-1" data-toggle="modal" data-target="#tambahakun">
                                                        <i class="zmdi zmdi-plus"></i>Tambah Akun</button>
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Akun</th>
                                                            <th>Nomer Akun</th>
                                                            <th>Broker</th>
                                                            <th colspan="2">Transaksi</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($akun as $row ) : ?>
                                                        <tr>
                                                            <td><?= $i  ?></td>
                                                            <td><?= ucwords($row['nama'])  ?></td>
                                                            <td><?= $row['no_akun']  ?></td>
                                                            <?php if ($row['broker'] === "fbs" ) : ?>
                                                            <td ><?= strtoupper($row['broker'])  ?></td>
                                                            <?php elseif ($row['broker'] === "xm" ) : ?>
                                                            <td ><?= strtoupper($row['broker'])  ?></td>               
                                                            <?php else : ?>
                                                            <td ><?= ucwords($row['broker'])  ?></td>
                                                            <?php endif ; ?>


                                                            <?php if ($row['status'] === "2" ) : ?>
                                                            <td colspan="2">
                                                            <?php 
		                                                        $brok = $row["broker"];
		                                                        $item = "SELECT * FROM rate WHERE broker ='$brok'"; //perintah untuk menjumlahkan
		                                                        $hasili = mysqli_query($conn, $item) ;//melakukan query dengan varibel $jumlahkan
		                                                        $arrayi = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
		                                                        $status = $arrayi['status'];
		                                                    ?>
		                                                    <?php if ($status === "1" ) : ?>		
                                                            <a href="deposit.php?id=<?= $row["id"] ?>"> <span class="badge badge-pill badge-primary">Deposit</span></a> | 
                                                            <a href="withdrawal.php?id=<?= $row["id"] ?>"><span class="badge badge-pill badge-success">Withdrawal</span></a> 
                                                                <?php if ($sk['saldo'] >1 ) : ?>
                                                                
                                                                | 
                                                                <a href="deposit.php?id=<?= $row["id"] ?>&saku=<?= $row["kode_member"] ?>"><span class="badge badge-pill badge-info">Deposit by Saku</span></a>
                                                                <?php endif ; ?>
                                                            <?php else : ?>
                                                            	<span class="badge badge-pill badge-primary">Deposit / Witdrawal Langsung Ke Broker</span>
                                                            <?php endif ; ?>    	
                                                            </td>
                                                            <?php elseif ($row['status'] === "3" ) : ?>
                                                            <td><span class="badge badge-pill badge-danger">Status Akun : Tidak Terdaftar!</span></td>    
                                                            <?php elseif ($row['status'] === "1" ) : ?> : ?>
                                                            <td><span class="badge badge-pill badge-danger">Status Akun : Checking!</span></td>
                                                            <?php endif ; ?>
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Data Refferal</strong>
                                            
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($affiliasi as $row ) : ?>
                                                        <tr>
                                                            <td><?= $i  ?></td>
                                                            <td><?= $row['username_member']  ?></td>
                                                            <td><?= $row['email_member']  ?></td>
                                                            
                                                        </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>    
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Data Akun Refferal</strong>
                                          
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>1</th> -->
                                                            <th>No Akun</th>
                                                            <th>Broker</th>
                                                            <th>Email</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($affakun as $row ) : ?>
                                                        <tr>
                                                            <!-- <td>1</td> -->
                                                            <td><?= substr($row['no_akun'], 0, -4) ?>xxxx</td>
                                                            <td><?= ucwords($row['broker'])  ?></td>
                                                            <td class="process"><?= $row['email']  ?></td>
                                                            
                                                        </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>    
                                                    </tbody>

                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>

                      

                        

                    </div>
                </div>
                
            </div><!-- END MAIN CONTENT-->
            <!-- modal small -->
            <div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Update Foto Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card-body card-block">
                                
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Pilih Foto</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary" name="foto">Update Foto</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal small -->
            <?php 
                if( isset($_POST["updateprofile"]) ) {
                    $kodemember = $user["kode_member"];
                    $nama = htmlspecialchars($_POST["nama"]);    
                    $hp = htmlspecialchars($_POST["hp"]);
                    $alamat = htmlspecialchars($_POST["alamat"]);

                    //query edit data
                    $query = "UPDATE profile SET 
                    nama = '$nama',
                    hp = '$hp',
                    alamat = '$alamat'                
                    WHERE kode_member = $kodemember
                    ";
                    mysqli_query($conn, $query);

                    //cek apakh data berhasil di tambahkan
                    if( mysqli_affected_rows($conn) > 0 ) {
                        echo "
                        <script>
                            alert('update profil berhasil');
                            document.location.href = 'profile';
                        </script>
                        ";
                    } else {
                        echo "
                        <script>
                            alert('update profil gagal');
                            document.location.href = 'profile';
                        </script>
                        ";
                    }

                }
             ?>
            <!-- modal small -->
            <div class="modal fade" id="updateprofile" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Update Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="">
                        <div class="modal-body">
                            <div class="card-body card-block">
                                
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Nama</label>
                                        <input type="text" id="nama" name="nama"  class="form-control" value="<?= $profile['nama']  ?>">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password" class=" form-control-label">No Telp</label>
                                        <input type="text" id="hp" name="hp" class="form-control" value="<?= $profile['hp']  ?>" onkeypress="return hanyaAngka(event)">
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password" class=" form-control-label">Alamat</label>
                                        <textarea type="text" id="alamat" name="alamat" class="form-control" ><?= $profile['alamat']  ?></textarea>
                                    </div>
                                    
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-primary" name="updateprofile">Update Profile</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal small -->

            <?php 
                if( isset($_POST["tambahakun"]) ) {
                    $tangg = ($_POST["tang"]);
                    $tanggal = date('Y-m-d',strtotime($tangg));
                    $jam = ($_POST["jam"]);
                    $email = $user["email_member"];
                    $kodemember = $user["kode_member"];
                    $nama = htmlspecialchars($_POST["namaakun"]);
                    $broker = strtolower(stripcslashes($_POST["broker"]));
                    $no_akun = htmlspecialchars($_POST["nomorakun"]);
                    $aff = $user["aff"];
                    $status = 1;

                    //cek no akun sudah ada atau belum
                     $cekakun = mysqli_query($conn, "SELECT no_akun FROM validasi WHERE no_akun = '$no_akun'");
                     if (mysqli_fetch_assoc($cekakun)) {
                         echo "<script>
                                 alert('no akun sudah terdaftar');
                                document.location.href = 'profile.php';    
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
                        
                        
                    echo "
                        <script>   
                            alert('tambah akun berhasil');             
                            document.location.href ='profile';           
                        </script>
                        ";

                        
                    } else {
                        echo "
                            <script> 
                                alert('tambah akun gagal');
                                document.location.href = 'profile';                
                            </script>
                            ";
                    }
                }
            ?>

            <!-- modal small -->
            <div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Tambah Akun Trading</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="">
                        <div class="modal-body">
                            <div class="card-body card-block">
                                <input type="hidden" id="tang" name="tang" class="form-control" placeholder="" 
                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                        echo $date->format('Y-m-d'); ?>" 
                                readonly="">
                                <input type="hidden" id="jam" name="jam" class="form-control" placeholder="" 
                                value="<?php date_default_timezone_set('Asia/Jakarta'); $date = new DateTime();
                                        echo $date->format('H:i:s'); ?>" 
                                readonly="">   
                                
                                <div class="form-group">
                                    <label for="nf-email" class=" form-control-label">Broker</label>
                                    <select name="broker" id="broker" class="form-control">
                                        <option >Pilih Broker</option>
                                        <option value="fbs">FBS</option>
                                        <option value="firewoodfx">FirewoodFX</option>
                                        <option value="insta forex">Insta Forex</option>
                                        <option value="just forex">Just Forex</option>
                                        <option value="octafx">Octa FX</option>
                                        <option value="tickmill">Tickmill</option>
                                        <!-- <option value="tifia">Tifia</option> -->
                                        <option value="xm">XM</option>
                                        <option value="weltrade">Weltrade</option>
                                        <!-- <option value="binary">Binary</option> -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nf-password" class=" form-control-label">Nama Akun Trading</label>
                                    <input type="text" id="text-input" name="namaakun" placeholder="" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label for="nf-password" class=" form-control-label">No Akun Trading</label>
                                    <input type="text" id="text-input" name="nomorakun" placeholder="" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambahakun">Tambah Akun</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal small -->

            <?php 
                if( isset($_POST["tambahbank"]) ) {
                    $kodemember = $user["kode_member"];
                    $email = $user["email_member"];
                    $nama = htmlspecialchars($_POST["namarek"]);    
                    $bank = htmlspecialchars($_POST["bank"]);
                    $norek = htmlspecialchars($_POST["norek"]);

                     $query = "INSERT INTO bank
                                VALUES 
                                ('','$kodemember','$email','$nama','$bank','$norek') 
                            ";
                    mysqli_query($conn, $query);

                    //cek apakh data berhasil di tambahkan
                    if( mysqli_affected_rows($conn) > 0 ) {
                        echo "
                        <script>
                            alert('tambah data bank berhasil');
                            document.location.href = 'profile';
                        </script>
                        ";
                    } else {
                        echo "
                        <script>
                            alert('tambah data bank gagal');
                            document.location.href = 'profile';
                        </script>
                        ";
                    }

                }
             ?>
            <!-- modal small -->
            <div class="modal fade" id="tambahbank" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Tambah Data Bank</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post" class="">
                        <div class="modal-body">
                            <div class="card-body card-block">
                                
                                    <div class="form-group">
                                        <label for="nf-email" class=" form-control-label">Bank</label>
                                        <select name="bank" id="select" class="form-control">
                                            <option >Pilih Bank</option>
                                            <option value="bca">BCA</option>
                                            <option value="bni">BNI</option>
                                            <option value="bri">BRI</option>
                                            <option value="mandiri">MANDIRI</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password" class=" form-control-label">Nama Rekening</label>
                                        <input type="text" id="namarek" name="namarek"  class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password" class=" form-control-label">No Rekening</label>
                                        <input type="text" id="norek" name="norek" class="form-control" required="" onkeypress="return hanyaAngka(event)">
                                    </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambahbank">Tambah Data Bank</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end modal small -->
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->

    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
