<?php
include_once './db_operations/database_helper.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
if(isset($_POST['submit']))
{
    $insert = new database_helper();
   
//    $data = array(); 
  
  //  }
//        $insert = new database_helper();
    $done = 1;
    $data = array(); 
    $target_dir = "../upload_data/product/";
    try {
  if($_FILES['image']['error']==0)
  {

// $target_file = $target_dir . basename(urlencode($_FILES["image"]["name"]));
$uploadOk = 1;





$imageFileType = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
    $temp = explode(".", $_FILES["image"]["name"]);
    $target_file = $target_dir.rand(1000, 9999).time() . '.' . end($temp);
//     move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);
    
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        $done = 1;
    } else {
        echo "Sorry, there was an error uploading your file.";
        $done = 0;
    }
}

  }else
  {
      $target_file = urldecode($_POST['oldimage']);
  }
    }
 catch (Exception $e){//
     }

   
$data['place']= $_POST['place'];
$data['address']= $_POST['address'];
$data['district']= $_POST['district'];
$data['phone']= $_POST['phone'];
$data['pin']= $_POST['pin'];
$data['maptype']= $_POST['maptype'];
$data['longitude']= $_POST['longitude'];
$data['latitude']= $_POST['latitude'];
$data['zoom']= $_POST['zoom'];
$data['image']= $target_file;
$upstatus = $_POST['up_status'];

if($insert->locations_insert($data,$upstatus)>0)
{
    echo '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Location uploaded successfully.
</div>';
    $insert->redirect_home(5);
    
}

    

}else if(isset($_REQUEST['locationid']))
{
     $update = new database_helper();
     $rows = $update->all_locations($_REQUEST['locationid']);
     $result = mysqli_fetch_object($rows);
}
    
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="up_status" value="<?php echo isset($_REQUEST['locationid'])?$_REQUEST['locationid']:-1; ?>"/>
    <input type="hidden" name="oldimage" value="<?php echo isset($_REQUEST['locationid'])?$result->image:''; ?>"/>
    <table class="table">
        <tr><td colspan="2"><h3>Upload Locations</h3></td></tr>
        <tr><td>Place</td>
            <td><input type="text" name="place" value="<?php echo isset($_POST['place'])?$_POST['place']:(isset($result->place)?$result->place:''); ?>" size="40"/></td></tr>
         
            
            <tr>
                <td>Address</td>
                <td><input type="text" value="<?php echo isset($_POST['address'])?$_POST['address']:(isset($result->address)?$result->address:''); ?>" name="address" size="40"/></td>
            </tr>
            
            <tr>
                <td>District</td>
                <td><input type="text" value="<?php echo isset($_POST['district'])?$_POST['district']:(isset($result->district)?$result->district:''); ?>" name="district" size="40"/></td>
            </tr>
            
            <tr>
                <td>Phone</td>
                <td><input type="text"  value="<?php echo isset($_POST['phone'])?$_POST['phone']:(isset($result->phone)?$result->phone:''); ?>" name="phone" size="40"/></td>
            </tr>
            
            <tr>
                <td>Pin</td>
                <td><input type="text"  value="<?php echo isset($_POST['pin'])?$_POST['pin']:(isset($result->pin)?$result->pin:''); ?>" name="pin" size="40"/></td>
            </tr>
            <tr>
                <td>Map Type</td>
                <td>
                     <?php $category = isset($_POST['maptype'])?$_POST['maptype']:(isset($result->maptype)?$result->maptype:''); ?>
                       <select name="maptype">
                                
                                <option <?php if($category=='ROADMAP'){echo 'selected';}?>  value="ROADMAP">ROADMAP</option>
                                <option <?php if($category=='SATELLITE'){echo 'selected';}?>  value="SATELLITE">SATELLITE</option>
                                <option <?php if($category=='HYBRID'){echo 'selected';}?>  value="HYBRID">HYBRID</option>
                                <option <?php if($category=='TERRAIN'){echo 'selected';}?>  value="TERRAIN">TERRAIN</option>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td>Zoom</td>
                <td>
                     <input type="number"  value="<?php echo isset($_POST['zoom'])?$_POST['zoom']:(isset($result->zoom)?$result->zoom:''); ?>" name="zoom" size="40"/>
                    
                </td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td><input type="text"  value="<?php echo isset($_POST['longitude'])?$_POST['longitude']:(isset($result->longitude)?$result->longitude:''); ?>" name="longitude" size="40"/></td>
            </tr>
            <tr>
                <td>Latitude</td>
                <td><input type="text"  value="<?php echo isset($_POST['latitude'])?$_POST['latitude']:(isset($result->latitude)?$result->latitude:''); ?>" name="latitude" size="40"/></td>
            </tr>
              <tr>
                <td>Building Image</td>
                <td><input type="file" name="image" size="40"/><img alt=" " src="<?php echo isset($_REQUEST['locationid'])?urldecode($result->image):''; ?>" style="width:30px;height:30px;"></td>
            </tr>
            
            
            
            
            
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success btn-lg" name="submit" value="Upload"/>
                    <a href="?lead=list_locations" class="btn btn-link btn-lg">Cancel</a>
                </td>
            </tr>
    </table>
    
</form>
    