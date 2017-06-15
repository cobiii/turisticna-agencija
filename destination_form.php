<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'session.php';
        if(isset($_SESSION['user_id'])){
        $user=(int) $_SESSION['user_id'];
        }
        $id=$_POST['destination_id'];
        ?>
        <form action="destination_signup.php" method="post">
        <input type="hidden" name="destination_id"
               value="<?php echo $id; ?>" />
  <?php      if(isset($_SESSION['user_id'])){ ?>
        <input type="hidden" name="user_id" 
               value="<?php echo $user; ?>" /><?php } ?>
        <input type="date" name="start_date" required/>
        <input type="date" name="end_date" required/>
        <input type="submit" value="Pošlji" />
    </form>
    </body>
</html>
