<?php
include_once './config/constants.php';
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
        public function diamond_products($id=null)
    {
        $connect = $this->get_connection();
        if(is_null($id))
        {
        $query = "SELECT * FROM product_store WHERE category='diamond'"; 
        }  else {
            $query = "SELECT * FROM product_store WHERE id=".$id; 
        }
        
      // echo $query ;
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
    
       public function gold_products()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM product_store WHERE category='gold'"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function silver_products()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM product_store WHERE category='silver'"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function watch_products()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM product_store WHERE category='watch'"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function locations_list()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM locations"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function gold_rate()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM goldrate"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function all_promotions()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM promotions WHERE actived=1 limit 3"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function list_promotions()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM promotions"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
       public function all_news_events()
    {
        $connect = $this->get_connection();
       
        $query = "SELECT * FROM news_events limit 4"; 
       
      
       $result = $connect->query($query);
       
        
        $this->close_connection($connect);
        return $result;
    }
    public function delete_row($table,$id)
    {
        $connect = $this->get_connection();
        $sql = "DELETE FROM ".$table." WHERE id=".$id;
        $connect->query($sql);
        $this->close_connection($connect);
    }
    public function update_row($table,$id,$value)
    {
        $connect = $this->get_connection();
        $sql = "UPDATE ".$table." SET actived=".$value." WHERE id=".$id;
        $connect->query($sql);
        $this->close_connection($connect);
    }
}