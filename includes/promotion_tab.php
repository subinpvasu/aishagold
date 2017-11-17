<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$promotion = new database_helper();
$result = $promotion->all_promotions();


?>
<div class="row" style="background-image: url('./images/promotion.png'); background-repeat: no-repeat; background-position: center center;">
    <div class="col-md-12 text-center">
        <img class="single-line adjust-line" src="./images/title-design.png"><h2 class="single-line white-color"> PROMOTIONS </h2><img class="single-line adjust-line" src="./images/design-title.png">
    </div>
    <div class="col-md-12 adjust-promo-gap">
        <div class="container text-center">
            
            <?php
             while($row = $result->fetch_object()){
                 if($row->type==0){
            ?>
            
             <div class="col-md-4">
                    <div class="promo-box">
                        <img src="docs/<?php echo urldecode($row->image); ?>" class="promo-image-size">
                    </div>
                </div>
            <?php
                 }else
                 {
                     ?>
            
             <div class="col-md-4">
                    <div class="promo-box">
                         <iframe class="promo-image-size" src="<?php echo $row->promo; ?>" ></iframe> 
                        
                    </div>
                </div>
            <?php
                 }
             }
            ?>
            
<!--                <div class="col-md-4">
                    <div class="promo-box">
                        <img src="./images/testimonial_1.jpg" class="promo-image-size">
                    </div>
                </div>
                 <div class="col-md-4">
                     <div class="promo-box">
                         <img src="./images/testimonial_1.jpg" class="promo-image-size">
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="promo-box">
                         <img src="./images/promo-video.jpg" class="promo-image-size">
                     </div>
                 </div>-->
                  
             
            
            </div>
    </div>
</div>

