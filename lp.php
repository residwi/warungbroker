<?php 
    session_start();
    if (isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }
    require 'include/fungsi.php';

   $idd = $_GET["e"];

$user = query("SELECT * FROM member WHERE email_member = '".$idd."'") [0];
$idu = $user["id_member"];
$pwu = $user["password"];
$emailu = $user["email_member"];

//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["up"]) ) {
    $id = $_POST['id'];
    $email = $_POST['email'];    
    
    $passwordb = mysqli_real_escape_string($conn, $_POST["passwordb"]);
    $passwordb2 = mysqli_real_escape_string($conn, $_POST["passwordb2"]);

    //cek username  email sudah ada atau belum
    $cekemail = mysqli_query($conn, "SELECT * FROM member WHERE email_member = '$email'");
    if( mysqli_num_rows($cekemail) === 1 ) {
        
        
        // cek konfirmasi passqord
        if ( $passwordb !== $passwordb2) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai');
                    document.location.href = 'lp.php?e=$idd';
                </script>
                ";
            return false;
        }

    }

    

    //$error = true;
    
    //enskripsi password
    $passwordb = password_hash($passwordb, PASSWORD_DEFAULT);


    //query edit data
    $query = "UPDATE member SET
                
                password = '$passwordb'                
                WHERE id_member = $id
            ";
    mysqli_query($conn, $query);

    //cek apakah data berhasil di edit
    if(  mysqli_affected_rows($conn) > 0 ) {
        echo "          
            <script>
                alert('password berhasil diperbarui');
                document.location.href = 'login';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('ubah password gagal');
                document.location.href = 'lp.php?e=$idd';
            </script>
            ";
    }
  
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
                                    <div class="login-form">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <input class="au-input au-input--full" type="hidden" id="id" name="id" value="<?= $idu  ?>">
                                                <input class="au-input au-input--full" type="hidden" id="email" name="email" value="<?= $emailu  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="au-input au-input--full" type="password" name="passwordb" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input class="au-input au-input--full" type="password" name="passwordb2" placeholder="Konfirmasi Password">
                                            </div>
                                            
                                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="up">Ubah Password</button>
                                            
                                        </form>
                                        <div class="register-link">
                                            <p>
                                                Belum Punya Akun?
                                                <a href="reg">Registrasi</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!-- </div>
                    </div>
                </div> -->
                
            </div><!-- END MAIN CONTENT-->
            
                <?php require 'include/footer.php'; ?>
        
        </div><!-- END PAGE CONTAINER-->

    </div>

    <?php require 'include/script.php'; ?>

</body>

</html>
<!-- end document-->
