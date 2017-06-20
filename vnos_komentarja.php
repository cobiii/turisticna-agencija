 <?php 
 
 include 'database.php';

$komentar = $_POST['komentar'];
                                
$sql = "INSERT INTO komentarji(opis) VALUES('$komentar'); ";
                                
$rezultat = mysqli_query($link,$sql);
                                
header("location:index.php");