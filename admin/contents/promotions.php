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
    $done = 1;
    $data = array(); 
  if($_FILES['image']['error']==0)
  {
$target_dir = "../upload_data/promo/";
$target_file = $target_dir . basename(urlencode($_FILES["image"]["name"]));
$uploadOk = 1;
$done = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
    if($done==1)
    {
            
 
$data['name']= $_POST['name'];
$data['promo']= $_POST['promo'];
$data['type']= $_POST['type'];

$data['image']= urlencode($target_file);
$upstatus = $_POST['up_status'];

if($insert->promotion_insert($data,$upstatus)>0)
{
    echo '<div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Promotion uploaded successfully.
</div>';
    $insert->redirect_home(2);
}

    }

}
else if(isset($_REQUEST['promoid']))
{
     $update = new database_helper();
     $rows = $update->all_promotions($_REQUEST['promoid']);
     $result = mysqli_fetch_object($rows);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="up_status" value="<?php echo isset($_REQUEST['promoid'])?$_REQUEST['promoid']:-1; ?>"/>
    <input type="hidden" name="oldimage" value="<?php echo isset($_REQUEST['promoid'])?$result->image:''; ?>"/>
    
    <table class="table">
        <tr><td colspan="2"><h3>Upload Promotions</h3></td></tr>
        <tr><td>Promotion Name</td>
            <td><input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:(isset($result->name)?$result->name:''); ?>" size="40"/></td></tr>
                   
            <tr>
                <td>Type</td>
                 <?php $type = isset($_POST['type'])?$_POST['type']:(isset($result->type)?$result->type:''); ?>
                <td><input type="radio" name="type" <?php if($type==0){echo 'checked';} ?> value="0" />Image <input  <?php if($type==1){echo 'checked';} ?> type="radio" name="type" value="1"/>Video</td>
            </tr>
            <tr>
                <td>Video URL</td>
                <td><input type="text" name="promo" value="<?php echo isset($_POST['promo'])?$_POST['promo']:(isset($result->promo)?$result->promo:''); ?>" size="40"/></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" value="" size="40"/></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success btn-lg" name="submit" value="Upload"/>
                <a href="?lead=list_promotions" class="btn btn-link btn-lg">Cancel</a></td>
            </tr>
    </table>
    
</form>
