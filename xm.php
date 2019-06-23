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
                                        <strong class="card-title text-light">XM</strong>
                                    </div>
                                    <div class="card-body text-white bg-dark">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <!-- <div class="card"> -->
                                                    <img class="card-img-top" src="images/broker/xmlogo.jpg" style="width: 100%;" alt="Firewoodfx">
                                                    
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-10">
                                                
                                                    <p>Dengan lebih dari 1.000.000 klien sejak didirikan di tahun 2009, XM telah berkembang menjadi perusahaan investasi internasional yang besar dan mapan serta juga menjadi pemimpin dalam industri. Pengalaman kami yang digabungkan dengan layanan pendukung di lebih dari 30 bahasa, membuat XM menjadi pilihan untuk para trader di semua level, dimana pun.</p>
                                                    <br>
                                                    <a href="https://www.xm-indonesia.com/register/account/real?lang=id"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">Buka Akun Real</button></a>
                                                
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
                                                                    <th style="width: 30%;">Zero XM</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Mata Uang Dasar</td>
                                                                    <td>USD, EUR, GBP</td>
                                                                    <td>USD, EUR, GBP</td>
                                                                    <td>USD, EUR, GBP</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Besaran Kontrak</td>
                                                                    <td>1 Lot = 1.000 </td>
                                                                    <td>1 Lot = 100.000</td>
                                                                    <td>1 Lot = 100.000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Leverage</td>
                                                                    <td>1:888 ($5 – $ 20K)<br>
                                                                        1:200 ($ 20K - $ 100K)<br>
                                                                        1:100 ($ 100K +) </td>
                                                                    <td>1:888 ($5 – $ 20K)<br>
                                                                        1:200 ($ 20K - $ 100K)<br>
                                                                        1:100 ($ 100K +) </td>
                                                                    <td>1:888 ($5 – $ 20K)<br>
                                                                        1:200 ($ 20K - $ 100K)<br>
                                                                        1:100 ($ 100K +) </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spread</td>
                                                                    <td>Serendah 1 Pip</td>
                                                                    <td>Serendah 1 Pip</td>
                                                                    <td>Serendah 0 Pip</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Komisi</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>Ada Komisi</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Batasan Lot per tiket</td>
                                                                    <td>100 Lots</td>
                                                                    <td>50 Lots</td>
                                                                    <td>50 Lots</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hedging scalping</td>
                                                                    <td>Ya</td>
                                                                    <td>Ya</td>
                                                                    <td>Ya</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Akun Islamic</td>
                                                                    <td>Opsional</td>
                                                                    <td>Opsional</td>
                                                                    <td>Opsional</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Deposit Minimum</td>
                                                                    <td>$5</td>
                                                                    <td>$5</td>
                                                                    <td>$100</td>
                                                                </tr>
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-dark btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="https://www.xm-indonesia.com/register/account/real?lang=id" target="_blank"> <button type="button" class="btn btn-outline-dark btn-lg btn-block">Akun Micro</button> </a></td>
                                                                    <td><a href="https://www.xm-indonesia.com/register/account/real?lang=id" target="_blank"> <button type="button" class="btn btn-outline-dark btn-lg btn-block">Akun Standard</button> </a></td>
                                                                    <td><a href="https://www.xm-indonesia.com/register/account/real?lang=id" target="_blank"> <button type="button" class="btn btn-outline-dark btn-lg btn-block">Akun Zero XM</button> </a></td>
                                                                                                                                        
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <br>
                                                        
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light"> Broker Teregulasi  </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-dark">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">XM Group dilisensi oleh FCA Inggris (Trading Point of Financial Instruments UK Limited), ASIC di Australia (Trading Point of Financial Instruments Pty Limited), IFSC di Belize (XM Global Limited) dan oleh CySEC di Siprus (Trading Point of Financial Instruments Ltd), mematuhi standar regulator yang selalu disempurnakan. 
                                                                </p>
                                                                
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Dikenal Di Seluruh Dunia </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-dark">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Kami memiliki klien di lebih dari 196 negara dan staf yang berbicara di lebih dari 30 bahasa. Manajemen kami telah mengunjungi 120 kota di seluruh dunia untuk memahami keinginan klien dan partner XM.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Beragam Instrumen Trading</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-dark">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Klien kami dapat memilih trading forex, indeks saham, komoditas, saham, logam, energi dan mata uang kripto dari akun yang sama. Dengan beragam instrumen trading yang tersedia dari satu aset platform trading yang membuat trading di XM menjadi lebih mudah dan efisien.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Mudah dan Nyaman</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-dark">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Semua sistem kami dibangun dan diperbaharui mengikuti keingininan klien. Mulai dari prosedur buka akun, mengelola akun anda, deposit dan penarikan dana hingga trading itu sendiri. Semua dikemas secara sederhana dan mudah digunakan untuk semua klien kami.
  
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
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 for PC</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://www.xm-indonesia.com/download/xmbz-mt4"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">MT4 for Windows</button></a>
                                                            <a href="https://www.xm-indonesia.com/download/xmbz-macmt4"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">MT4 for OS X</button></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 For Android</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/android.png" alt="Card image cap">
                                                            <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">MT4 For Apple</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://itunes.apple.com/en/app/metatrader-4/id496212596?mt=8"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <br>
                                                        <div class="card-header bg-secondary">
                                                            <strong class="card-title text-light">Web MetaTrader</strong>
                                                        </div>
                                                        
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/web.png" alt="Card image cap">
                                                            <a href="https://www.xm-indonesia.com/goto/webtrader"  target="_blank"><button type="button" class="btn btn-dark btn-lg btn-block">Akses MT4 Web</button></a>
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
