<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$promotion = new database_helper();
$result = $promotion->all_news_events();


?>
<div class="row">
    <div class="col-md-12" style="height:350px;">
        <div class="col-md-12 text-center">
        <img class="single-line adjust-line" src="./images/event-title.png">
        <h2 class="single-line black-color"> NEWS & EVENTS </h2>
        <img class="single-line adjust-line" src="./images/title-event.png">
        </div>
        
        <div class="col-md-12 adjust-promo-gap">
        <div class="container text-center">
            
             <?php
             while($row = $result->fetch_object()){
            ?>
             <div class="col-md-3">
                    <div class="promo-box">
                       <img src="docs/<?php echo urldecode($row->image); ?>" class="promo-image-size">
                    </div>
                </div>
          
            <?php
             }
            ?>
            
<!--                <div class="col-md-3">
                    <div class="promo-box">
                        <img src="./images/testimonial_1.jpg" class="promo-image-size">
                    </div>
                </div>
                 <div class="col-md-3">
                     <div class="promo-box">
                         <img src="./images/testimonial_1.jpg" class="promo-image-size">
                     </div>
                 </div>
                 <div class="col-md-3">
                     <div class="promo-box">
                         <img src="./images/promo-video.jpg" class="promo-image-size">
                     </div>
                 </div>
            
                  <div class="col-md-3">
                     <div class="promo-box">
                         <img src="./images/promo-video.jpg" class="promo-image-size">
                     </div>
                 </div>-->
                  
            
            
            </div>
    </div>
        
    </div>
</div> 
