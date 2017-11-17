<?php

include_once '../config/constants.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */

class database_helper{
     private function get_connection(){
        try{
            $connection = new mysqli(system_constants::$SERVER_NAME, system_constants::$USER_NAME, 
                system_constants::$PASSWORD, system_constants::$DB_NAME);
            return $connection;
        } catch (Exception $ex) {
            trigger_error(system_constants::$MYSQL_CONNECTION_ERROR.$ex->getMessage(),E_ERROR);
        }
        
    }
    

    private function close_connection($connection){
        try{
            mysqli_close($connection);
        } catch (Exception $ex) {

        }
    }
   
    public function product_insert($data,$up,$gallery)
    {
        $connect = $this->get_connection();
        if($up<0){
        $query = "INSERT INTO product_store(name, gender,category,subcategory, collection, product_type, product_code, karatage, brand, making, tax, image, gallery,added) VALUES ('".$data['name']."','".$data['gender']."','".$data['category']."','".$data['subcategory']."','".$data['collection']."','".$data['product_type']."','".$data['product_code']."','".$data['karatage']."','".$data['brand']."','".$data['making']."','".$data['tax']."','".$data['image']."','".implode(",", $gallery)."',NOW())"; 
          $connect->query($query);
       $key = mysqli_insert_id($connect);
        }
        else
        {
            $query = "UPDATE product_store SET name='".$data['name']."',gender='".$data['gender']."',category='".$data['category']."',subcategory='".$data['subcategory']."',collection='".$data['collection']."',product_type='".$data['product_type']."',product_code='".$data['product_code']."',karatage='".$data['karatage']."',brand='".$data['brand']."',making='".$data['making']."',tax='".$data['tax']."',image='".$data['image']."',gallery='".implode(",", $gallery)."',updated=NOW() WHERE id=".$up;
              $connect->query($query);
       $key = 100;
        }
      // echo $query ;
      
      
        
        $this->close_connection($connect);
        return $key;
    }
    public function product_insert_latest($data,$up,$gallery)
    {
        $connect = $this->get_connection();
        if($up<0){
        $query = "INSERT INTO product_store( name,rawdata,category, image, gallery,added) VALUES ('".$data['name']."','".addslashes($data['rawdata'])."','".$data['image']."','".implode(",", $gallery)."',NOW())"; 
          $connect->query($query);
       $key = mysqli_insert_id($connect);
        }
        else
        {
            $query = "UPDATE product_store SET rawdata='".addslashes($data['rawdata'])."',name='".$data['name']."',category='".$data['category']."',image='".$data['image']."',gallery='".implode(",", $gallery)."',updated=NOW() WHERE id=".$up;
              $connect->query($query);
       $key = 100;
        }
      // echo $query ;
      
      
        
        $this->close_connection($connect);
        return $key;
    }
    public function locations_insert($data,$up)
    {
        $connect = $this->get_connection();
        if($up<0){
        $query = "INSERT INTO locations(place, address,district, phone, pin,maptype,longitude,latitude,zoom,image,added) VALUES ('".$data['place']."','".$data['address']."','".$data['district']."','".$data['phone']."','".$data['pin']."','".$data['maptype']."','".$data['longitude']."','".$data['latitude']."','".$data['zoom']."','".$data['image']."',NOW())"; 
          $connect->query($query);
       $key = mysqli_insert_id($connect);
        }
        else
        {
            $query = "UPDATE locations SET place='".$data['place']."',address='".$data['address']."',district='".$data['district']."',phone='".$data['phone']."',pin='".$data['pin']."',maptype='".$data['maptype']."',longitude='".$data['longitude']."',latitude='".$data['latitude']."',zoom='".$data['zoom']."',image='".$data['image']."',updated=NOW() WHERE id=".$up;
              $connect->query($query);
       $key = 100;
        }
      // echo $query ;
      
      
        
        $this->close_connection($connect);
        return $key;
    }
    
      public function promotion_insert($data,$up)
    {
        $connect = $this->get_connection();
        if($up<0)
        {
        $query = "INSERT INTO promotions( name, image,promo,type added) VALUES ('".$data['name']."','".$data['image']."','".$data['promo']."','".$data['type']."',NOW())"; 
        
      // echo $query ;
      
        $connect->query($query);
       $key = mysqli_insert_id($connect);
        }
        else
        {
            $query = "UPDATE promotions SET name='".$data['name']."', image='".$data['image']."', promo='".$data['promo']."', type='".$data['type']."', updated=NOW() WHERE id=".$up; 
        
      // echo $query ;
      
        $connect->query($query);
       $key = 100;
        }
        
        $this->close_connection($connect);
        return $key;
    }
      public function news_insert($data,$up)
    {
        $connect = $this->get_connection();
        if($up<0)
        {
        $query = "INSERT INTO news_events( name, image, added) VALUES ('".$data['name']."','".$data['image']."',NOW())"; 
        
      // echo $query ;
      
        $connect->query($query);
       $key = mysqli_insert_id($connect);
        }else
        {
             $query = "UPDATE news_events SET name='".$data['name']."', image='".$data['image']."', updated=NOW() WHERE id=".$up; 
        
      // echo $query ;
      
        $connect->query($query);
       $key = 100;
        }
        
        $this->close_connection($connect);
        return $key;
    }
      public function all_products($id=null)
    {
        $connect = $this->get_connection();
        if(is_null($id))
        {
        $query = "SELECT * FROM product_store"; 
        }
        else
        {
            $query = "SELECT * FROM product_store WHERE id=".$id; 
        }
        
      // echo $query ;
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
      public function all_promotions($id=null)
    {
        $connect = $this->get_connection();
        if(is_null($id))
        {
        $query = "SELECT * FROM promotions"; 
        }  else {
            $query = "SELECT * FROM promotions WHERE id=".$id; 
        }
        
      // echo $query ;
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
      public function all_events($id=null)
    {
        $connect = $this->get_connection();
        if(is_null($id))
        {
        $query = "SELECT * FROM news_events"; 
        }  else {
            $query = "SELECT * FROM news_events WHERE id=".$id; 
        }
        
      // echo $query ;
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
      public function all_locations($id=null)
    {
        $connect = $this->get_connection();
        if(is_null($id))
        {
        $query = "SELECT * FROM locations"; 
        }  else {
            $query = "SELECT * FROM locations WHERE id=".$id; 
        }
        
      // echo $query ;
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
    public function goldrate_settings($amount,$update)
    {
         $connect = $this->get_connection();
         if($update<0)
         {
             $query = "INSERT INTO goldrate(price)VALUES(".$amount.")";
             $connect->query($query);
             
         }
 else {
     $query = "UPDATE goldrate SET price=".$amount.",updated=NOW() WHERE id=".$update;
             $connect->query($query);
 }
         $this->close_connection($connect);
         //echo $query;
         $this->redirect_home(4);
    }
    public function goldrate_gettings()
    {
        $connect = $this->get_connection();
        $query = "SELECT * FROM goldrate ";
        $result = $connect->query($query);
        $this->close_connection($connect);
        return $result;
    }
    
    public function redirect_home($case)
    {
        switch($case){
            case 1:header('location:?lead=list_products');break;
            case 2:header('location:?lead=list_promotions');break;
            case 3:header('location:?lead=list_events');break;
            case 4:header('location:index.php');break;
            case 5:header('location:?lead=list_locations');break;
            default :break;
        }
    }
    
    public function login($username,$password) {
        
         $connect = $this->get_connection();
         $query = "SELECT * FROM login WHERE username='".$username."' AND password='".$password."'"; 
         $result = $connect->query($query);
         $row = mysqli_fetch_object($result);
         $_SESSION['account'] = $row->id;
        
        $this->close_connection($connect);
        $this->redirect_home(4);
        
    }
    public function logout()
    {
        $_SESSION['account'] = NULL;
        $this->redirect_home(4);
    }
    
}