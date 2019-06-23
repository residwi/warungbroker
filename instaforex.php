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
                                        <strong class="card-title text-light">Insta Forex</strong>
                                    </div>
                                    <div class="card-body text-white bg-danger">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <!-- <div class="card"> -->
                                                    <img class="card-img-top" src="images/broker/instalogo.jpg" style="width: 100%;" alt="Firewoodfx">
                                                    
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-10">
                                                
                                                    <p>InstaForex dibangun pada tahun 2007 dan saat ini merupakan pilihan teratas oleh lebih dari 7.000.000 trader. Lebih dari 1.000 klien membuka akun dengan InstaForex setiap harinya. Seluruh klien InstaForex memperoleh kesempatan besar untuk trading yang efektif pada pasar forex, serta support teknik dan klien tepat waktu.</p>
                                                    <a href="https://secure.ifxid.com/open-account?lang=id&x=elizafx"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Buka Akun Real</button></a>
                                                
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
                                                
                                                <div class="col-lg-12">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 10%;">Keterangan</th>
                                                                    <th style="width: 30%;">Insta.Standard</th>
                                                                    <th style="width: 30%;">Insta.Eurica</th>
                                                                    <th style="width: 30%;">Cent.Standard</th>
                                                                    <th style="width: 30%;">Cent.Eurica</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Mata uang Deposit</td>
                                                                    <td>EUR, USD</td>
                                                                    <td>EUR, USD</td>
                                                                    <td>Cent USD, Cent EUR</td>
                                                                    <td>Cent USD, Cent EUR</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deposit Minimum</td>
                                                                    <td>1 USD</td>
                                                                    <td>1 USD</td>
                                                                    <td>1 USD</td>
                                                                    <td>1 USD</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spread</td>
                                                                    <td>3-7</td>
                                                                    <td>0</td>
                                                                    <td>3-7</td>
                                                                    <td>0</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Biaya</td>
                                                                    <td>0</td>
                                                                    <td>0.03%-0.07%</td>
                                                                    <td>0</td>
                                                                    <td>0.03%-0.07%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deal Minimal</td>
                                                                    <td>0.01 dari lot</td>
                                                                    <td>0.01 dari lot</td>
                                                                    <td>0.10 dari lot <br>(setara dengan 0.0001 lot pasar)</td>
                                                                    <td>0.10 dari lot <br>(setara dengan 0.0001 lot pasar)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deal Maksimal</td>
                                                                    <td>10000 lots</td>
                                                                    <td>10000 lots</td>
                                                                    <td>10000 lots</td>
                                                                    <td>10000 lots</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Leverage</td>
                                                                    <td>1:1-1:1000</td>
                                                                    <td>1:1-1:1000</td>
                                                                    <td>1:1-1:1000</td>
                                                                    <td>1:1-1:1000</td>
                                                                </tr>
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-danger btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="https://secure.ifxid.com/open-account?lang=id&x=elizafx" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Standard</button> </a></td>
                                                                    <td><a href="https://secure.ifxid.com/open-account?lang=id&x=elizafx" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Eurica</button> </a></td>
                                                                    <td><a href="https://secure.ifxid.com/open-account?lang=id&x=elizafx" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Cent S.</button> </a></td>
                                                                    <td><a href="https://secure.ifxid.com/open-account?lang=id&x=elizafx" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Cent E.</button> </a></td>
                                                                    
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <br>
                                                        
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Keamanan Setingkat Bank</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Setiap klien bisa melindungi akun trading miliknya dari sabotase dengan mengaktifkan layanan "SMS-password", yang akan meminta password via SMS setiap kali mereka melakukan penarikan dana.
                                                                </p>
                                                                
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Bonus Promosi </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Dapatkan Bonus 30% sampai 50% setiap anda melakukan deposit
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Leverage hingga 1:1000</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Anda bisa memilih leverage mulai dari 1:1 sampai dengan 1:1000 tergantung pada strategi pengelolaan resiko yang anda gunakan.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Free Swap</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Akun trading Free Swap didesain bagi trader yang tidak mempertimbangkan akun tradingnya dengan swap. Akun tanpa swap ini juga dikenal dengan "Islamic Account".  
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light"> Transaksi Dimana Saja  </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Trade dimana saja dengan PC, iPhone, iPod, dan perangkat Android.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Penghargaan </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Broker ECN Terbaik di Eropa Timur tahun 2016 dari Global Business Outlook<br>Broker Forex Terbaik di Asia dari IAIR Awards

                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader for PC</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://www.ifxid.com/downloads/itc4setup.exe"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                            <a href="https://www.ifxid.com/downloads/itc5setup.exe"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT5</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Android</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/android.png" alt="Card image cap">
                                                            <a href="https://play.google.com/store/apps/details?id=com.instaforex.mobiletrader&hl=en"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Apple</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://itunes.apple.com/gb/app/instaforex-mobiletrader/id987486023"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader Multiterminal</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/multiterminal.png" alt="Card image cap">
                                                            <a href="https://www.ifxid.com/downloads/itc4multisetup.exe"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
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
