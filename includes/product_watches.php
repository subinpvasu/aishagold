<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$products = new database_helper();
   $rows = $products->watch_products();
   $cols = $products->watch_products();
?>
<script>
    $(document).ready(function(){
        $("#all").hide();
        $(".product-menu li").click(function(){
            var cls = $(this).attr("id");
            $(".watch_prd").hide();
            $("."+cls).show();
            $("#all").show();
        });
        $("#all").click(function(){
            $(".watch_prd").show();
            $("#all").hide();
        });
    });
    </script>
<div class="row">
    <div class="col-sm-3">
        <h3 class="default-color under-line">COLLECTIONS</h3>
        <ul class="product-menu">
             <?php
            while($col = $cols->fetch_object()){
                $total = explode(",",$col->rawdata);
                for($i=0;$i<count($total);$i++)
                {
                    $td = explode(":", $total[$i]);
                  if(strtolower(str_replace('"','',$td[0]))=='subcategory')
                  {
                     //echo strtolower(str_replace('"','',$td[1]));
echo '<li id="'.strtolower(str_replace(' ','',str_replace('"','',$td[1]))).'"><i class="fa fa-angle-double-right" aria-hidden="true"></i> '.strtoupper(str_replace('"','',$td[1])).'</li>';
                    // echo '<br/>';
                  }
                }
                
            }
            ?>
            
<!--           <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Titan</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Maxima</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Rado</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Rolex</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Police</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tissot</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Sonata</li>
            <li id=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Casio</li>-->
             <li id="all"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Show All</li>
        </ul>
    
    </div>
    <div class="col-sm-9" style="min-height: 620px;height:auto;margin: 20px 0px;">
        <div class="row">
              <?php
             while($row = $rows->fetch_object()){
                 $cls = '';
                  $totalz = explode(",",$row->rawdata);
                for($i=0;$i<count($totalz);$i++)
                {
                    $tdz = explode(":", $totalz[$i]);
                  if(strtolower(str_replace('"','',$tdz[0]))=='subcategory')
                  {
                    $cls = strtolower(str_replace(' ','',str_replace('"','',$tdz[1])));
                  }
                }
            ?>
            
             <div class="col-md-3 text-center vertical-gap <?php echo $cls ?> watch_prd">
                 <img src="./includes/<?php echo urldecode($row->image); ?>" class="product-desc-item">
                <h4><?php echo urldecode($row->name); ?></h4>
                <div class="jewellery-bottom-box" >
                    <a href="product_description.php?item=<?php echo $row->id ?>"><h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6></a>
                            </div>
            </div>
            <?php
             }
            ?>
<!--            <div class="col-md-3 text-center">
                <img src="./images/product.png">
                <h4>Product One</h4>
                <div class="jewellery-bottom-box" >
                                <h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6>
                            </div>
            </div>
            <div class="col-md-3 text-center">
                <img src="./images/product.png">
                <h4>Product One</h4>
                <div class="jewellery-bottom-box" >
                                <h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6>
                            </div>
            </div>
            <div class="col-md-3 text-center">
                <img src="./images/product.png">
                <h4>Product One</h4>
                <div class="jewellery-bottom-box" >
                                <h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6>
                            </div>
            </div>
            <div class="col-md-3 text-center">
                <img src="./images/product.png">
                <h4>Product One</h4>
                <div class="jewellery-bottom-box" >
                                <h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6>
                            </div>
            </div>
             <div class="col-md-3 text-center">
                <img src="./images/product.png">
                <h4>Product One</h4>
                <div class="jewellery-bottom-box" >
                                <h6>VIEW DETAILS <span class="glyphicon glyphicon-play"></span></h6>
                            </div>
            </div>-->
        </div>
    </div>
  </div>