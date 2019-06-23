<!DOCTYPE html>
<html lang="en">

<?php 
session_start();

 if (!isset($_SESSION['email'])) {
        require 'include/fungsi.php';
        require 'include/header.php';        
    // header("location:index"); // jika belum login, maka dikembalikan ke index
    
    }else{
        require 'include/fungsi.php';
        require 'include/header.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
    }

    $juhal = "broker";
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
                        <iframe height="25" scrolling="no" src="https://www.dailyforex.com/forex-widget/widget/24831" style="width:100%; height:25px; display: block;border:0px;overflow:hidden;" width="100%"></iframe><span style="position:relative;display:block;text-align:center;color:#333333;width:100%;font-family:Tahoma,sans-serif;font-size:10px;"></span>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="customer-logos">
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=fbs" > <img class="card-img-top" src="images/broker/fbs.jpg" alt="fbs"></a> </div>
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=firewoodfx" ><img class="card-img-top" src="images/broker/firewoodfx.jpg" alt="firewoodfx"></a> </div>
                                        <div class="slide" style="margin-top: 10px;">  <a href="brokers.php?b=insta forex" > <img class="card-img-top" src="images/broker/insta.jpg" alt="insta forex"></a> </div>
                                        <div class="slide" style="margin-top: 10px;">  <a href="brokers.php?b=octafx" > <img class="card-img-top" src="images/broker/octa.jpg" alt="octa fx"></a> </div>
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=tickmill" ><img class="card-img-top" src="images/broker/tick.jpg" alt="tickmill"></a> </div>
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=xm" > <img class="card-img-top" src="images/broker/xmp.jpg" alt="xm"></a> </div>
                                        <div class="slide" style="margin-top: 10px;">  <a href="binary"><img class="card-img-top" src="images/broker/binary.jpg"  alt="binary"></a> </div>
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=just forex" > <img class="card-img-top" src="images/broker/just.jpg" alt="justforex"></a> </div>
                                        <!--<div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=tifia" > <img class="card-img-top" src="images/broker/tif.jpg" alt="tifia"></a> </div>-->
                                        <div class="slide" style="margin-top: 10px;"> <a href="brokers.php?b=weltrade" > <img class="card-img-top" src="images/broker/wlt.jpg" alt="Weltrade"></a> </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-sm-8 col-lg-8">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <h2 class="pb-2 display-5">Selamat Datang di WarungBroker</h2>
                                            <blockquote class="blockquote mt-3 text-right">
                                            <h4 class="pb-2 display-5">Sebagai IB Lintas Broker & Lokal Depositor, <br>WarungBroker menyediakan layanan rebate dari broker yang menjadi mitra kami</h4>
                                            </blockquote>

                                            <div class="typo-articles">
                                              <p><h6 class="pb-4 display-5">
                                                Dapatkan rebate forex hingga 80% dari komisi IB, akumulasi rebate akan kami bayarkan setiap minggu menggunakan bank lokal BCA, BRI, BNI dan Bank Mandiri. Bagi member yang registrasi dan buka akun melalui web www.warungbroker.com berhak mendapatkan layanan edukasi forex trading disetiap event pelatihan yang kami adakan.</h6>                                                
                                              </p>
                                            </div>
                                            <br>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <blockquote class="blockquote mt-3 text-right">
                                            <h3 class="pb-2 display-5">The Best way to get e-currency balance</h3>
                                            </blockquote>
                                            <p><h6 class="pb-4 display-5">
                                            WarungBroker Changer, menyediakan beberapa balance e-currency untuk kebutuhan investasi forex anda. Dapatkan harga kompetitif serta kemudahan dalam proses transaksi tanpa memerlukan proses login member. Segeralah bertransaksi bersama kami.</h6>
                                            </p>
                                        </div>
                                        <!-- <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
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
                                                    <p>0822-2121-9191</p>
                                                    <p>cs@warungbroker.com</p>
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
