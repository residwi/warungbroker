<?php 
    session_start();
    if (isset($_SESSION["email"])) {
        header("location: index");
        exit;
    }
    require 'include/fungsi.php';

    //cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["login"]) ) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = query("SELECT * FROM member WHERE email_member = '$email'") [0];
       
        $aff = $user["aff"];

    if ($aff === "oeangkoe") {
        echo "<script>
                alert('Email Anda Belum terdaftar di warungbroker.com');
                document.location.href = 'login';    
             </script>";
        return false;
    }
    if ($aff === "rti") {
        echo "<script>
                alert('Email Anda Belum terdaftar di warungbroker.com');
                document.location.href = 'login';    
             </script>";
        return false;
    }

    $ceklogin = mysqli_query($conn, "SELECT * FROM member WHERE email_member = '$email' ");

        
    //cek password
    if( mysqli_num_rows($ceklogin) === 1 ) {
        
        //$_SESSION['email'] = $email;
        //cek password
        $row = mysqli_fetch_assoc($ceklogin);
        if (password_verify ($password, $row["password"])) {
            $_SESSION['email'] = $email;

            // //cek remember me
            // if (isset($_POST['remember']) ) {
            //  //buat cookie
            //  setcookie('email','true', time()+360);

            // }

            header("location: profile");
            exit;
        }
    }
    
    $error = true;
    
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
                                <img src="images/icon/wblogo271.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <?php if(isset($error)) :?>
                                <p style="color:red; font-style: italic">username / password salah</p>
                                <?php endif; ?>
                                <div class="login-checkbox">
                                    <!-- <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label> -->
                                    <label>
                                        <a href="lupass">Lupa Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">Log in</button>
                                
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div> -->
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
