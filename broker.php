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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Daftar Broker</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="brokers.php?b=octafx" > <img class="card-img-top" src="images/broker/octa.jpg" alt="insta forex"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="brokers.php?b=just forex" > <img class="card-img-top" src="images/broker/just.jpg" alt="xm"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="brokers.php?b=weltrade" > <img class="card-img-top" src="images/broker/wlt.jpg" alt="xm"></a>
                                    <!-- <div class="card-body">
                                        <h4 class="card-title mb-3"><a href="firewoodfx">FBS</a></h4>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                                            content.
                                        </p>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-4">
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
