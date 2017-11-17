<?php
include_once './db_operations/database_helper.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */

?>
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            var r = confirm("Are you sure you want to delete this item?");
//alert("ok");
if(r){
        var ids = $(this).attr("id");
            $.ajax({
                url:"../ajax_handler.php",
                type:"post",
		data:{
			table:'locations',
                        id:ids,
                        deleted:1
                        
			  
		},
		  success: function(result){
			  $("#message").html(result);
                           $("#reload").click(function(){
        location.reload(true);
    });
                      }

            });
        }
        });
    });
   
    </script>
<h1>All Locations</h1>
<span class="pull-right">
<a href="?lead=location">Add Locations</a></span>
<div id="message" class="col-md-12"></div>
<table class="table">
    <tr>
        <th>Place</th>
        <th>Address</th>
        <th>District</th>
        <th>Phone</th>
        <th>Pin</th>
        <th>Action</th>
        
                        


    </tr>
    <?php
    $products = new database_helper();
    $rows = $products->all_locations();
    //print_r($products->all_products()->fetch_object());
    while($row = $rows->fetch_object()){
        echo '<tr><td>'.$row->place.'</td><td>'.$row->address.'</td><td>'.$row->district.'</td><td>'.$row->phone.'</td><td>'.$row->pin.'</td><td><a href="?lead=location&locationid='.$row->id.'">Edit</a> | <a href="#" class="delete" id="'.$row->id.'">Delete</a></td></tr>';
    }
    ?>
</table>