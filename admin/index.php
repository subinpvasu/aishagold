<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aisha Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 
</head>
<body>

<?php
if(isset($_SESSION['account']) && is_numeric($_SESSION['account']))
{
include_once './templates/admin_home.php';
}
else
{
    include_once './contents/login.php';
}