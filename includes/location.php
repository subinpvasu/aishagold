<?php
include_once './config/config.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
$products = new database_helper();
   $rows = $products->locations_list();
   
?>
<div class="container">
<div class="row" style="min-height: 620px;height:auto;margin: 20px 0px;">
    <div class="col-md-3 adjust-line">
        <h3 class="default-color "><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
OUR STORES</h3>
    </div>
    <div class="col-sm-5 vertical-gap" >
        <div class="form-group">

  
  <select class="form-control " id="stores">
      
      <?php
      //echo '<option value="'.$rows->place.'">'.ucfirst($rows->place).'</option>';
      
      $json = array();
             while($row = $rows->fetch_object()){
             echo '<option value="'.$row->id.'">'.ucfirst($row->place).'</option>';
             $json[] = $row;
             
             }
            
      ?>
      
  </select>
            
</div>

    </div>
    <div class="col-md-4 col-md-offset-1" id="googleMap" style="width:500px;height:380px;">
       
    </div>
    <div class="col-md-4 col-md-offset-1">
        <h3>AISHA GOLD</h3>
        <div id="address"></div>
        <div id="district"></div>
        <div id="contact"></div>
        <div id="pincode"></div>        
        <div id="building"></div>
        
    </div>
  </div>
    </div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB30sd8sbJwSXsMBtb2b-Xr2EfDMeD6mxc"></script>
        <script>
    $(document).ready(function(){
         var location = <?php print json_encode($json);?>;
         
         initialize(location[0].longitude,location[0].latitude,parseInt(location[0].zoom),location[0].maptype);
             address_details(location[0].address,location[0].district,location[0].phone,location[0].image,location[0].pin);
         
         $("#stores").change(function(){
             //alert(location[$(this).val()-].place);
             initialize(location[$(this).val()-1].longitude,location[$(this).val()-1].latitude,parseInt(location[$(this).val()-1].zoom),location[$(this).val()-1].maptype);
             address_details(location[$(this).val()-1].address,location[$(this).val()-1].district,location[$(this).val()-1].phone,location[$(this).val()-1].image,location[$(this).val()-1].pin);
             
             
         });
    });
   
        



function initialize(longitude,latitude,zoom,maptype)
{
    var myCenter=new google.maps.LatLng(latitude,longitude);
var mapProp = {
  center:myCenter,
  zoom:zoom,
  mapTypeId:google.maps.MapTypeId.maptype
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter
  });

marker.setMap(map);
}

function address_details(address,district,contact,building,pin)
{
    $("#address").html(address);
    $("#district").html(district);
    $("#contact").html('PHONE : '+contact);
    $("#pincode").html('PIN : '+pin);
    $("#building").html('<img src="includes/'+building+'" style="width:250px;height:250px;" alt=" ">');
}

</script>