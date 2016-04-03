<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>MK Poshak</title>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
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
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.color-2.1.2.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
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


    <div class="modal fade" id="addCompanyInventory" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <form action="DataProcessing/addCompany" method="post" onsubmit="AddData(this);return false">
              <div class="modal-body">

                            <div class="form-group">
                              <label for="ComId">Company ID</label>
                              <input type="number" class="form-control" id="ComId" name="ComId" placeholder="Enter Company ID" data-update="DataProcessing/getLatestCompanyId" data-send="false" disabled required>
                            </div>

                            <div class="form-group">
                              <label for="ComName">Company Name</label>
                              <input type="text" class="form-control" id="ComName" name="ComName" placeholder="Enter Company Name" required>
                           </div>
                    
              </div>

              <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Cancel </button>
              </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="AddCustomerModal" tabindex="-1" role="dialog" aria-labelledby="AddCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="AddCustomerModalLabel">Add Customer</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="addCustomer-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>Phone No.</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="btnAddCustomer">Select</button>
            </div>
        </div>
    </div>
</div>




  </body>
</html>