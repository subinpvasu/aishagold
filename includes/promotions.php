<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$promotions = new database_helper();
   $rows = $promotions->list_promotions();
   $cols = $promotions->list_promotions();
   //$row = $rows->fetch_object();
   //$col = $cols->fetch_object();
?>
<div class="container">
<div class="row" style="height:auto;margin: 20px 0px;">
    <div class="col-md-3 adjust-line">
        <h3 class="default-color ">
PROMOTIONS</h3>
    </div>
    <div class="col-md-12">
        <?php
             while($row = $rows->fetch_object()){
                 if($row->type==0){
            ?>
            
             <div class="col-md-4 text-center vertical-gap">
                 <img src="./includes/<?php echo urldecode($row->image); ?>" class="product-desc-item extra-width">
                <h4><?php echo urldecode($row->name); ?></h4>
               
            </div>
            <?php
             }
             }
            ?>
    </div>
      </div>
    <div class="row" style="height:auto;margin: 20px 0px;">
    
    <div class="col-md-3 adjust-line">
        <h3 class="default-color ">
VIDEOS</h3>
    </div>
    <div class="col-md-12">
        <?php
             while($col = $cols->fetch_object()){
                 if($col->type==1){
            ?>
            
             <div class="col-md-4 text-center vertical-gap">
	     <div class="promo-box">
                         <iframe class="promo-image-size" src="<?php echo $col->promo; ?>" ></iframe> 
                        
                    </div>
            <!--     <img src="./includes/<?php echo urldecode($col->image); ?>" class="product-desc-item extra-width">-->
                <h4><?php echo urldecode($col->name); ?></h4>
               
            </div>
            <?php
                 }
             }
            ?>
    </div>
    
  </div>
    </div>

