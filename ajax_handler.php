<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */

if(isset($_POST['deleted']) && $_POST['deleted']==1)
{
    $table = $_POST['table'];
    $id    = $_POST['id'];
    
    $delete = new database_helper();
    $delete->delete_row($table, $id);
    echo '<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" id="reload" aria-label="close">&times;</a>
    <strong>Success!</strong> Item Deleted.
  </div>';
}
if(isset($_POST['change']) && $_POST['change']==1)
{
    $table = $_POST['table'];
    $id    = $_POST['id'];
    $value = $_POST['value'];
    $val = $value==1?0:1;
    
    $delete = new database_helper();
    $delete->update_row($table, $id,$val);
    echo '<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" id="reload" aria-label="close">&times;</a>
    <strong>Success!</strong> Item Updated.
  </div>';
}
