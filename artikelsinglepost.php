<!DOCTYPE html>
<html lang="en">

<?php 
if (!isset($_GET["sp"])) {
        header("location: artikel");
        exit;
    }
$idd = $_GET["sp"]; 
session_start();

 if (!isset($_SESSION['email'])) {
        require 'include/fungsi.php';
        require 'include/header.php';        
    // header("location:index"); // jika belum login, maka dikembalikan ke index
        $artikel = query("SELECT * FROM artikel WHERE id=$idd ");
        $at = query("SELECT * FROM artikel ORDER BY id DESC LIMIT 5  ");
    }else{
        require 'include/fungsi.php';
        require 'include/header.php';
        $artikel = query("SELECT * FROM artikel WHERE id=$idd ");
        $at = query("SELECT * FROM artikel ORDER BY id DESC LIMIT 5 ");
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
                            
                            <div class="col-sm-8 col-lg-8">
                                <?php foreach ($artikel as $row ) : ?>
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <h2 class="pb-2 display-5"><?= $row['judul']  ?></h2>
                                            <img src="http://elizasby.net/images/<?= $row['gambar']  ?>" width="100%" >
                                            <br><br>
                                            <div class="typo-articles">
                                              <p><h6 class="pb-4 display-5">
                                                <?= $row['kontent']  ?></h6>                                                
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
                                <?php endforeach; ?>
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Artikel Terbaru</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <?php foreach ($at as $row ) : ?>
                                                <div class="row">                                               
                                                    <div class="col-12">
                                                        <ul class="vue-ordered">
                                                          <a href="artikelsinglepost.php?sp=<?= $row["id"] ?>"><li><?= $row['judul']  ?></li></a>
                                                          
                                                        </ul>
                                                        <p></p>
                                                        
                                                    </div>
                                                </div>

                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Contact Info</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <div class="row">
                                                <div class="col-2">
                                                    <img src="images/icon/wa1.png" style="width: 100%" class="float-right mt-1">
                                                    <img src="images/icon/telepon.png" style="width: 100%" class="float-right mt-1">
                                                    <img src="images/icon/mail.png" style="width: 100%" class="float-right mt-1">
                                                </div>
                                                <div class="col-10">
                                                    <p>0858-5481-0512</p>
                                                    <p>0823-3529-9808</p>
                                                    <p>warungbroker888@gmail.com</p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-account-calendar"></i>Proses Order</h3>
                                        <button class="au-btn-plus">
                                            <i class="zmdi zmdi-plus"></i>
                                        </button>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message__noti">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>Senin-Jumat</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p>09:00-12:00</p>
                                                        <p>13:00-17:00</p>
                                                        <p>19:30-21:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                    <p>Sabtu</p>
                                                    </div>
                                                    <div class="col-6">
                                                    <p>09:00-12:00</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>Minggu</p>
                                                    </div>
                                               
                                                    <div class="col-6">
                                                        <p>19:00-21:00</p>
                                                    </div>
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
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->

    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
