<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor. 
 * A mangosoft.in production.
 */
$goldrate = new database_helper();
$rows = $goldrate->gold_rate();
$row = mysqli_fetch_object($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Aisha Gold</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="css/easyzoom.css" >

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css">


    

</head>
<body>

	<div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12 header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 single-line full-width to-align" style="padding-top: 2px;">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
 <span>aishagold916@gmail.com</span>
</div>
                            <div class="col-md-4 hidden-sm hidden-xs"></div>
                            <div class="col-md-4 col-sm-6 single-line suppress-here to-right"  style="padding-top: 2px;">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>0497-2786230</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 header-middle">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-4 to-align">
                            <a href="index.php"><img src="images/logo.png" ></a>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-2 left-partition">
                            <div style="height:10px;"></div>
                            <img src="images/helpdesk.png">
                        </div>
                        <div class="col-md-2 left-partition">
                            <div style="height:10px;"></div>
                            <div class="goldrate-box">
                                Gold 1g: <img src="images/rs.png"><?php echo $row->price; ?>
                            </div>
                        </div>
                    </div>
                        </div>
                </div>
                <div class="col-md-12 header-menu hidden">
                    <div class="container">
                    <div id="buttons">
    <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="products.php?class=diamond">Diamond</a></li>
        <li><a href="products.php?class=Gold">Gold</a></li>
        <li><a href="products.php?class=silver">Silver</a></li>
        <li><a href="products.php?class=watches">Watches</a></li>
        <li><a href="#">Promotions</a></li>
        <li><a href="products.php?class=locations">Stores</a></li>
    </ul>
</div>
                    </div>
                </div>
            </div>
            <div class="row">
            <nav class="navbar navbar-default">
 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      </div>
    <div class="collapse navbar-collapse" id="myNavbar">
         <div class="container">
                    <div id="buttons">
      <ul class="nav navbar-nav">
        <li><a href="products.php?class=aboutus">About Us</a></li>
        <li><a href="products.php?class=diamond">Diamond</a></li>
        <li><a href="products.php?class=gold">Gold</a></li>
        <li><a href="products.php?class=silver">Silver</a></li>
        <li><a href="products.php?class=watches">Watches</a></li>
        <li><a href="products.php?class=promotions">Promotions</a></li>
        <li><a href="products.php?class=locations">Stores</a></li>
      </ul>
                    </div></div>
      
    </div>

</nav></div>