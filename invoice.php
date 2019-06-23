<?php

session_start();
    if (!isset($_SESSION["email"])) {
        require 'include/fungsi.php';
        if (!isset($_GET[""])  ) {
            header("location: index");
            exit;
        }
    }else{
        
        require 'include/fungsi.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <?php if (isset($_GET["depo"])) : ?>
                            <?php
                    
                                $idepo =  $_GET["depo"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM deposit WHERE id  = '$idepo'");
                                $depo = mysqli_fetch_array($cekDps);
                                $tanggal = $depo['tang'];
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                                $deposit = $depo['deposit'];
                                $unik = $depo['unik'];
                                $bank = $depo['bank'];
                                $totall = $depo['total'];
                                $ratedepo = query("SELECT * FROM rate WHERE broker = '$broker' ")[0];
                       
                                $dollar = $ratedepo['deposit'];
                                $total = $deposit*$dollar;
                                    
                             ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Invoice Deposit Akun Trading <?= ucwords($broker)  ?></strong>
                                        
                                    </div>
                                    <div class="card-body">

                                        <div class="col-md-12">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Deskripsi</th>
                                                            <th>USD</th>
                                                            <th>Kurs</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $tanggal ?></td>
                                                            <td>Broker : <?= ucwords($broker)  ?><br>No Akun : <?= $noakun  ?></td>
                                                            <td>$ <?= number_format($deposit,2)  ?></td>
                                                            <td >Rp. <?= number_format($dollar)  ?>,-</td>
                                                            <td>Rp. <?= number_format($total)  ?>,-</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td ></td>
                                                            <td>Angka Unik : <?= $unik  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><H4>Total : Rp. <?= number_format($totall)  ?>,-</H4></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <?php if ($bank != "saku" ) : ?>
                                                            <td colspan="2">Silahkan Melakukan Transfer Ke : </td>
                                                            <?php else : ?>
                                                            <td colspan="2">Deposit by : </td>
                                                            <?php endif ; ?>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php if ($bank === "bca" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bca.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : 088.608.8986</strong>  <br> <strong> A/N : Margareth Lindsay Y.</strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bni" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bni.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : 063.021.5090</strong>  <br> <strong> A/N : Margareth Lindsay Y.</strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : 0412.0100.1323.565</strong>  <br> <strong> A/N : Melissa Vincentia J.</strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "mandiri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/mandiri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : 142.000.247.7999</strong>  <br> <strong> A/N : Margareth Lindsay Y.</strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    <?php elseif ($bank === "saku" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/saku.jpg" style="width: 100px;"></td>
                                                            <td colspan="2"> </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php endif ; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE-->
                                        </div>

                                        <div class="row">
                                          
                                        </div>

                                    </div>
                                </div>






                            </div>

                            <?php elseif (isset($_GET["wd"])) : ?>
                            <?php
                    
                                $iwd =  $_GET["wd"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM withdraw WHERE id  = '$iwd'");
                                $depo = mysqli_fetch_array($cekDps);
                                $tanggal = $depo['tanggal'];
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                                $withdrawal = $depo['withdrawal'];
                                
                                $bank = $depo['bank'];
                                $norek = $depo['norek'];
                                $namarek = $depo['namarek'];
                                $total = $depo['total'];
                                $ratewd = query("SELECT * FROM rate WHERE broker = '$broker' ")[0];
                       
                                $dollar = $ratewd['withdrawal'];
                                
                                    
                             ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Invoice Withdrawal Akun Trading <?= ucwords($broker)  ?></strong>
                                    </div>
                                    <div class="card-body">

                                        <div class="col-md-12">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Deskripsi</th>
                                                            <th>USD</th>
                                                            <th>Kurs</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $tanggal ?></td>
                                                            <td>Broker : <?= ucwords($broker)  ?><br>No Akun : <?= $noakun  ?></td>
                                                            <td>$ <?= number_format($withdrawal,2)  ?></td>
                                                            <td >Rp. <?= number_format($dollar)  ?>,-</td>
                                                            <td>Rp. <?= number_format($total)  ?>,-</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><H4>Total : Rp. <?= number_format($total)  ?>,-</H4></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="2">Tujuan Transfer Ke: </td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php if ($bank === "bca" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bca.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bni" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bni.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "mandiri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/mandiri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php endif ; ?>
                                                        <tr>
                                                            <td colspan="5">*Kami Akan Melakukan Transfer Setelah Dana Anda Masuk Ke WarungBroker.com </td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE-->
                                        </div>

                                        

                                    </div>
                                </div>






                            </div>    
                            <?php elseif (isset($_GET["wdsaku"])) : ?>
                            <?php
                    
                                $iwd =  $_GET["wdsaku"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM withdraw WHERE id  = '$iwd'");
                                $depo = mysqli_fetch_array($cekDps);
                                $tanggal = $depo['tanggal'];
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                                $withdrawal = $depo['withdrawal'];
                                
                                $bank = $depo['bank'];
                                $norek = $depo['norek'];
                                $namarek = $depo['namarek'];
                                $total = $depo['total'];
                                $ratewd = query("SELECT * FROM rate WHERE broker = 'firewoodfx' ")[0];
                       
                                $dollar = $ratewd['withdrawal'];
                                
                                    
                             ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Invoice Withdrawal Saku </strong>
                                    </div>
                                    <div class="card-body">

                                        <div class="col-md-12">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Deskripsi</th>
                                                            <th>USD</th>
                                                            <th>Kurs</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $tanggal ?></td>
                                                            <td>Withdrawal : <?= ucwords($broker)  ?><br>No Saku : <?= $noakun  ?></td>
                                                            <td>$ <?= number_format($withdrawal,2)  ?></td>
                                                            <td >Rp. <?= number_format($dollar)  ?>,-</td>
                                                            <td>Rp. <?= number_format($total)  ?>,-</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><H4>Total : Rp. <?= number_format($total)  ?>,-</H4></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td colspan="2">Tujuan Transfer Ke: </td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php if ($bank === "bca" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bca.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bni" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bni.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "bri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/bri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php elseif ($bank === "mandiri" ) : ?>
                                                        <tr>
                                                            <td><img class="" src="images/mandiri.png" style="width: 100px;"></td>
                                                            <td colspan="2"> <strong>NO REK : <?= $norek  ?></strong>  <br> <strong> A/N : <?= $namarek  ?></strong></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php endif ; ?>
                                                        <tr>
                                                            <td colspan="5">*Kami Akan Segera Melakukan Transfer Ke Rekening Anda</td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE-->
                                        </div>

                                        

                                    </div>
                                </div>






                            </div>    
                        <?php elseif (isset($_GET["dpsaku"])) : ?>
                            <?php
                    
                                $iwd =  $_GET["dpsaku"];
                                $cekDps = mysqli_query($conn,"SELECT * FROM deposit WHERE id  = '$iwd'");
                                $depo = mysqli_fetch_array($cekDps);
                                $tanggal = $depo['tang'];
                                $broker = $depo['broker'];
                                $noakun = $depo['no_akun'];
                                $deposit = $depo['deposit'];
                                
                                $bank = $depo['bank'];
                                
                                $total = $depo['total'];
                                $ratedepo = query("SELECT * FROM rate WHERE broker = 'firewoodfx' ")[0];
                       
                                $dollar = $ratedepo['deposit'];
                                
                                    
                             ?>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">Invoice Deposit By Saku </strong>
                                    </div>
                                    <div class="card-body">

                                        <div class="col-md-12">
                                            <!-- DATA TABLE-->
                                            <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3">
                                                    <thead>
                                                        <tr>
                                                            <th>Tanggal</th>
                                                            <th>Deskripsi</th>
                                                            <th>USD</th>
                                                            <th>Kurs</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $tanggal ?></td>
                                                            <td>Deposit : <?= ucwords($broker)  ?><br>No Akun : <?= $noakun  ?></td>
                                                            <td>$ <?= number_format($deposit,2)  ?></td>
                                                            <td >Rp. <?= number_format($dollar)  ?>,-</td>
                                                            <td>Rp. <?= number_format($total)  ?>,-</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><H4>Total : Rp. <?= number_format($total)  ?>,-</H4></td>
                                                        </tr>
                                                        
                                                        
                                                        <tr>
                                                            <td colspan="5">*Kami Akan Segera Melakukan Deposit Ke Akun Trading Anda</td>
                                                            
                                                            
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE-->
                                        </div>

                                        

                                    </div>
                                </div>






                            </div>    
                            <?php endif ; ?>


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
