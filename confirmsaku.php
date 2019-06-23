<?php 
    session_start();
    if (!isset($_GET["cs"])) {
    header("location:index");
    exit;
        }
    if (!isset($_SESSION["email"])) {
        require 'include/fungsi.php';
    }else{
        
        require 'include/fungsi.php';
        $cekuser = mysqli_query($conn,"SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'");
        $user = mysqli_fetch_array($cekuser);
        //$user = query("SELECT * FROM member WHERE email_member = '".$_SESSION['email']."'") [0];
        $email = $user["email_member"];
        $username = $user["username_member"];
        $kodemember = $user["kode_member"];

        $cekprofile = mysqli_query($conn,"SELECT * FROM profile WHERE kode_member = '$kodemember'");
        $profile = mysqli_fetch_array($cekprofile);
    }

        $wdr = $_GET["cs"];

        $wp = query("SELECT * FROM withdraw WHERE wdr = '$wdr' ") [0];

        if ($wp['status']==="4") {
            $id = $wp["id"];
            $status = 5 ;

            

            //query edit data
            $query = "UPDATE withdraw 
                       SET status = '$status'                
                        WHERE id = $id
                    ";
            mysqli_query($conn, $query);
        }
    

    // //cek apakah data berhasil di edit
    // if(  mysqli_affected_rows($conn) > 0 ) {
    //     echo "          
    //         <script>
    //             alert('withdraw confirm');
    //             document.location.href = '../withdrawal';
    //         </script>
    //         ";
    // } else {
    //     echo "
    //         <script>
    //             alert('confirm withdrawal gagal');
                
    //         </script>
    //         ";
    // }
  
    

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
                <!-- <div class="section__content section__content--p5">
                    <div class="container-fluid">
                        <div class="row"> -->
                            
                            <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/wb1.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <?php if($wp['status']==="5") : ?>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="text-center">
                                    <h4 class="text-uppercase font-bold m-b-0">Confirmasi Withdrawal Saku</h4>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="text-muted font-13 m-t-20">  Link Konfirmasi Sudah Tidak Berlaku</p>
                                </div>
                                
                            </form>
                            
                        </div>
                        <?php endif ; ?>
                        <?php if($wp['status']==="4") : ?>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="text-center">
                                    <h4 class="text-uppercase font-bold m-b-0">Confirmasi Withdrawal Saku</h4>
                                </div>
                                <div class="panel-body text-center">
                                    <p class="text-muted font-13 m-t-20">  Terima kasih telah melakukan order withdrawal saku. Order anda akan segera kami proses. <br>Dan anda akan mendapatkan email konfirmasi ketika order anda telah berhasil di proses.  </p>
                                </div>
                                
                            </form>
                            
                        </div>
                        <?php endif ; ?>
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
