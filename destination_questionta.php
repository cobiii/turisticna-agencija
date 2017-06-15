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
        include 'header.php';
        include_once 'session.php'; 
        include_once 'database.php'; 
        $id=$_POST['destination_id'];
        $query="select email from destinations d inner join users on users.id=d.user_id where d.id=$id";
        $result=  mysqli_query($link, $query);
        $data=  mysqli_fetch_array($result);
        $email=$data['email'];
        ?>
        
        <form action="sporocilo_uporabnik_agencija.php" method="post"><table>
                <input type="hidden" name="email"
               value="<?php echo $email; ?>" />
                <input type="hidden" name="destination_id"
               value="<?php echo $id; ?>" />
            <tr><td>Zadeva: <td><input type="text" name="zadeva" required/><br /></td></tr>
            <tr><td>Sporočilo: <td><textarea name="sporocilo" cols="70" rows="25" required></textarea><br> </td></tr> 
            <tr><td><td><input type="submit" value="Pošlji sporočilo" /></table>
        </form>    
    </body>
    <?php include 'footer.php'; ?>
</html>
