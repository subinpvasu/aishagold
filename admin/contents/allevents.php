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
			table:'news_events',
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
<h1>All Events</h1>
<span class="pull-right">
<a href="?lead=news">Add New</a></span>
<div id="message" class="col-md-12"></div>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
                        


    </tr>
    <?php
    $products = new database_helper();
    $rows = $products->all_events();
    //print_r($products->all_products()->fetch_object());
    while($row = $rows->fetch_object()){
        echo '<tr><td>'.$row->name.'</td><td><img src="'.urldecode($row->image).'" style="width:50px;height:50px;"/></td><td>'.$row->actived.'</td><td><a href="?lead=news&newsid='.$row->id.'">Edit</a> | <a href="#" class="delete" id="'.$row->id.'">Delete</a></td></tr>';
    }
    ?>
</table>