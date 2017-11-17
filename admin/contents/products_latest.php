<?php
error_reporting(0);
include_once './db_operations/database_helper.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
if(isset($_POST['submit']))
{
//    echo '<pre>';
//    print_r($_POST);
//    print_r($_FILES);exit();
    $insert = new database_helper();
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
  
  /**
 * begin
 */
 $extension=array("jpeg","jpg","png","gif");
 $gallery = array();
    foreach($_FILES["photo"]["tmp_name"] as $key=>$tmp_name)
            {
                if($_FILES['photo']['error'][$key]==4 )
                {
                    $gallery[$key] = $_POST['oldphoto'.$key];
                }else
                {
       
                $file_name=$_FILES["photo"]["name"][$key];
                $temp = explode(".", $_FILES["photo"]["name"][$key]);
                $file_tmp=$_FILES["photo"]["tmp_name"][$key];
                $targeted_file = $target_dir.rand(1000, 9999).time() . '.' . end($temp);
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                        if(move_uploaded_file($_FILES["photo"]["tmp_name"][$key],$targeted_file))
                        {
                            $gallery[$key] = $targeted_file;
                        }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
                }
            }
    }catch (Exception $e){ print_r($e);}
/**
 * end
 */

  
  //  }
    if($done==1)
    {
            
   
$data['rawdata']= $_POST['productlog'];
$data['name']= $_POST['name'];
//$data['gender']= $_POST['gender'];
//$data['collection']= $_POST['collection'];
//$data['product_type']= $_POST['product'];
//$data['product_code']= $_POST['code'];
//$data['karatage']= $_POST['karat'];
//$data['brand']= $_POST['brand'];
//$data['making']= $_POST['making'];
//$data['tax']= $_POST['tax'];
$data['image']= urlencode($target_file);
$data['category'] = $_POST['category'];
//$data['subcategory'] = $_POST['subcategory'];
$upstatus = $_POST['up_status'];

if($insert->product_insert_latest($data,$upstatus,$gallery)>0)
{
    echo '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Product uploaded successfully.
</div>';
    $insert->redirect_home(1);
    
}

    }

}else if(isset($_REQUEST['productid']))
{
     $update = new database_helper();
     $rows = $update->all_products($_REQUEST['productid']);
     $result = mysqli_fetch_object($rows);
}
    
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="up_status" value="<?php echo isset($_REQUEST['productid'])?$_REQUEST['productid']:-1; ?>"/>
    <input type="hidden" name="oldimage" value="<?php echo isset($_REQUEST['productid'])?$result->image:''; ?>"/>
    
    <input type="hidden" name="oldphoto0" value="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[0]:''; ?>"/>
    <input type="hidden" name="oldphoto1" value="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[1]:''; ?>"/>
    <input type="hidden" name="oldphoto2" value="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[2]:''; ?>"/>
    <input type="hidden" name="oldphoto3" value="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[3]:''; ?>"/>
    <input type="hidden" name="oldphoto4" value="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[4]:''; ?>"/>
    <table class="table">
        <tr><td colspan="2"><h3>Upload Products</h3></td></tr>
        <tr><td>Product Name</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:(isset($result->name)?$result->name:''); ?>" size="40"/></td></tr>
         <tr>
                <td>Category</td>
                <td>
                    <?php $category = isset($_POST['category'])?$_POST['category']:(isset($result->category)?$result->category:''); ?>
                    <select name="category">
                                <option <?php if($category==''){echo 'selected';}?> value="">Select</option>
                                <option <?php if($category=='diamond'){echo 'selected';}?>  value="diamond">Diamond</option>
                                <option <?php if($category=='gold'){echo 'selected';}?>  value="gold">Gold</option>
                                <option <?php if($category=='silver'){echo 'selected';}?>  value="silver">Silver</option>
                                <option <?php if($category=='watch'){echo 'selected';}?>  value="watch">Watches</option>
                    </select></td>
            </tr>
        <tr>
            <td>Product Details</td><td>
                <textarea class="" placeholder='Add features like "subcategory":"bangle","gender":"female", ' name="productlog" id="productlog" style="width:400px;height:400px;"><?php echo $result->rawdata; ?></textarea>
                
            </td>
            
            
        </tr>
            
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" size="40"/><img alt=" " src="<?php echo isset($_REQUEST['productid'])?urldecode($result->image):''; ?>" style="width:30px;height:30px;"></td>
            </tr>
                      
            <tr>
                <td>Image - 1</td>
                <td><input type="file" name="photo[]" size="40"/>
                <img alt=" "  src="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[0]:''; ?>" style="width:30px;height:30px;" ></td>
            </tr>
            
            <tr>
                <td>Image - 2</td>
                <td><input type="file" name="photo[]" size="40"/><img alt=" "  src="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[1]:''; ?>" style="width:30px;height:30px;" ></td>
            </tr>
            
            <tr>
                <td>Image - 3</td>
                <td><input type="file" name="photo[]" size="40"/><img alt=" "  src="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[2]:''; ?>" style="width:30px;height:30px;" ></td>
            </tr>
            
            <tr>
                <td>Image - 4</td>
                <td><input type="file" name="photo[]" size="40"/><img alt=" "  src="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[3]:''; ?>" style="width:30px;height:30px;" ></td>
            </tr>
              
            <tr>
                <td>Image - 5</td>
                <td><input type="file" name="photo[]" size="40"/><img alt=" " src="<?php echo isset($_REQUEST['productid'])?explode(",",$result->gallery)[4]:''; ?>" style="width:30px;height:30px;" ></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success btn-lg" name="submit" value="Upload"/>
                    <a href="?lead=list_products" class="btn btn-link btn-lg">Cancel</a>
                </td>
            </tr>
    </table>
    
</form>
    