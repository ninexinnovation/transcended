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
<link  type="text/css" href="<?php echo base_url(); ?>assets/amcharts/plugins/export/export.css" rel="stylesheet">
</head>
  <body>
  <div id='loading'><img src="<?php echo base_url(); ?>assets/images/catLoading.gif"/></div>
    <div class="container-main">
      <!-- <div class="col-lg-6">
        <div class="portlet box">
            <div class="portlet-header">
                <div class="caption">Line Chart</div>
            </div>
            <div class="portlet-body">
                <div id="line-chart" style="width: 100%; height:300px"></div>
            </div>
        </div> -->
        <!-- <button onclick="window.location = 'command://' + encodeURIComponent('somecommand') + '&' + encodeURIComponent('param1') + '&' + encodeURIComponent('param2')">Click</button> -->
        <!-- <button onclick="hello()">Click</button> -->
      <!-- </div> -->
<!--       <div class="col-lg-6">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="viewBills">
              <thead>
                <tr>
                    <th>S.N</th>
                    <th>Bill Number</th>
                    <th>Shirt</th>
                    <th>Pant</th>
                    <th>Coat</th>
                    <th>Other</th>
                </tr>
            </thead>
            <tbody>   
            </tbody>
          </table>
        </div> -->
        <div class="col-lg-6">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dashStock">
                <thead>
                  <tr>
                      <th>Shade No.</th>
                      <th>Catagory</th>
                      <th>Quantity</th>
                  </tr>
              </thead>
              <tbody>   
              </tbody>
            </table>
          </div>
        
      </div>

    <!-- TASK BAR -->
    <div class="task-bar">
      <!-- TASK BAR MENU -->
      <span class="task-bar-item menu" id="menu-item">menu</span>
      <span class="task-bar-item btn" id="menu-btn"></span>
      <!-- TASK BAR ITEMS -->
      <div id="taskbar" class="task-bar-items"></div>
    </div>
    
    <!-- MENU CONTAINER -->
    <div class="menu-container">
      <!-- MENU CONTAINER TITLE -->
      <div class="menu-title">
        <span class="menu-title-text">
        <!-- <a href="Logout">Log Out <i class="fa fa-caret-down"> </i></a> -->
        <div class="btn-group">
          <button type="button" class="btn btn-link btn-md dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Settings <span class="caret"></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a id="changePassword" data-id="<?php echo $this->session->userdata('user_id') ?>">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="Logout">Logout</a></li>
          </ul>
        </div>
        </span>
      </div>
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

    <script src="<?php echo base_url(); ?>assets/amcharts/amcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/amcharts/serial.js"></script>
    <script src="<?php echo base_url(); ?>assets/amcharts/themes/light.js"></script>

    
    <script src="<?php echo base_url(); ?>assets/js/overflow.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/grid.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/processing.js"></script>
    <script src="<?php echo base_url(); ?>assets/amcharts/plugins/export/export.js"></script>




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
<div class="modal fade" id="AddReferrerModal" tabindex="-1" role="dialog" aria-labelledby="AddReferrerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="AddReferrerModalLabel">Add Referrer</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="addReferrer-table">
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
                <button type="button" class="btn btn-primary" id="btnAddReferrer">Select</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="billItemAddModal" tabindex="-1" role="dialog" aria-labelledby="billItemAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="billItemAddModalLabel">Add Bill Item</h4>
            </div>
            <form class="form-horizontal" onsubmit="addBillItem();return false;">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="shadeNo" class="col-md-3 control-label">Shade No.:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="shadeNo" name="shadeNo" data-update="DataProcessing/getItems">
                              <optgroup>
                                <option value="0">Other</option>
                              </optgroup>
                              <optgroup id="optGroupShadeNo">
                              </optgroup>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="clothDetails" class="col-md-3 control-label">Cloth Details :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothDetails" name="clothDetails" placeholder="Cloth Details" readonly/>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="clothCost" class="col-md-3 control-label">Cloth Cost :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="clothCost" name="clothCost" placeholder="Cost per m" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="catagory" class="col-md-3 control-label">Catagory :</label>
                        <div class="col-md-9">
                            <select class="form-control" id="catagory" name="catagory" data-update="DataProcessing/getItemCatagories">
                              <optgroup>
                                <option value="0">Other</option>
                              </optgroup>
                              <optgroup id="optGroupCategory">
                              </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wage" class="col-md-3 control-label">Wage :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="wage" name="wage" placeholder="Wage" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-md-3 control-label">Length :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="length" name="length" placeholder="Length" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="col-md-3 control-label">Quantity :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="1" placeholder="Quantity" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="customerViewModal" tabindex="-1" role="dialog" aria-labelledby="customerViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="customerViewModalLabel">View Customer</h4>
            </div>
            <form action="DataProcessing/updateDeleteCustomer" data-get-action="DataProcessing/getCustomerByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="CusId">Customer ID</label>
                    <input type="number" class="form-control" id="CusId" name="customer_id" placeholder="Enter Customer ID" disabled required>
                  </div>
                  <div class="form-group">
                    <label for="CusName">Customer Name</label>
                    <input type="text" class="form-control" id="CusName" name="customer_name" placeholder="Enter Customer Name" required>
                  </div>
             
                  <div class="form-group">
                    <label for="CusAddress">Customer Address</label>
                    <input type="text" class="form-control" id="CusAddress" name="address" placeholder="Enter Customer Address" required>
                  </div>
                  <div class="form-group">
                    <label for="CusPhone">Customer Phone number</label>
                    <input type="phone" class="form-control" id="CusPhone" name="phone_no" placeholder="Enter Customer Phone Number" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateCustomer" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteCustomer">Delete</button>
              </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="inventoryViewModal" tabindex="-1" role="dialog" aria-labelledby="inventoryViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="inventoryViewModalLabel">View Inventory</h4>
            </div>

            <form action="DataProcessing/updateDeleteInventoryItem" data-get-action="DataProcessing/getItemByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
        <label for="itemId">Item ID</label>
        <input type="number" class="form-control" id="itemId" name="item_code_no" placeholder="Enter Item ID" disabled required>
    </div>

      <div class="form-group">
        <label for="companyName">Company Name</label>
          <select class="form-control" id="companyName" name="company_id" placeholder="Enter COmpany Name" data-update="DataProcessing/getCompanies" data-model="#addCompanyInventory" required>
            <option value="">Choose Company</option>
            <option> </option>
        </select>

    </div>

      <div class="form-group">
        <label for="category">Category</label>
          <select class="form-control" id="category" name="catagory_id" data-update="DataProcessing/getItemCatagories" required>
              <option value="">Choose Item Type</option>
        </select>
        </label>
      </div>

      <div class="form-group">
        <label for="addedDate">Added Date</label>
        <input type="date" class="form-control" id="addedDate" name="f_date" placeholder="Enter Added Date" required>
      </div>

      <div class="form-group">
        <label for="sellingPrice">Selling Price</label>
        <input type="text" class="form-control" id="sellingPrice" name="selling_price" placeholder="Enter Selling Price" required>
      </div>

      <div class="form-group">
        <label for="currentQuantity">Total Quantity</label>
        <input type="text" class="form-control" id="currentQuantity" name="current_quantity" placeholder="Enter Current Quantity" required>
      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateItem" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteItem">Delete</button>
              </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="inventoryCatagoryViewModal" tabindex="-1" role="dialog" aria-labelledby="inventoryCatagoryViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="inventoryCatagoryViewModalLabel">View Inventory</h4>
                </div>

            <form action="DataProcessing/updateDeleteCatagory" data-get-action="DataProcessing/getCatagoryByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                   <div class="form-group">
                      <label for="name">Catagory ID</label>
                      <input type="number" class="form-control" id="ClId" name="catagory_id" placeholder="Enter Catagory ID" value="" disabled required>
                  </div>

                    <div class="form-group">
                      <label for="name">Catagory Name</label>
                      <input type="text" class="form-control" id="ClName" name="catagory_name" placeholder="Enter Catagory Name" required autofocus>
                   </div>
               
                    <div class="form-group">
                      <label for="name">Stiching Price (Nrs.)</label>
                      <input type="text" class="form-control" id="ClName" name="stiching_charge" placeholder="Enter Stiching Price" required>
                    </div>
                </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateCatagory" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteCatagory">Delete</button>
              </div>

            </form>
        </div>
    </div>
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



<div class="modal fade" id="workerViewModal" tabindex="-1" role="dialog" aria-labelledby="workerViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="workerViewModalLabel">View Worker</h4>
                </div>

            <form action="DataProcessing/updateDeleteWorker" data-get-action="DataProcessing/getWorkerByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
                      <label for="wrId">Worker ID</label>
                      <input type="number" class="form-control" id="wrId" name="worker_id" placeholder="Enter Worker ID" disabled required>
                  </div>

                  <div class="form-group">
                    <label for="workerName">Worker Name</label>
                    <input type="text" class="form-control" id="workerName" placeholder="Enter Worker Name" name="worker_name" required>
                 </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateItem" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteItem">Delete</button>
              </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="workerViewModal" tabindex="-1" role="dialog" aria-labelledby="workerViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="workerViewModalLabel">View User</h4>
                </div>

            <form action="DataProcessing/updateDeleteWorker" data-get-action="DataProcessing/getWorkerByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
                      <label for="wrId">Worker ID</label>
                      <input type="number" class="form-control" id="wrId" name="worker_id" placeholder="Enter Worker ID" disabled required>
                  </div>

                  <div class="form-group">
                    <label for="workerName">Worker Name</label>
                    <input type="text" class="form-control" id="workerName" placeholder="Enter Worker Name" name="worker_name" required>
                 </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateItem" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteItem">Delete</button>
              </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="measurementModal" tabindex="-1" role="dialog" aria-labelledby="measurementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="measurementModalLabel">Add Measurement</h4>
          </div>

          <div class="modal-body">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#upper" aria-controls="upper" role="tab" data-toggle="tab">Upper</a></li>
                <li role="presentation"><a href="#lower" aria-controls="lower" role="tab" data-toggle="tab">Lower</a></li>
              </ul>
              
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="upper">
                  <form onSubmit="return false;"> 
                    <input type="hidden" name="add"/>
                    <div class="form-group">
                      <label for="ulength">Length</label>
                      <input type="number" class="form-control" id="ulength" name="ulength" placeholder="Enter Upper Length" required>
                    </div>
                    <div class="form-group">
                      <label for="uWaist">Waist</label>
                      <input type="number" class="form-control" id="uWaist" name="uWaist" placeholder="Enter Upper Waist" required>
                    </div>
                    <div class="form-group">
                      <label for="uChest">Chest</label>
                      <input type="number" class="form-control" id="uChest" name="uChest" placeholder="Enter Upper Chest" required>
                    </div>
                     <div class="form-group">
                      <label for="uHip">Hip</label>
                      <input type="number" class="form-control" id="uHip" name="uHip" placeholder="Enter Upper Hip" required>
                    </div>
                    <div class="form-group">
                      <label for="uShoulder">Shoulder</label>
                      <input type="number" class="form-control" id="ushoulder" name="ushoulder" placeholder="Enter Upper Shoulder" required>
                    </div>
                    <div class="form-group">
                      <label for="uSleeve">Sleeve</label>
                      <input type="number" class="form-control" id="uSleeve" name="uSleeve" placeholder="Enter Upper Sleeve" required>
                    </div>
                    <div class="form-group">
                      <label for="uHBack">H.Back</label>
                      <input type="number" class="form-control" id="uHBack" name="uHBack" placeholder="Enter Upper H.Back" required>
                    </div>
                    <div class="form-group">
                      <label for="uNeck">Neck</label>
                      <input type="number" class="form-control" id="uNeck" name="uNeck" placeholder="Enter Upper Neck" required>
                    </div>
                    <div class="form-group">
                      <label for="ukf">K.f</label>
                      <input type="number" class="form-control" id="ukf" name="ukf" placeholder="Enter Upper K.f" required>
                    </div>
                    <div class="form-group">
                      <label for="uSO">S.O</label>
                      <input type="number" class="form-control" id="uSO" name="uSO" placeholder="Enter Upper S.O">
                    </div>
                    <hr/>
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button class="btn btn-primary" data-dismiss="modal">OK</button>
                  </form>
                </div>




                
                <div role="tabpanel" class="tab-pane fade" id="lower">
                  <form onSubmit="return false;">
                    <input type="hidden" name="add"/>
                    <div class="form-group">
                      <label for="llength">Length</label>
                      <input type="number" class="form-control" id="llength" name="llength" placeholder="Enter Lower Length" required>
                    </div>
                    <div class="form-group">
                      <label for="lWaist">Waist</label>
                      <input type="number" class="form-control" id="lWaist" name="lWaist" placeholder="Enter Lower Waist" required>
                    </div>
                    <div class="form-group">
                      <label for="lthai">Thai</label>
                      <input type="number" class="form-control" id="lthai" name="lthai" placeholder="Enter Lower Thai" required>
                    </div>
                    <div class="form-group">
                      <label for="lhip">Hip</label>
                      <input type="number" class="form-control" id="lhip" name="lhip" placeholder="Enter Lower Hip" required>
                    </div>
                    <div class="form-group">
                      <label for="lknee">Knee</label>
                      <input type="number" class="form-control" id="lknee" name="lknee" placeholder="Enter Lower Knee" required>
                    </div>
                    <div class="form-group">
                      <label for="lbottom">Bottom</label>
                      <input type="number" class="form-control" id="lbottom" name="lbottom" placeholder="Enter Lower Bottom" required>
                    </div>
                    <div class="form-group">
                      <label for="lsheet">Sheet</label>
                      <input type="number" class="form-control" id="lsheet" name="lsheet" placeholder="Enter Lower Sheet" required>
                    </div>
                    <div class="form-group">
                      <label for="linSeam">InSeam</label>
                      <input type="number" class="form-control" id="linSeam" name="linSeam" placeholder="Enter Lower InSeam">
                    </div>
                    <hr/>
                    <button type="reset" class="btn btn-default">Clear</button>
                    <button class="btn btn-primary" data-dismiss="modal">OK</button>
                  </form>
                </div>      
              </div>
            </div>
<!--      
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div> -->
        </div>
    </div>
</div>

<div class="modal fade" id="userViewModal" tabindex="-1" role="dialog" aria-labelledby="userViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="userViewModalLabel">View User</h4>
            </div>
            <form action="DataProcessing/updateDeleteUser" data-get-action="DataProcessing/getUserByIdJson" onsubmit="updateDeleteData(this);return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" placeholder="Enter User ID" disabled required>
                  </div>

                  <div class="form-group">
                    <label for="f_name">First Name</label>
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter User First Name" required>
                 </div>
             
                  <div class="form-group">
                    <label for="l_name">Last Name</label>
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter User Last Name" required>
                  </div>

                  <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter UserName" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Password </label>
                    <input type="text" class="form-control" id="pwd" name="pwd" placeholder="Enter Password" >
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name="updateUser" style="float:right;">Save</button>
                  <button type="submit" class="btn btn-danger" name="deleteUser">Delete</button>
              </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="billViewModal" tabindex="-1" role="dialog" aria-labelledby="billViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="billViewModalLabel">View Bill</h4>
                </div>

            <form action="#" class="form-horizontal" onsubmit="return false;" method="post">
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="billNo" class="col-md-3 control-label">Bill No. :</label>
                        <div class="col-md-3">
                          <input type="number" class="form-control" id="billNo" name="billNo" placeholder="Bill No" readonly/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name :</label>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" readonly />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="address" class="col-md-3 control-label">Address :</label>
                        <div class="col-md-6">
                          <textarea class="form-control" id="address" name="address" placeholder="Address"readonly /></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">      
                        <label for="date" class="col-md-5 control-label">Date :</label>
                        <div class="col-md-5">
                          <input type="text" id="dateView" class="form-control" placeholder="Current Date" readonly/> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="phone" class="col-md-5 control-label">Phone Number :</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" readonly/>
                        </div>
                      </div>

                      
                    </div>
                  </div>

                  <!-- ITEM TABLE -->

                  
                  <div class="table-responsive">
                              <table class="table table-bordered table-hover" id="billItemView-table">
                                  <thead>
                                      <tr>
                                          <th>S.No</th>
                                          <th>Details</th>
                                          <th>Amount</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                              </table>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">      
                            <label for="deliveryDate" class="col-md-5 control-label">Delivery Date :</label>
                            <div class="col-md-5">
                              <input type="text" id="deliveryDateView" class="form-control" placeholder="Delivery Date" readonly/> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="referrer" class="col-md-5 control-label">Refferer :</label>
                            <div class="col-md-5">
                              <div class="input-group">
                                  <input type="text" class="form-control" id="referrer" name="referrer" placeholder="Referrer Name" readonly/>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="subTotal" class="col-md-5 control-label">Sub-Total :</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="subTotal" name="subTotal" placeholder="Sub-Total" readonly />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="discount" class="col-md-5 control-label">Discount :</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="discount" name="discount" value="0" placeholder="Discount" readonly/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="paid" class="col-md-5 control-label">Paid :</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="`" name="paid" value="0" placeholder="Paid" readonly/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="total" class="col-md-5 control-label">Total :</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" name="dispatch" style="float:right;">Dispatch</button>
                  <button type="button" class="btn btn-danger" name="deleteBill">Delete</button>
              </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="taskViewModal" tabindex="-1" role="dialog" aria-labelledby="taskViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="taskViewModalLabel">View Task</h4>
                </div>

            <form action="#" data-get-action="DataProcessing/getWorkerTaskByIdJson" onsubmit="return false;" method="post">
              <div class="modal-body">
                  <div class="form-group">
                      <label for="wrId">Worker ID</label>
                      <input type="number" class="form-control" id="wrId" name="worker_id" placeholder="Enter Worker ID" disabled required>
                  </div>

                  <div class="form-group">
                    <label for="workerName">Worker Name</label>
                    <input type="text" class="form-control" id="workerName" placeholder="Enter Worker Name" name="worker_name" required>
                 </div>
                 <div class="table-responsive">
            <table class="table table-bordered table-hover" id="taskViewTable">
                <thead>
                  <tr>
                      <th>S.N</th>
                      <th>Bill Number</th>
                      <th>Product</th>
                      
                  </tr>
              </thead>
              <tbody>
               
              </tbody>
          </table>
      </div>



              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
              </div>

            </form>
        </div>
    </div>
</div>



     

        
  

  </body>
</html>