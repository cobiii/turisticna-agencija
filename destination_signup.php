<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $user_id = (int) $_POST['user_id'];
    $destination = (int) $_POST['destination_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $query = sprintf("INSERT INTO vacations(user_id,
                                           destination_id,                                            
                                           start_date, 
                                           end_date) 
                      VALUES ($user_id, 
                              $destination,
                              '%s',
                              '%s')", 
                    mysqli_real_escape_string($link, $start_date),
                    mysqli_real_escape_string($link, $end_date));
    //zapišemo komentar v bazo
    mysqli_query($link, $query);
    //preusmeritev nazaj na destinacijo
    header("Location: destination.php?id=$destination");
    
?>