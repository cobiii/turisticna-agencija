<?php
require 'database.php';

include_once 'database.php';
        
        $query = sprintf("INSERT INTO videos(url, title, destionation_id)
                  VALUES ('%s','%s',$id)",
                 mysqli_real_escape_string($link, $target_file),
                 mysqli_real_escape_string($link, $title));
        //echo $query; die();
        mysqli_query($link,$query);
        $_SESSION['success'] = 'Video je uspešno naložen.';
        header("Location: destination.php?id=$id");
        die();
  }
