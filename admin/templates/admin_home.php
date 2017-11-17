<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */

?>
<!-- Trigger the modal with a button -->


<!-- Modal -->

<?php
   include_once './contents/gold_rate.php';
   ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="index.php"><img src="../images/logo.png" style="height: 50px;" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav hidden">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="?lead=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
   <?php
   include_once './contents/side_menu.php';
   ?>
      <div class="col-sm-8 text-left sub-div"> 
     <?php
     
         
     
     switch(isset($_REQUEST['lead'])?$_REQUEST['lead']:'')
     {
         case 'change_password':
             include_once './contents/change_password.php';
             break;
          case 'products':
             include_once './contents/products_latest.php';
             break;
          case 'promotions':
             include_once './contents/promotions.php';
             break;
          case 'news':
             include_once './contents/news_events.php';
             break;
          case 'location':
             include_once './contents/locations.php';
             break;
          case 'list_products':
             include_once './contents/allproducts.php';
             break;
          case 'list_promotions':
             include_once './contents/allpromotions.php';
             break;
          case 'list_events':
             include_once './contents/allevents.php';
             break;
          case 'list_locations':
             include_once './contents/alllocations.php';
             break;
          case 'logout':
             include_once './contents/logout.php';
             break;
         default:
             include_once './contents/welcome.php';
             break;
     }
     
     ?>
    </div>
    <div class="col-sm-2 sidenav sub-div">
      <div class="well">
       <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Gold Rate</button>
      </div>
<!--      <div class="well">
        <p>ADS</p>
      </div>-->
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
    <p>&copy; Aisha Gold <?php echo date('Y'); ?></p>
</footer>

</body>
</html>
