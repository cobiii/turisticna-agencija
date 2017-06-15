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
        include_once 'database.php';
        include 'header.php';
        $id=$_POST['destination_id'];
        $query="select u.id,u.first_name,u.last_name,v.start_date,v.end_date from vacations v inner join users u on u.id=v.user_id where end_date>=now() and destination_id=$id";
        $result=mysqli_query($link,$query);
        
        ?>
        <table>
            <tr><td>Ime<td>Priimek<td>Začetek počitnic<td>Konec počitnic<td>
           <?php while($row=  mysqli_fetch_array($result)){ ?>
            <tr><td><?php echo $row['first_name']; ?><td><?php echo $row['last_name'] ?><td><?php echo $row['start_date'] ?><td><?php echo $row['end_date']; 
            ?><td><form name="krneki" action="destination_questiontu.php" method="post">
                        <input type="hidden" name="user_id"
               value="<?php echo $row['id']; ?>" />
                        <input type="hidden" name="destination_id"
               value="<?php echo $id; ?>" />
                        <input type="submit" value="Pošlji sporočilo" style="
    border:0;
    background-color:transparent;
    color: blue;
    text-decoration:underline;
    font: inherit;  
"/></form>
          <?php } ?>
        </table>
    </body>
    <?php include 'footer.php'; ?>
</html>