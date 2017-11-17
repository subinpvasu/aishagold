<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$products = new database_helper();
   $rows = $products->diamond_products($_REQUEST['item']);
$row = mysqli_fetch_object($rows);
?>
<script type="text/javascript">
<!--
/* $(document).ready(function(){
	$(".galllery-item").click(function(){
var url = $(this).attr("src");
$(".product-desc-item").attr("src",url);
$(".product-desc-link").attr("href",url);
});
	$(".product-desc-item").hover(function(){
		var url = $(this).attr("src");
		$(".easyzoom-flyout > img").attr("src",url);
		});	
}); */
//-->
</script>


<!--  <div class="easyzoom easyzoom--adjacent">
				<a href="./includes/<?php echo urldecode($row->image); ?>">
					<img src="./includes/<?php echo urldecode($row->image); ?>" alt="" width="310" height="400" />
<!-- 				</a> -->
<!-- 			</div> -->




			



<div class="row">
    <div class="col-md-3">    
        <div class="product-box easyzoom easyzoom--adjacent hidden">
        <a href="./includes/<?php echo urldecode($row->image); ?>" class="product-desc-link">
					<img src="./includes/<?php echo urldecode($row->image); ?>" alt="" class="product-desc-item"/>
				</a>
        
            
        </div>
        <div  style="width:300px;height: 40px;display: none;">
        <?php
        $gallery = explode(",", $row->gallery); 
        foreach ($gallery as $g)
        {
            ?>
             <img class="galllery-item" alt=" "  src="includes/<?php echo $g;?>" style="width:40px;height:40px;">
            <?php 
        }
        ?>
        
           
        </div>
        
        
        <div class="product-box easyzoom easyzoom--adjacent easyzoom--with-thumbnails">
				<a href="./includes/<?php echo urldecode($row->image); ?>">
					<img src="./includes/<?php echo urldecode($row->image); ?>" alt=""  class="product-desc-item extra-width"/>
				</a>
			</div>
<div  style="width:300px;height: 40px;">
			<ul class="thumbnails" style="padding-left: 0px;">
			
			 <?php
        $gallery = explode(",", $row->gallery); 
        foreach ($gallery as $g)
        {
            ?>
           <!--   <img class="galllery-item" alt=" "  src="includes/<?php echo $g;?>" style="width:40px;height:40px;"> -->
             
             <li style="float: left;list-style-type: none;margin-right: 5px;">
					<a href="./includes/<?php echo $g;?>" data-standard="./includes/<?php echo $g;?>">
						<img src="./includes/<?php echo $g;?>" alt=" "  style="width:40px;height:40px;"/>
					</a>
				</li>
             
             
            <?php 
        }
        ?>	
			</ul>
           </div>
        
    </div>
    
    <div class="col-md-3">
        <table class="table no-border-table">
            <tr>
                <td colspan="2"><h3 class="default-color"><?php echo urldecode($row->name); ?></h3></td>
                
            </tr>
            
            <tr>
                <td colspan="2"><h4>SPECIFICATIONS</h4></td>
               
            </tr>
            
            <tr>
                <td>Gender</td>
                <td><?php echo ucfirst($row->gender); ?></td>
            </tr>
            
            <tr>
                <td>Collection</td>
                <td><?php echo $row->collection; ?></td>
            </tr>
            
            <tr>
                <td>Product</td>
                <td><?php echo $row->product_type; ?></td>
            </tr>
            
            <tr>
                <td>Product Code</td>
                <td><?php echo $row->product_code; ?></td>
            </tr>
            
            <tr>
                <td>Gold Karatage</td>
                <td><?php echo $row->karatage; ?></td>
            </tr>
            
            <tr>
                <td>Brand</td>
                <td><?php echo $row->brand; ?></td>
            </tr>
            
            <tr>
                <td>Making</td>
                <td><?php echo $row->making; ?></td>
            </tr>
            
            <tr>
                <td>Tax</td>
                <td><?php echo $row->tax; ?></td>
            </tr>
        </table>
    </div>
</div>
<script src="js/oldjs.js"></script>
<script src="js/easyzoom.js"></script>
	<script>
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	</script>

