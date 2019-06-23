<?php 
session_start();
    if (!isset($_SESSION['email'])) {
        require 'include/fungsi.php';
        require 'include/header.php';    
        $kontes = query("SELECT * FROM kontes ORDER BY id DESC ");    
    // header("location:index"); // jika belum login, maka dikembalikan ke index
    
    }else{
        require 'include/fungsi.php';
        require 'include/header.php';
        require 'include/fungsi.php';
        require 'include/header.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
        $kontes = query("SELECT * FROM kontes ORDER BY id DESC LIMIT 4");
    }

    $juhal = "kontes";
// kkd = Klaim rebate ke dompet

  

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
                        
                        

                        

                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <blockquote class="blockquote mt-3 text-left">
                                            <h3 class="pb-2 display-5">Pemenang Kontes Rebate Mingguan Broker XM</h3>
                                            
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                                <?php foreach ($kontes as $row ) : ?>
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Periode <?= $row['periode']  ?></strong>
                                            <small>
                                                <!-- <span class="badge badge-success float-right mt-1">Success</span> -->
                                                <!-- <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small float-right mt-1" data-toggle="modal" data-target="#tambahakun">
                                                        <i class="zmdi zmdi-plus"></i>Tambah Akun</button> -->
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>Juara</th>
                                                            <th>Akun</th>
                                                            <th>Rebate</th>
                                                            
                                                            <th colspan="2">Email</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td><?= substr($row['j1'], 0, -4) ?>xxxx</td>
                                                            <td>$ <?= $row['r1'] ?></td>
                                                            
                                                            <td>xxxxxx<?=  substr($row['e1'],  6) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td><?= substr($row['j2'], 0, -4) ?>xxxx</td>
                                                            <td>$ <?= $row['r2'] ?></td>
                                                            
                                                            <td>xxxxxx<?=  substr($row['e2'],  6) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td><?= substr($row['j3'], 0, -4) ?>xxxx</td>
                                                            <td>$ <?= $row['r3'] ?></td>
                                                            
                                                            <td>xxxxxx<?=  substr($row['e3'],  6) ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            

                            <div class="col-lg-4">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            Hadiah</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <div class="row">
                                                <div class="col-2">
                                                    <!-- <p class="float-right mt-1">1</p>
                                                    <p class="float-right mt-1">2</p> -->
                                                </div>
                                                

                                                <div class="col-10">
                                                    <ol>
                                                    <a>Juara 1 : 30 USD</a>
                                                    <a>Juara 2 : 20 USD</a>
                                                    <a>Juara 3 : 10 USD</a>

                                                </ol>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            Syarat & Kondisi</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <div class="row">
                                                <!-- div class="col-2">
                                                    <p class="float-right mt-1">1</p>
                                                    <p class="float-right mt-1">2</p>
                                                </div> -->
                                                <ol>
                                                    <li><p>Akun yang mengikuti kontes adalah akun yang terdaftar dalam affiliasi warungbroker.com</p></li>
                                                    <li><p>Akun yg di konteskan adalah akun trading broker XM dengan minimal $50</p></li>
                                                    <li><p>Rebate yang diberikan adalah tetap rebate MAXIMAL dari xm</p></li>
                                                    <li><p>Kontes dilakukan rutin dalam periode Mingguan dan ditutup pada setiap hari sabtu jam 07.00 WI</p></li>
                                                    <li><p>Hadiah akan kami kirimkan sesuai dengan metode pembayaran akun rebate yang dipilih oleh akun bersangkutan</p></li>
                                                    
                                                </ol>

                                                <!-- <div class="col-12">
                                                    <p>Akun yang mengikuti kontes adalah akun yang terdaftar dalam affiliasi warungbroker.com</p>
                                                    <p>2. Akun yg di konteskan adalah akun trading broker XM dengan minimal $50</p>
                                                </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        
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
                                        <option value="tickmill">Tickmill</option>
                                        <option value="tifia">Tifia</option>
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
