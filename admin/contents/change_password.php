<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
?>
 <h1  class="text-center">Change Password</h1>
 <form action="admin_processor.php" method="post" class="form-group" >
     <div class="row vertical-gap">
         <div class="col-md-3">Current Password</div>
         <div class="col-md-4"><input class="form-control" type="password" required="" name="current"></div>
     </div> 
     
     <div class="row vertical-gap">
         <div class="col-md-3">New Password</div>
         <div class="col-md-4"><input class="form-control" type="password" required="" name="new"></div>
     </div>
     
     <div class="row vertical-gap">
         <div class="col-md-3">Confirm Password</div>
         <div class="col-md-4"><input class="form-control" type="password" required="" name="confirm"></div>
     </div>
     
     <div class="row vertical-gap">
         <div class="col-md-4 col-md-offset-3 text-left"><input type="submit" class="btn btn-success btn-lg" value="Change Password" name="update_password"></div>
         
     </div>
     
 </form>