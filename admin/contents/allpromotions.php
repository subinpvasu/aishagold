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
			table:'promotions',
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
        $(".active").click(function(){
            var s = confirm("Are you sure you want to change the display order?");
//alert("ok");
if(s){
        var ids = $(this).attr("id");
        
        var name = $(this).attr("name");
        
            $.ajax({
                url:"../ajax_handler.php",
                type:"post",
		data:{
			table:'promotions',
                        id:ids,
                        value:name,
                        change:1
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
<h1>All Promotions</h1>
<span class="pull-right"><i class="fa fa-plus fa-4x" aria-hidden="true"></i>
<a href="?lead=promotions">Add New</a></span>
<div id="message" class="col-md-12"></div>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Homepage Display</th>
        <th>Action</th>
                        


    </tr>
    <?php
    $products = new database_helper();
    $rows = $products->all_promotions();
    //print_r($products->all_products()->fetch_object());
    while($row = $rows->fetch_object()){
        $act = $row->actived==1?'Yes':'No';
        echo '<tr><td>'.$row->name.'</td><td><img src="'.urldecode($row->image).'" style="width:50px;height:50px;"/></td><td>'.$act.' |<a href="#" class="active" name="'.$row->actived.'" id="'.$row->id.'">Change</a></td><td><a href="?lead=promotions&promoid='.$row->id.'">Edit</a> | <a href="#" class="delete" id="'.$row->id.'">Delete</a></td></tr>';
    }
    ?>
</table>