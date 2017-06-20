<?php
    include_once 'session.php';
?>
<!DOCTYPE HTML>
<!--
	TXT by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Turistika</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
                <script src="http://maps.googleapis.com/maps/api/js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Karla%7CMontserrat">
                <!--<link rel="stylesheet" href="css/screen.css">-->
                <link rel="stylesheet" href="css/lightbox.css">
	</head>
	<body class="homepage">

		<!-- Header -->
			<header id="header">
				<div class="logo container">
					<div>
						<!--<h1><a href="index.html" id="logo">TXT</a></h1>-->
						<p>TURISTIKA - najboljše destinacije ta HIP</p>
					</div>
				</div>
			</header>

		<!-- Nav -->
			<nav id="nav" class="skel-layers-fixed">
				<ul>
					<li class="current"><a href="index.php">Domov</a></li>	
                                        <li><a href="countries.php">Države</a></li>
                                        <li><a href="destinations.php">Destinacije</a></li>
                                        <li><a href="agency.php">Agencije</a></li>	
                                        <?php 
                                            if (!isset($_SESSION['user_id'])) {
                                                echo '<li><a href="login.php">Prijava</a></li>';
                                                echo '<li><a href="registration.php">Registracija</a></li>';
                                            }
                                            else {
                                                
                                                echo '<li><a href="logout.php">Odjava ('.
                                                $_SESSION['first_name'].' )</a></li>';
                                            }
                                        ?>
					                                   
										
				</ul>
			</nav>
		
		<!-- Banner -->
			<div id="banner-wrapper">
				<!--<section id="banner">
					<h2>Welcome to TXT by HTML5 UP</h2>
					<p>A free responsive site template built on HTML5, CSS3, skel, and some other stuff</p>
					<a href="#" class="button">Alright let's go</a>
				</section>-->
			</div>

		<!-- Main -->
			<div id="main-wrapper">
				<div id="main" class="container">
                                <?php 
                                
                                include 'database.php';
                                
                                $sql = "SELECT opis FROM komentarji;";
                                
                                $rezultat = mysqli_query($link,$sql);
                                
                                echo '<table>';
                                
                                while($row = mysqli_fetch_array($rezultat))
                                {
                                    
                                    echo '<tr><th>Komentar</th></tr>';
                                    
                                    echo '<tr><td>'.$row['opis'].'</td></tr>';
                                   
                                }
                                
                                echo '</table>';
                                
                                ?>
                                 
                                    <form action="vnos_komentarja.php" method="POST" >
                                        <input type="text" id="text" name="komentar" value="" placeholder="Vnesi komentar">
                                        <input type="submit" value="Vnesi">
                                    </form>
                                </div>
                        </div>
					<div class="row 200%">
						<div class="12u">

							<!-- Features -->
								<section class="box features">
				
									<div>
                                                                            <?php 
                                                                                //preverimo za error
                                                                                if (isset($_SESSION['error'])) {
                                                                                    echo '<div id="error">';
                                                                                    echo $_SESSION['error'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['error']);
                                                                                }
                                                                                //preverimo za success
                                                                                if (isset($_SESSION['success'])) {
                                                                                    echo '<div id="success">';
                                                                                    echo $_SESSION['success'];
                                                                                    echo '</div>';
                                                                                    unset($_SESSION['success']);
                                                                                }
                                                                            ?>