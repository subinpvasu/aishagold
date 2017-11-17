<?php
include_once './db_operations/database_helper.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$insert = new database_helper();
if(isset($_POST['goldup']))
{
    $amount = $_POST['goldrate'];
    $oldid  = $_POST['oldid'];
    
    $insert->goldrate_settings($amount,$oldid);
}
$row = $insert->goldrate_gettings();
$result = mysqli_fetch_object($row);

?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Today's Gold Rate</h4>
      </div>
        <form method="post" action="" class="form-group">
      <div class="modal-body">
         
          <input type="hidden" name="oldid" value="<?php echo isset($result->id)?$result->id:-1; ?>"/>
              <div class="input-group">
  <span class="input-group-addon">&#8377;</span>
  <input type="text" class="form-control" name="goldrate" aria-label="Amount" value="<?php echo isset($result->price)?$result->price:''; ?>" required="">
  <span class="input-group-addon">per gram</span>
</div>
          
      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="goldup" value="Update"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div></form>
    </div>

  </div>
</div>