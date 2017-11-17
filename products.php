<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */

include_once './header.php';
//include_once './includes/carousal.php';
//include_once './includes/sitemap.php';

$class = isset($_REQUEST['class'])?$_REQUEST['class']:'';
switch($class)
{
   case 'diamond':
       include_once './includes/products_diamond.php';
       break;
   case 'gold':
       include_once './includes/product_gold.php';
       break;
   case 'silver':
       include_once './includes/product_silver.php';
       break;
   case 'watches':
       include_once './includes/product_watches.php';
       break;
   case 'locations':
       include_once './includes/location.php';
       break;
   case 'promotions':
       include_once './includes/promotions.php';
       break;
   case 'aboutus':
       include_once './includes/aboutus.php';
       break;
       default:
       include_once './includes/product_gold.php';
       break;
}

include_once './footer.php';