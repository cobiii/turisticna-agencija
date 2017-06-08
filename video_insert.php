<?php
require 'database.php';

  if((isset)POST ['url']){
    $url = $_POST ['url'];
    $url = explode ['=',$url];
    $ur = $url ['1'];
    
    <iframe widht="560" height = "315" src = "http://youtube.com/embed/<?php echo $url; ?> frameboarder="0" allowfullscreen"
  }
