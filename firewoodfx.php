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
                                        <strong class="card-title text-light">Firewoodfx</strong>
                                    </div>
                                    <div class="card-body text-white bg-warning">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <!-- <div class="card"> -->
                                                    <img class="card-img-top" src="images/broker/firewoodfxlogo.jpg" style="width: 100%;" alt="Firewoodfx">
                                                    
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-10">
                                                
                                                    <p>FirewoodFX adalah Broker Forex Global online. Perusahaan ini didirikan oleh sekumpulan trader forex profesional. Anggota tim kami mempunyai pengalaman yang mumpuni dalam industri keuangan. Bersama-sama kami menciptakan cara baru untuk memberikan Anda pengalaman trading yang luar biasa.</p>
                                                    <a href="https://secure.firewoodfx.com/client/register?ib=1680012112"  target="_blank"><button type="button" class="btn btn-warning btn-lg btn-block">Buka Akun Real</button></a>
                                                
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
                                                                    <th style="width: 30%;">Micro</th>
                                                                    <th style="width: 30%;">Standard</th>
                                                                    <th style="width: 30%;">Premium</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Deposit Minimum</td>
                                                                    <td>USD 10</td>
                                                                    <td>USD 10</td>
                                                                    <td>USD 100</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Trade Minimum</td>
                                                                    <td>0.01 lot (100)</td>
                                                                    <td>0.01 lot (1000)</td>
                                                                    <td>0.1 lot (10000)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Trade Maksimum</td>
                                                                    <td>200 lot (2 m)</td>
                                                                    <td>30 lot (3 m)</td>
                                                                    <td>50 lot (5 m)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Maksimum Posisi</td>
                                                                    <td>200 posisi</td>
                                                                    <td>200 posisi</td>
                                                                    <td>200 posisi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Leverage</td>
                                                                    <td>1 : 1000</td>
                                                                    <td>1 : 1000</td>
                                                                    <td>1 : 1000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spread</td>
                                                                    <td>Dari 3 Pips</td>
                                                                    <td>Dari 2 Pips</td>
                                                                    <td>Dari 1 Pip</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Format Pricing</td>
                                                                    <td>4-digits(.m suffix)</td>
                                                                    <td>4-digits(.fw suffix)<br />5-digits(.f suffix)</td>
                                                                    <td>4-digits(.fw suffix)<br />5-digits(.f suffix)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Komisi</td>
                                                                    <td>None</td>
                                                                    <td>None</td>
                                                                    <td>None</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Swap</td>
                                                                    <td>Tidak</td>
                                                                    <td>Tidak</td>
                                                                    <td>Tidak</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level Stop & Limit</td>
                                                                    <td>2 Pips</td>
                                                                    <td>2 Pips</td>
                                                                    <td>2 Pips</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Level Stopout</td>
                                                                    <td>20%</td>
                                                                    <td>20%</td>
                                                                    <td>20%</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hedging/Scalping</td>
                                                                    <td>Diperbolehkan</td>
                                                                    <td>Diperbolehkan</td>
                                                                    <td>Diperbolehkan</td>
                                                                </tr>
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-warning btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="https://secure.firewoodfx.com/client/register?ib=1680012112" target="_blank"> <button type="button" class="btn btn-outline-warning btn-lg btn-block">Akun Cent</button> </a></td>
                                                                    <td><a href="https://secure.firewoodfx.com/client/register?ib=1680012112" target="_blank"> <button type="button" class="btn btn-outline-warning btn-lg btn-block">Akun Micro</button> </a></td>
                                                                    <td><a href="https://secure.firewoodfx.com/client/register?ib=1680012112" target="_blank"> <button type="button" class="btn btn-outline-warning btn-lg btn-block">Akun Standard</button> </a></td>
                                                                    
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
                                                                <strong class="card-title text-light">Kondisi Trading Terbaik</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-warning">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Spread tetap dari 1 pip untuk mata uang utama.<br>Tanpa komisi.
                                                                </p>
                                                                
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Tidak ada batasan trading </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-warning">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Expert Advisor, trading dengan robot, trading berita dan scalping, semua dibolehkan.
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
                                                            <div class="card-body text-white bg-warning">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Leverage hingga 1:1000.<br>Minimum ukuran trade 1000 unit untuk forex.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Datacenter NY4 Equinix</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-warning">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Server trading FirewoodFX terletak di pusat data tercanggih Equinix NY4.<br>Pusat sistem keuangan dunia. 
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Transaksi Dimana Saja  </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-warning">
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
                                                                <strong class="card-title text-light">Bonus Promosi </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-warning">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Deposit minimall $100, dapatkan bonus deposit 20%
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
                                                            <a href="http://files.firewoodfx.com/firewood4setup.exe"  target="_blank"><button type="button" class="btn btn-warning btn-lg btn-block">Download MT4</button></a>
                                                            
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Android</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/android.png" alt="Card image cap">
                                                            <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4"  target="_blank"><button type="button" class="btn btn-warning btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Apple</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://itunes.apple.com/en/app/metatrader-4/id496212596?mt=8"  target="_blank"><button type="button" class="btn btn-warning btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">Web MetaTrader</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/web.png" alt="Card image cap">
                                                            <a href="https://secure.firewoodfx.com/webtrader"  target="_blank"><button type="button" class="btn btn-warning btn-lg btn-block">Download MT4</button></a>
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
