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
                                        <strong class="card-title text-light">Tickmill</strong>
                                    </div>
                                    <div class="card-body text-white bg-danger">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <!-- <div class="card"> -->
                                                    <img class="card-img-top" src="images/broker/tickmilllogo.jpg" style="width: 100%;" alt="Firewoodfx">
                                                    
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-md-10">
                                                
                                                    <p>Tickmill adalah trading cara baru dengan spread pasar yang sangat rendah, tidak ada requote, transparansi absolut dan teknologi perdagangan inovatif. Tickmill telah dibangun oleh trader untuk trader. Anggota tim kami memiliki pengalaman trading sejak tahun 1994 dan telah berhasil berdagang di semua pasar keuangan besar dari Asia ke Amerika Utara. Tickmill adalah nama dagang dari Tmill UK Limited yang resmi dan diatur oleh the UK Financial Conduct Authority (FCA). Tickmill juga merupakan nama dagang dari Tickmill Ltd, teregulasi oleh FSA Seychelles .<br>
                                                    <a href="https://secure.tickmill.com/trader/?task=1050&lang=5"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Buka Akun Real</button></a>
                                                
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
                                                                    <th style="width: 30%;">Classic</th>
                                                                    <th style="width: 30%;">Pro</th>
                                                                    <th style="width: 30%;">V.I.P</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
		                                                            <td>Minimum deposit </td>
		                                                            <td>25 USD</td>
		                                                            <td>25 USD</td>
		                                                            <td>50.000 USD</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Mata uang dasar</td>
		                                                            <td>USD, EUR, GBP, PLN</td>
		                                                            <td>USD, EUR, GBP, PLN</td>
		                                                            <td>USD, EUR, GBP, PLN</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Spread dari</td>
		                                                            <td>1.6 pip</td>
		                                                            <td>0.0 pip</td>
		                                                            <td>0.0 pip</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Leverage hingga</td>
		                                                            <td>1 : 500</td>
		                                                            <td>1 : 500</td>
		                                                            <td>1 : 500</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Minimal lot </td>
		                                                            <td>0.01</td>
		                                                            <td>0.01</td>
		                                                            <td>0.01</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Deal Minimal </td>
		                                                            <td>0.01 dari lot</td>
		                                                            <td>0.01 dari lot</td>
		                                                            <td>0.10 dari lot</td>
		                                                        </tr>
		                                                        <tr>
		                                                            <td>Komisi </td>
		                                                            <td>Tidak Ada</td>
		                                                            <td>$ 2 </td>
		                                                            <td>$ 1.6</td>
	                                                            </tr>
	                                                            <tr>
	                                                                <td>Akun Syariah</td>
	                                                                <td>Ada</td>
	                                                                <td>Ada</td>
	                                                                <td>Ada</td>
	                                                            </tr>
                                                                <tr >
                                                                    <td><strong><button type="button" class="btn btn-danger btn-lg btn-block">Buka Akun</button></strong></td>
                                                                    <td><a href="https://secure.tickmill.com/trader/?task=1050&lang=5" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Classic</button> </a></td>
                                                                    <td><a href="https://secure.tickmill.com/trader/?task=1050&lang=5" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun Pro</button> </a></td>
                                                                    <td><a href="https://secure.tickmill.com/trader/?task=1050&lang=5" target="_blank"> <button type="button" class="btn btn-outline-danger btn-lg btn-block">Akun V.I.P</button> </a></td>
                                                                                                                                        
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
                                                                <strong class="card-title text-light"> Keamanan Dana Dan Regulasi </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Tickmill menyimpan dana Anda secara terpisah di institusi keuangan yang terpercaya sesuai dengan regulasi baik dari FCA di UK atau FSA di Seychelles. Sebagai tambahan, klien dari Tickmill (Tmill UK Ltd) dilindungi oleh the Financial Services Compensation Scheme (FSCS). 
                                                                </p>
                                                                
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Dianugerahi Penghargaan </strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Tickmill merasa terhormat diberi penghargaan "Broker Terpercaya di Eropa 2017" oleh Global Brands Magazine yang terkenal, selain itu juga mendapatkan pengakuan yang luar biasa di Chinese Forex Expo 2016, yang para peserta memilih kami menjadi "Broker Forex Terpercaya" dan "Broker NDD Terbaik".
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Semua Strategi Didukung</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Berjuang untuk kesuksesan Anda, Tickmill tidak memberlakukan pembatasan terhadap profitabilitas dan mengizinkan semua strategi trading termasuk hedging, scalping dan arbitrase.
                                                                </p>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-header bg-secondary">
                                                                <strong class="card-title text-light">Kondisi Perdagangan Yang Luar Biasa</strong>
                                                            </div>
                                                            <div class="card-body text-white bg-danger">
                                                                <h6 class="card-title mb-3">
                                                                <p class="card-text text-light">Tickmill memberikan pengalaman trading tertinggi dengan beberapa spread dan komisi terendah di industri ini dan tidak ada requote, delay atau intervensi.  
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
                                                            <a href="https://download.mql5.com/cdn/web/7089/mt4/tickmill4setup.exe"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">MT4 for Windows</button></a>
                                                            <a href="https://tickmill.com/wp-content/uploads/2016/05/Tickmill_MT4_Mac.dmg"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">MT4 for OS X</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Android</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/android.png" alt="Card image cap">
                                                            <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">MetaTrader 4 For Apple</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/pc.png" alt="Card image cap">
                                                            <a href="https://itunes.apple.com/en/app/metatrader-4/id496212596?mt=8"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Download MT4</button></a>
                                                        </div>
                                                    </div>
                                                     <div class="col-md-3">
                                                        <br>
                                                        <h5 class="card-title mb-3">Web MetaTrader</h5>
                                                        <div class="card">
                                                            <img class="card-img-top" src="images/broker/web.png" alt="Card image cap">
                                                            <a href="https://trade.tickmill.com/id/"  target="_blank"><button type="button" class="btn btn-danger btn-lg btn-block">Akses MT4 Web</button></a>
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
