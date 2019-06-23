<?php 
    require 'include/fungsi.php';

    $tampil = query("SELECT * FROM copytrading ORDER BY no DESC");
  
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="mr-2 fa fa-align-justify"></i>
                                        <strong class="card-title" v-if="headerText">History Copy Trading</strong>
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
														<th>No</th>
														<th>Broker</th>
														<th>UserName</th>
														<th>Profit</th>
														<th>Equality</th>
														<th>Keuntungan Mengambang</th>  
														<th>Perolehan</th>
														<th>Komisi</th>
													</tr>
													
												</thead>
												<tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($tampil as $row ) : ?> 
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $row["broker"] ?></td>                          
                                                            <td><?= $row["username"] ?></td>                          
                                                            <td><?= $row["profit"] ?></td>
                                                            <td><?= $row["equality"] ?></td>
                                                            <td><?= $row["keuntungan_mengambang"] ?></td>
                                                            <td><?= $row["perolehan"] ?></td>
                                                            <td><?= $row["komisi"] ?></td>

                                                            
                                                            

                                                        </tr>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                </tbody>
											</table>
											</br><p style="text-align:center">Showing 1 to 10 of 16 entries</p></br>
											<nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav>
										</div>
                                            <!-- END DATA TABLE -->
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
