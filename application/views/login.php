<?php
    // session_start();
    // if(isset($_SESSION['SESS_MEMBER_ID'])){
    //     header("location:./");
    // }elseif (isset($_COOKIES['COOK_MEMBER_ID'])) {
    //     $_SESSION['SESS_MEMBER_USERNAME']=$_COOKIES['COOK_MEMBER_USERNAME'];
    //     $_SESSION['SESS_MEMBER_ID']=$_COOKIES['COOK_MEMBER_ID'];
    //     header("location:./");
    // }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>MK Poshak-Login</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body><!-- 
    <nav class="navbar navbar-fixed-top navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">MK Poshak</a>
            </div>    
        </div>
    </nav>
 -->
    <!-- main containers -->
    <div class='container'>

      <form class="form-signin" role="form" method="post" action="Login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php 
            echo validation_errors("<p id='danger' class='alert alert-danger text-danger'>","</p>");
        ?>
        <?php
            if (isset($error)) {
                echo "<p id='danger' class='alert alert-danger text-danger'>";
                echo $error;
                echo "</p>";
                // unset($_SESSION['error']);
            }
        ?>
        <input id="username" type="text" name="username" class="form-control"  placeholder="Username" required autofocus>
        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input id="remember" type="checkbox" name="rememberme" value="remember-me"> Remember me
            </label>
        </div>
        <button type="submit" name="signin" class="btn btn-lg btn-primary btn-block" id="signin">Sign in</button>
      </form>

    </div>

    <!-- javascripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="js/login.js"></script> -->
  </body>
</html>