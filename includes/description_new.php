<?php
error_reporting(0);
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

<link rel="stylesheet" href="zoom/jquery.fancybox.css" />
<script src="zoom/jquery.min.js" type="text/javascript"></script> 
<script src="zoom/jquery-ui.min.js" type="text/javascript"></script>
<script src="zoom/jquery.elevatezoom.min.js" type="text/javascript"></script>
<script src="zoom/jquery.fancybox.pack.js" type="text/javascript"></script>
			
<style>
body, .table{
line-height: 1.6;
}
 .table.transparent {
	padding: 20px;
}
h1 { font-size: 30px; }
h2 { font-size: 28px; }
h3 { font-size: 25px; }
h4 { font-size: 20px; }
h5 { font-size: 18px; }
h6 { font-size: 16px; }
.table thead td {
	background-color: #eb2729;
	color: white;
	font-weight: bold;
}
.table td {
	padding: 10px 5px;
}
.table tbody td, .table tbody tr.no_border td.border {
	background-image: url(images/horizontal.png);
	background-repeat: repeat-x;
}
.table tbody tr.no_border td, .table tbody td.no_border {
	background-image: none;
}
.table tr.even td {
/*	background-color: rgb(230, 240, 215);
	background-color: rgba(230, 240, 215, 0.5);*/
}
.table tbody * {
/*	font-size: 13px;*/
}
.table tbody small {
	font-size: 12px;
	font-style: italic;
}
.table tbody code {
	font-size: 12px;
}
.table td.italic {
	font-style: italic;
}
.table td ul {
	margin: 0;
	padding-left: 0;
	list-style: none;
}
.table td ul li span {
	display: block;
	float: left;
	width: 80px;
}
.table td ul.indent li span {
	padding-left: 20px;
}
.table .arrow {
	margin: 7px 0 0 10px;
}
.transparent {
	background: url(images/transparent.png) 0 0 repeat-y transparent;
}
.transparent .image_carousel, 
.transparent .list_carousel, 
.transparent .html_carousel, 
.transparent .wheel_of_fortune,
.fold_horizontal {
	background: url(images/horizontal.png) left bottom repeat-x transparent;
}
.transparent, .transparent_top, .transparent_bottom, .transparent_schoolboard {
	margin: 0 -10px;
	padding: 0 10px;
}
.transparent_top, .transparent_bottom {
	background: url(images/bottom.png) 0 0 no-repeat transparent;
}
.transparent_top {
	height: 30px;
}
.transparent_bottom {
	background-position: 0 -90px;
	height: 10px;
}
.transparent_top.p1 {
	background-position: 0 -30px;
}
.transparent_top.p2 {
	background-position: 0 -60px;
}
#zoom1, #zoom2, #zoom3, #zoom4, #zoom5{
border: 1px solid #E8E8E6;
}
.zoomWrapper img{
    width:250px !important;
    height:250px !important;
}
</style>
<script>
 $(function() {
	var $ctb = $('.table tbody'),
		$cta = $ctb.find( 'td .arrow' )
		$ctr = $cta.parents( 'tr' );
	//	object toggelen
	$cta.click(function() { return false; });
	$ctr.find( 'td:lt(2)' ).hover(
		function() { $(this).parent().addClass( 'hover' ); },
		function() { $(this).parent().removeClass( 'hover' ); }
	).click(function() {
		$('span.params', this).toggle();
		$(this).parent().toggleClass( 'closed' ).find( 'td:eq(1) small span' ).each(function() {
			if ( this.style.display == 'none' )	$(this).show();
			else								$(this).hide();
		});
		var obj = $('.' + $(this).parent().next().attr( 'id' ));
		if ( obj[ 0 ].style.display == 'none')	obj.show();
		else                                	obj.hide();
		return false;
	}).css( 'cursor', 'pointer' ).end().find( 'td:lt(1)' ).click();
	//	achtergrond even/oneven
	$ctb.each(function() {
		var ctrn = 0;
    $('.table tbody tr:odd').addClass('odd');
    $('.table tbody tr:even').addClass('even');
	});
	//	code + italic
	$ctb.find( 'tr' ).each(function() {
		if ( $('td', this).length == 5 ) $(this).find( 'td:eq(2)' ).wrapInner( '<code />' ).end().find( 'td:eq(3)' ).addClass( 'italic' );
		if ( $('td', this).length == 4 ) $(this).find( 'td:eq(2)' ).addClass( 'italic' );
		if ( $('td', this).length == 3 ) $(this).find( 'td:eq(1)' ).addClass( 'italic' );
	});
});
</script>
<style>
                             a.lotus {
background-size: 113px !important;
background-color: #333;
display: block;
float: left;
width: 133px;
height: 39px;
margin-left: -46px;
opacity: 0;
filter: alpha(opacity = 0);
background: url(images/elevatesmall.png) 11px 2px no-repeat;
z-index: 1;
position: relative;
}
                   </style>
  	<script type="text/javascript">
  $(window).load(function(){
	$(function() {
		var top,
    	outerbar    = $(".TopNavListOuter"),
			bar    = $("#TopNavList"),
			offset = $("#nav-bar-anchor").offset().top,
			menu   = $('#menu-main'),
			lotus  = $('a.lotus'),
      topmenu = $('.menutop'),
			shimLeft = $('#shim1'),
			shimRight = $('#shim2'),
			trial  = $('#try-button-sm'),
			phone  = $('#phone-number'),
			home   = $('#login-link').length === 1, 
			expanded = false,
			buddhy = $('#access-footer-colophon span.buddhy'),
			didScroll = false,
			disabled = false,
			inner = $(window).height();
		$(window).scroll(function() {
			if(!disabled && 1 == 2) {
				top = $(this).scrollTop();
				if (top > offset) {
        outerbar.css({
						'position':'fixed',
						'top':'-2px',
            'left':'-2px',
						'height':'39px',
						'width':'100%',
            'background-color':'#444',
						'z-index':'999',
	          			'box-shadow': '0px 0px 8px 0px rgba(0,0,0,0.4)'
					});
					bar.css({
						'height':'39px',
					   'margin':'0 auto',
              'width':'1020px',
            'background-color':'#444',
						'z-index':'999',
	          			'box-shadow': '0px 0px 8px 0px rgba(0,0,0,0.4)'
					});
					if(!expanded) {
						shimLeft.animate({'margin-left':'0px'}, 150);
						menu.animate({'margin-left':'0px'}, 250);
						lotus.animate({'margin-left':'0px', 'opacity':'1'}, 250).show();
            // topmenu.css({'width':'887px'});
						expanded = true;
					}
				} else if (top <= offset) {
					bar.attr('style', '');
          	outerbar.attr('style', '');
										lotus.css({'opacity':0}).animate({'margin-left':'-46px', 'opacity':'0'}, 200);	
					if(expanded) {
						menu.animate({'margin-left':'0px'}, 100);
						shimLeft.animate({'margin-left':'0px'}, 150);
						lotus.css({'opacity':1}).animate({'margin-left':'-46px', 'opacity':'0'}, 200).hide();
						expanded = false;
					}
				}
			}
  	 		didScroll = true;
		});
		$(window).trigger('scroll');
	});
});
	//	$('a.tooltip').tooltip();
  </script>
 <style>
  .zoom-left{
  float:left;
  width:412px;
  }
  .zoom-right{
  float:left;
  width:320px;
    padding:20px;
  }
  body {
}
hr {
   margin: 13px 0;   
}
hr.style-one {
    border: 0;
    height: 1px;
    background: #333;
    background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc); 
    background-image:      -o-linear-gradient(left, #ccc, #333, #ccc); 
}
hr.style-two {
    border: 0;
    height: 0px;
    background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
    background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
}
hr.style-three {
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
}
.zoom-wrapper{
/*border-radius: 10px;
border: 1px solid #E0E0E0;
padding: 10px;
background-color: #F7F7F7;*/
}
h6 {
clear: both;
margin-top: 13px !important;
font-size: 15px !important;
margin-top: 7px !important;
}
 </style>
 <style type="text/css">
.view_source {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #129948), color-stop(1, #076a39) );
	background:-moz-linear-gradient( center top, #129948 5%, #076a39 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#129948', endColorstr='#076a39');
	background-color:#129948;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
}.view_source:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #076a39), color-stop(1, #129948) );
	background:-moz-linear-gradient( center top, #076a39 5%, #129948 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#076a39', endColorstr='#129948');
	background-color:#076a39;
}.view_source:active {
	position:relative;
	top:1px;
}
.menutop{
z-index:3;
}
/* This imageless css button was generated by CSSButtonGenerator.com */
</style>
 <style>
  .zoomContainer{
  margin-bottom:5px;
  border: 1px solid #e8e8e6;
  width:250px !important;
  height: 250px !important;
  }
  .zoom-gallery-hover{
  border: 2px solid orange;
  }
  </style>
  <div class="row">
      <div class="col-md-2"></div>
    <div class="col-md-3 vertical-gap">    
       
        
        
        
      

        
  
<div class="zoom-wrapper">
<div class="zoom-left">
<img style="" id="img_01" src="./includes/<?php echo urldecode($row->image); ?>" 
data-zoom-image="./includes/<?php echo urldecode($row->image); ?>"
width="250px" height="250px;"  />
<div id="gal1" style="width:300px;float:left;margin-top: 10px; ">
    
    <a  href="#" class="elevatezoom-gallery" data-update="" data-image="./includes/<?php echo urldecode($row->image); ?>" 
data-zoom-image="./includes/<?php echo urldecode($row->image); ?>">
<img  style="width:40px;height:40px;" alt=" "  src="./includes/<?php echo urldecode($row->image); ?>" 
data-zoom-image="./includes/<?php echo urldecode($row->image); ?>"
 /></a>
    <?php
     $gallery = explode(",", $row->gallery); 
        foreach ($gallery as $g)
        {
            ?>
          
             <a  href="#" class="elevatezoom-gallery" data-update="" data-image="./includes/<?php echo $g;?>" 
data-zoom-image="./includes/<?php echo $g;?>">
<img id="" src="./includes/<?php echo $g;?>"  style="width:40px;height:40px;" alt=" " ></a>
             
            <?php 
        }
        ?>
    
    


</div>
</div>
    
</div>
          </div>
      <script type="text/javascript">
$(document).ready(function () {
	      $("#zoom_06").elevateZoom({
    	  		zoomType				: "inner",
            debug : true,
            cursor: "crosshair"
    	  		}); 
}); 
</script>  
<script type="text/javascript">
  $(document).ready(function () {
     $("#select").change(function(e){
   var currentValue = $("#select").val();
  
	// Using default configuration
 	 var ez =   $('#img_01').data('elevateZoom');	  
	ez.swaptheimage(smallImage, largeImage); 
    });
	// Using custom configuration
	$("#img_01").elevateZoom({
    zoomWindowFadeIn : 500,
    zoomLensFadeIn: 500,
		gallery				: "gal1",
		imageCrossfade: true,
    zoomWindowWidth:411,
    zoomWindowHeight:274,
    zoomWindowOffetx: 10,
    scrollZoom: true, 
    cursor:"pointer"			
	});
    $("#img_01").bind("click", function(e) {  
	 var ez =   $('#img_01').data('elevateZoom');	
	$.fancybox(ez.getGalleryList());
            return false;
    });
	$("#img_02").elevateZoom({
		gallery				: "gal2",
    tint: true,
    cursor:"crosshair",	
    windowHeight:600		
	});
    	      $("#img_03").elevateZoom({
    	  		zoomType				: "lens",
    	  		lensShape : "round",
            lensSize    : 200
    	  		});
    $("#img_02").bind("click", function(e) {  
	 var ez =   $('#img_02').data('elevateZoom');	
	$.fancybox(ez.getGalleryList());
            return false;
    });    
    });
  </script>



    
    <div class="col-md-3">
        <table class="table no-border-table" id="products">
            <tr>
                <td colspan="2"><h3 class="default-color"><?php echo urldecode($row->name); ?></h3></td>
                
            </tr>
            
            <tr>
                <td colspan="2"><h4>SPECIFICATIONS</h4></td>
                <?php
               $total = explode(",",$row->rawdata);
              
               for($i=0;$i<count($total);$i++)
               {
                   $td = explode(":", $total[$i]);
                  if(strtolower(str_replace('"','',$td[0]))=='subcategory')
                  {
                      //
                  }
                  else
                  {
         echo '<tr><td>'.ucwords(str_replace('"','',$td[0])).'</td><td>'.ucwords(str_replace('"','',$td[1])).'</td></tr>';
                  }
                 
               }
                ?>
               
            </tr>
            
            
        </table>
    </div>
</div>

	
