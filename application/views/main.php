<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>MK Poshak</title>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/framework.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
</head>
  <body>
    <div class="container-main">
<!--       <div class="container">
        Dashboard contents goes here
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Example block-level help text here.</p>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Check me out
            </label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
 -->


      
    <!-- TASK BAR -->
    <div class="task-bar">
      <!-- TASK BAR MENU -->
      <span class="task-bar-item menu" id="menu-item">menu</span>
      <span class="task-bar-item btn" id="menu-btn">></span>
      <!-- TASK BAR ITEMS -->
      <div id="taskbar" class="task-bar-items"></div>
    </div>
    
    <!-- MENU CONTAINER -->
    <div class="menu-container">
      <!-- MENU CONTAINER TITLE -->
      <div class="menu-title"><span class="menu-title-text"><a href="Logout">Log Out <i class="fa fa-caret-down"> </i></a></span></div>
      <!-- MENU BACK BUTTON -->
      <div class="menu-back"><span class="glyphicon glyphicon-chevron-left"></span></div>
      <!-- MENU CONTENTS (Desplayed Menu) -->
      <div class="menu-contents"></div>
      <!-- MENU CONTENTS (Through Ajax)(Hidden after loaded) -->
      <div class="menu-contents-hidden"></div>
    </div>
    <!-- MENU BACK GROUND FOR BLURING BACKGROUND -->
    <div class="menu-container-back"></div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/overflow.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/grid.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/processing.js"></script>

    <?php 
      // $array=["data"=>["value1"=>"value1data"]];
      // echo json_encode($array)
    ?>
    <!-- <script id="loadScript"></script> -->
    <div id="page-notification">
        <span id="alertNo" data-number="0" class="sr-only"></span>
        <!-- <div class="alert alert-success alert-dismissible in fade" role="alert" data-id="alert1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Well done! You successfully read this important alert message.
        </div>
        <div class="alert alert-success alert-dismissible fade in" role="alert" data-id="alert2">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Well done! You successfully read this important alert message.
        </div>
        <div class="alert alert-success alert-dismissible fade in" role="alert" data-id="alert3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Well done! You successfully read this important alert message.
        </div>
 -->
    </div>
  </body>
</html>