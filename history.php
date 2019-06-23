<?php 
session_start();
    if (!isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }else{
        
        require 'include/fungsi.php';
        $user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];
        $aff = $user["id_aff"];
        $profile = query("SELECT * FROM profile WHERE kode_member = '$kodemember'") [0];
        $akun = query("SELECT * FROM validasi WHERE kode_member = '$kodemember'") ;
        $bank = query("SELECT * FROM bank WHERE kode_member = '$kodemember'") ;
        $affiliasi = query("SELECT * FROM member WHERE aff = '$aff'") ;
        $affakun = query("SELECT * FROM validasi WHERE aff = '$aff'") ;

        $sk = query("SELECT * FROM saku WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id DESC LIMIT 1")[0];
        $kodesaku = $sk['kodesaku'];

        $rd = query("SELECT * FROM deposit WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id ");
        $rw = query("SELECT * FROM withdraw WHERE kode_member='$kodemember' AND email = '$email' ORDER BY tanggal DESC, jam DESC ");
        $rb = query("SELECT * FROM rebate WHERE kode_member='$kodemember' AND email = '$email' AND keterangan='rebate' ORDER BY id ");
        $rk = query("SELECT * FROM komisi WHERE kode_member='$kodemember' AND email = '$email' AND keterangan='komisi' ORDER BY id ");
        $sk = query("SELECT * FROM saku WHERE kode_member='$kodemember' AND email = '$email' ORDER BY id ");
        
        
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
                        
                        
                        
                    	<?php if (isset($_GET["deposit"])): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">History Deposit</strong>
                                            <small>
                                                <!-- <span class="badge badge-success float-right mt-1">Success</span> -->
                                                <!-- <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small float-right mt-1" data-toggle="modal" data-target="#tambahakun">
                                                        <i class="zmdi zmdi-plus"></i>Tambah Akun</button> -->
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive m-b-40">
                                                <table class="table table-borderless table-data3 dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>Nomer Akun</th>
                                                            <th>Broker</th>
                                                            <th colspan="2">Deposit</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($rd as $row ) : ?>
                                                        <tr>
	                                                       	<td><?= $i ?></td>
	                                                        <td>
				                                                <?php 
				                                                    $t = $row['tang'];
				                                                    $ta = substr($t,8,2);
				                                                    $bu = substr($t,5,2);
				                                                    $tah = substr($t,2,2);
				                                                    if ($bu === '01' ) {
				                                                        $bul = "Jan";
				                                                    }elseif ($bu === '02' ) {
				                                                        $bul = "Feb";
				                                                    }elseif ($bu === '03' ) {
				                                                        $bul = "Maret";
				                                                    }elseif ($bu === '04' ) {
				                                                        $bul = "April"; 
				                                                    }elseif ($bu === '05' ) {
				                                                        $bul = "Mei";
				                                                    }elseif ($bu === '06' ) {
				                                                        $bul = "Juni";
				                                                    }elseif ($bu === '07' ) {
				                                                        $bul = "Juli";
				                                                    }elseif ($bu === '08' ) {
				                                                        $bul = "Agust";
				                                                    }elseif ($bu === '09' ) {
				                                                        $bul = "Sept";
				                                                    }elseif ($bu === '10' ) {
				                                                        $bul = "Okt";
				                                                    }elseif ($bu === '11' ) {
				                                                        $bul = "Nov";
				                                                    }else{
				                                                        $bul = "Des";
				                                                    }
				                                                    echo $ta.'-'.$bul.'-'.$tah.' || '.substr($row["jam"],0,5) 
				                                                ?>
				                                            </td>   
				                                            <td><?= $row["no_akun"] ?></td>
				                                            <?php if ($row["broker"]==="xm" OR $row["broker"]==="fbs") : ?>
			                                                <td><?= "<b>" . strtoupper($row["broker"]) . " </b>" ?></td>
			                                                <?php else: ?>
			                                                <td><?= "<b>" . ucwords($row["broker"]) . " </b>" ?></td>
			                                                <?php endif; ?>
				                                                                                            
				                                            <td>$ <?= number_format($row["deposit"],2) ?></td>
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php elseif (isset($_GET["withdrawal"])): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">History Withdrawal</strong>
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
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>Nomer Akun</th>
                                                            <th>Broker</th>
                                                            <th colspan="2">Withdrawal</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($rw as $row ) : ?>
                                                        <tr>
	                                                       	<td><?= $i ?></td>
	                                                        <td>
				                                                <?php 
				                                                    $t = $row['tanggal'];
				                                                    $ta = substr($t,8,2);
				                                                    $bu = substr($t,5,2);
				                                                    $tah = substr($t,2,2);
				                                                    if ($bu === '01' ) {
				                                                        $bul = "Jan";
				                                                    }elseif ($bu === '02' ) {
				                                                        $bul = "Feb";
				                                                    }elseif ($bu === '03' ) {
				                                                        $bul = "Maret";
				                                                    }elseif ($bu === '04' ) {
				                                                        $bul = "April"; 
				                                                    }elseif ($bu === '05' ) {
				                                                        $bul = "Mei";
				                                                    }elseif ($bu === '06' ) {
				                                                        $bul = "Juni";
				                                                    }elseif ($bu === '07' ) {
				                                                        $bul = "Juli";
				                                                    }elseif ($bu === '08' ) {
				                                                        $bul = "Agust";
				                                                    }elseif ($bu === '09' ) {
				                                                        $bul = "Sept";
				                                                    }elseif ($bu === '10' ) {
				                                                        $bul = "Okt";
				                                                    }elseif ($bu === '11' ) {
				                                                        $bul = "Nov";
				                                                    }else{
				                                                        $bul = "Des";
				                                                    }
				                                                    echo $ta.'-'.$bul.'-'.$tah.' || '.substr($row["jam"],0,5) 
				                                                ?>
				                                            </td>   
				                                            <td><?= $row["no_akun"] ?></td>
				                                            <?php if ($row["broker"]==="xm" OR $row["broker"]==="fbs") : ?>
			                                                <td><?= "<b>" . strtoupper($row["broker"]) . " </b>" ?></td>
			                                                <?php else: ?>
			                                                <td><?= "<b>" . ucwords($row["broker"]) . " </b>" ?></td>
			                                                <?php endif; ?>
				                                                                                            
				                                            <td>Rp <?= $row["total"] ?></td>
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php elseif (isset($_GET["komisi"])): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">History Komisi</strong>
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
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>Transaksi</th>
                                                            <th>Akun Affiliasi</th>
                                                            <th colspan="2">Komisi</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($rk as $row ) : ?>
                                                        <tr>
	                                                       	<td><?= $i ?></td>
	                                                        <td>
				                                                <?php 
				                                                    $t = $row['tang'];
				                                                    $ta = substr($t,8,2);
				                                                    $bu = substr($t,5,2);
				                                                    $tah = substr($t,2,2);
				                                                    if ($bu === '01' ) {
				                                                        $bul = "Jan";
				                                                    }elseif ($bu === '02' ) {
				                                                        $bul = "Feb";
				                                                    }elseif ($bu === '03' ) {
				                                                        $bul = "Maret";
				                                                    }elseif ($bu === '04' ) {
				                                                        $bul = "April"; 
				                                                    }elseif ($bu === '05' ) {
				                                                        $bul = "Mei";
				                                                    }elseif ($bu === '06' ) {
				                                                        $bul = "Juni";
				                                                    }elseif ($bu === '07' ) {
				                                                        $bul = "Juli";
				                                                    }elseif ($bu === '08' ) {
				                                                        $bul = "Agust";
				                                                    }elseif ($bu === '09' ) {
				                                                        $bul = "Sept";
				                                                    }elseif ($bu === '10' ) {
				                                                        $bul = "Okt";
				                                                    }elseif ($bu === '11' ) {
				                                                        $bul = "Nov";
				                                                    }else{
				                                                        $bul = "Des";
				                                                    }
				                                                    echo $ta.'-'.$bul.'-'.$tah.' || '.substr($row["jam"],0,5) 
				                                                ?>
				                                            </td>   
				                                            <td><?= ucwords($row["keterangan"]) ?></td>
				                                            <td><?= substr($row["no_akun"], 0, -4) ?>xxxx</td>
				                                                                                            
				                                            <td>Rp. <?= number_format($row["input"]) ?></td>
                                                            
                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php elseif (isset($_GET["rebate"])): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">History Rebate</strong>
                                            <small>
                                                <!-- <span class="badge badge-success float-right mt-1">Success</span> -->
                                                <!-- <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small float-right mt-1" data-toggle="modal" data-target="#tambahakun">
                                                        <i class="zmdi zmdi-plus"></i>Tambah Akun</button> -->
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
											<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
												<thead>
													<tr>
													  
														<!-- <th>Email</th> -->
														<th>Tanggal</th>
														<th>Periode</th>
														<th>ID</th>
														<th>Email</th>
														<th>Auto Rebate</th>
														<th>Rebate Client($)</th>  
														<th>Rebate Client(Rp)</th>
														<th>LOT</th>
														<th>Bukti Transfer</th>
														<th>Bank</th>
														<th>Nama Broker</th>
														<th>Status</th>
														
													</tr>
													
												</thead>
												<tbody>
												<?php 
                                                    $fbs = query("SELECT * FROM data_fbs WHERE email = '$email'");
												?>
												<?php $i = 1; ?>
												<?php foreach ($fbs as $row ) : ?> 
													<tr>
														<td>
															<?php 
																$t = $row['tanggal'];
																$ta = substr($t,8,2);
																$bu = substr($t,5,2);
																$tah = substr($t,2,2);
																if ($bu === '01' ) {
																	$bul = "Jan";
																}elseif ($bu === '02' ) {
																	$bul = "Feb";
																}elseif ($bu === '03' ) {
																	$bul = "Maret";
																}elseif ($bu === '04' ) {
																	$bul = "April"; 
																}elseif ($bu === '05' ) {
																	$bul = "Mei";
																}elseif ($bu === '06' ) {
																	$bul = "Juni";
																}elseif ($bu === '07' ) {
																	$bul = "Juli";
																}elseif ($bu === '08' ) {
																	$bul = "Agust";
																}elseif ($bu === '09' ) {
																	$bul = "Sept";
																}elseif ($bu === '10' ) {
																	$bul = "Okt";
																}elseif ($bu === '11' ) {
																	$bul = "Nov";
																}else{
																	$bul = "Des";
																}
																echo $ta.'-'.$bul.'-'.$tah;
															?>
														</td>
														<td><?= $row["periode"] ?></td>                          
														<td><?= $row["no_akun"] ?></td>                          
														<td><?= $row["email"] ?></td>
														<td><?= $row["auto_rebate"] ?></td>
														<td><?= $row["rebate_dollar"] ?></td>
														<td><?= $row["rebate_rupiah"] ?></td>
														<td><?= $row["lot"] ?></td>
														<td><?php if ($row["status"]==1){
															echo"";
														}elseif ($row["status"]==2){
															echo"";
														}elseif ($row["status"]==3){
															echo"<img src='http://elizasby.balarweb.96.lt/bukti_transfer/".$row['bukti_transaksi']."'>";
														}
														?></td>
														
                                                        <td><?= $row["bank"]?> - <?=$row["norek"] ?></td>
                                                        <td><?= $row["nama_broker"] ?></td>
														<td><?php if ($row["status"]==1){
															echo"Gagal";
														}elseif ($row["status"]==2){
															echo"Pending";
														}elseif ($row["status"]==3){
															echo"Sukses";
														}elseif ($row["status"]==4){
															echo"Auto Rebate";
														}
														?></td>
													</tr>
                                                <?php $i++; ?>
                                                <?php endforeach; ?>
												</tbody>
											</table>
										</div>
                                            <!-- END DATA TABLE -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endif; ?>

                      

                        

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
