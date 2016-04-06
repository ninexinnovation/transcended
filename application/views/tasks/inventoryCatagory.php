<div class="container">
    <form action="DataProcessing/saveInventoryCatagory" method="post" onsubmit="AddData(this);return false">
      <div class="form-group">
          <label for="name">Catagory ID</label>
          <input type="number" class="form-control" data-update="DataProcessing/getLatestInventoryCatagoryId" id="ClId" name="id" placeholder="Enter Catagory ID"  data-send="false" value="" disabled required>
        </div>

        <div class="form-group">
          <label for="name">Catagory Name</label>
          <input type="text" class="form-control" id="ClName" name="catagoryName" placeholder="Enter Catagory Name" required autofocus>
       </div>
   
        <div class="form-group">
          <label for="name">Stiching Price (Nrs.)</label>
          <input type="text" class="form-control" id="ClName" name="stichingPrice" placeholder="Enter Stiching Price" required>
        </div>

        <input type="submit" class="btn btn-success" value="Submit"></input>
      </form>
  </div>
</div> 