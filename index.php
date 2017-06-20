<?php
    include_once 'header.php';
?>

<h1>Dobrodošli na spletni strani</h1>

<button id="sala1" onclick="sala1()">Šala</button><br>

<p id="vvv" style="display:none">moj lajf</p>

<button id="sala2" onclick="sala2()">Šala 2</button>

<p id="bbb" style="display:none">petkica projekt</p>

<script>
    function sala1(){
        var x = document.getElementById("vvv");
               if(x.style.display=='none'){
            x.style.display='block';
        }else{
            x.style.display='none';
        }
    }
    function sala2(){
        var x = document.getElementById("bbb");
               if(x.style.display=='none'){
            x.style.display='block';
        }else{
            x.style.display='none';
        }
    }
</script>
<h1>Najbolj priljubljene destinacije</h1>

<?php

    include 'piechart.php';
    include_once 'footer.php';
?>
