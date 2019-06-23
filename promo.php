<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

 if (!isset($_SESSION['email'])) {
        require 'include/fungsi.php';
        require 'include/header.php';        
    // header("location:index"); // jika belum login, maka dikembalikan ke index
        $artikel = query("SELECT * FROM promo ");
    }else{
        require 'include/fungsi.php';
        require 'include/header.php';
        $artikel = query("SELECT * FROM promo ");
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
    }

    $juhal = "artikel";
 ?>

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
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="brokers.php?b=fbs" > <img class="card-img-top" src="images/broker/fbs.jpg" alt="fbs"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="brokers.php?b=firewoodfx" ><img class="card-img-top" src="images/broker/firewoodfx.jpg" alt="firewoodfx"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">Firewoodfx</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="brokers.php?b=insta forex" > <img class="card-img-top" src="images/broker/insta.jpg" alt="insta forex"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="brokers.php?b=tickmill" ><img class="card-img-top" src="images/broker/tickmill.jpg" alt="tickmill"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">Firewoodfx</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="brokers.php?b=xm" > <img class="card-img-top" src="images/broker/xm.jpg" alt="xm"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <a href="binary"><img class="card-img-top" src="images/broker/binary.jpg"  alt="binary"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">Firewoodfx</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <?php 
                            //konfigurasi pagination
                            $halaman = 2;
                            $jumlahdata = count(query("SELECT * FROM artikel ORDER BY id DESC"));
                            $jumlahhalaman = ceil($jumlahdata/$halaman);
                            if (isset($_GET["hal"])) {
                                $halamanaktif = $_GET["hal"];
                            }else{
                                $halamanaktif = 1;
                            }
                            $awaldata = ($halaman*$halamanaktif) - $halaman;
                            $fund = query("SELECT * FROM artikel ORDER BY id DESC LIMIT  $awaldata, $halaman") ;
                            ?>
                            <?php foreach ($artikel as $row ) : ?>
                            <div class="col-sm-6 col-lg-6">
                                
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <h2 class="pb-2 display-5"><a href="promosinglepost.php?sp=<?= $row["id"] ?>"><?= substr ($row['judul'],0,40)  ?>...</a></h2>
                                            <a href="artikelsinglepost.php?sp=<?= $row["id"] ?>"><img src="http://elizasby.net/images/<?= $row['gambar']  ?>" width="100%" ></a>
                                            <br><br>
                                            <div class="typo-articles">
                                              <p><h6 class="pb-4 display-5">
                                                <?= substr ($row["kontent"],0,100)  ?>.....<br><a href="promosinglepost.php?sp=<?= $row["id"] ?>">Selengkapnya...</a></h6>                                                
                                              </p>
                                            </div>
                                            
                                            <blockquote class="blockquote mt-3 text-right">
                                            <h4 class="pb-2 display-5"><?= $row['tang']  ?>
                                            </blockquote>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                                
                                
                            </div>
                            <?php endforeach; ?>
                            
                            
                            
                            
                            
                                

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
