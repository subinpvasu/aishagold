<?php
error_reporting(E_ALL);
include_once './db_operations/database_helper.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * A mangosoft.in production
 */
if(isset($_POST['submit']))
{

    $login = new database_helper();
    $login->login($_POST['username'], $_POST['password']);
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 text-center" style="margin-top: 150px;">
            <h1>Aisha Gold - Admin Panel</h1>
            <form method="post" action="index.php" class="form-group">
                <table class="table">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Login" class="btn btn-success btn-lg"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>