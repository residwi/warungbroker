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
    if (isset($_GET["b"])){
        $brok =  $_GET["b"];

    }
    $broker = query("SELECT * FROM broker WHERE nama_broker = '$brok'") [0];
    $metatrader = query("SELECT * FROM metatrader WHERE nama_broker = '$brok'") [0];
    $spekbroker = query("SELECT * FROM spekbroker WHERE nama_broker = '$brok'");

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
                    <div class="container-fluid"> -->
                        
                            <div class="col-md-12">
                                 <div class="card">
                                    <div class="card-header bg-secondary">
                                        <?php if ($brok === "fbs") {
                                            $namalengkapbroker = "Finance Freedom Success";
                                            }elseif ($brok === "firewoodfx") {
                                            $namalengkapbroker = "Firewoodfx";
                                            }elseif ($brok === "insta forex") {
                                            $namalengkapbroker = "Insta Forex";
                                            }elseif ($brok === "tickmill") {
                                            $namalengkapbroker = "Tickmill";
                                            }elseif ($brok === "xm") {
                                            $namalengkapbroker = "XM";
                                            }elseif ($brok === "tifia") {
                                            $namalengkapbroker = "TIFIA";
                                            }elseif ($brok === "just forex") {
                                            $namalengkapbroker = "Just Forex";
                                            }elseif ($brok === "weltrade") {
                                            $namalengkapbroker = "Weltrade";
                                            }elseif ($brok === "octafx") {
                                            $namalengkapbroker = "Octa FX";
                                            }
                                        ?>
                                        <strong class="card-title text-light"><?=  $namalengkapbroker ?></strong>
                                    </div>
                                    <div class="card-body text-white bg-<?= $broker['warnadasar']?>">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <!-- <div class="card"> -->
                                                    <img class="card-img-top" src="images/broker/<?= $broker['logokecil']?>" style="width: 100%;" alt="logobroker">
                                                    
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-10">
                                                
                                                    <p><?= $broker['deskripsi']?></p>
                                                    <a href="<?= $broker['link']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Buka Akun Real</button></a>
                                                
                                            </div>
                                        </div>
                                        <br>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tipe Akun</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Spesifikasi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Platform Trading</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content pl-3 p-1" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                
                                                <?php 
                                                    if ($brok === "fbs") {
                                                        require 'include/akunfbs.php'; 
                                                    }elseif ($brok === "firewoodfx") {
                                                        require 'include/akunfirewoodfx.php'; 
                                                    }elseif ($brok === "insta forex") {
                                                        require 'include/akuninstaforex.php'; 
                                                    }elseif ($brok === "tickmill") {
                                                        require 'include/akuntickmill.php'; 
                                                    }elseif ($brok === "xm") {
                                                        require 'include/akunxm.php'; 
                                                    }elseif ($brok === "tifia") {
                                                        require 'include/akuntifia.php'; 
                                                    }elseif ($brok === "just forex") {
                                                        require 'include/akunjustforex.php'; 
                                                    }elseif ($brok === "weltrade") {
                                                        require 'include/akunweltrade.php'; 
                                                    }elseif ($brok === "octafx") {
                                                        require 'include/akunoctafx.php'; 
                                                    }
                                                ?>
                                                
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($spekbroker as $row ) : ?>
                                                    <?php 
                                                        $tampil=mysqli_query($conn, "SELECT * FROM spekbroker WHERE nama_broker = '$brok'");
                                                        $jml=mysqli_num_rows($tampil);
                                                        if ($jml > 4) {
                                                            $kolom = 4;
                                                        }else{$kolom = 6;}

                                                    ?>
                                                    <div class="col-md-<?= $kolom ?>">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light"><?= $row['judulspek'] ?></strong>
                                                            </div>
                                                            <div class="card-body text-white bg-<?= $broker['warnadasar']?>">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light"><?= $row['itemspek'] ?>
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row">
                                                    <?php if ($metatrader['linkmtmac'] != "") : ?>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 for PC</strong>
                                                        </div>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarpc']?>" alt="metatrader">
                                                            <a href="<?= $metatrader['linkmt4']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">MT4 for Windows</button></a>
                                                            <a href="<?= $metatrader['linkmtmac']  ?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">MT4 for OS X</button></a>
                                                        </div>
                                                    </div>    
                                                    <?php else : ?>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 for PC</strong>
                                                        </div>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarpc']?>" alt="metatrader">
                                                            <a href="<?= $metatrader['linkmt4']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Download MT4</button></a>

                                                            <?php if ($metatrader['linkmt5'] != "") : ?>
                                                            <a href="<?= $metatrader['linkmt5']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Download MT5</button></a>
                                                            <?php endif ; ?>
                                                        </div>
                                                    </div>
                                                    <?php endif ; ?>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 For Android</strong>
                                                        </div>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarandroid']?>" alt="metatrader android">
                                                            <a href="<?= $metatrader['linkandroid']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 For Apple</strong>
                                                        </div>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarapple']?>" alt="metatrader apple">
                                                            <a href="<?= $metatrader['linkapple']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                    <?php if ($metatrader['linkmultimt'] != "") : ?>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MetaTrader MultiTerminal</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarmultimt']?>" alt="metatrader multiterminal">
                                                            <a href="<?= $metatrader['linkmultimt']?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                    <?php endif ; ?>
                                                    <?php if ($metatrader['linkweb'] != "") : ?>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">Web MetaTrader</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/<?= $metatrader['gambarweb']?>" alt="Card image cap">
                                                            <a href="<?= $metatrader['linkweb']  ?>"  target="_blank"><button type="button" class="btn btn-<?= $broker['warnadasar']?> btn-lg btn-block">Akses MT4 Web</button></a>
                                                        </div>
                                                    </div>
                                                    <?php endif ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            
                            
                        

                        
                    <!-- </div>
                </div> -->
                
            </div><!-- END MAIN CONTENT-->
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->
        
    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
