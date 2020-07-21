<?php 

//koneksi  ke database
$koneksi = new mysqli("localhost","root","","sumberalam");
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Beny / Sumber Alam</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> 
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-default">
	<div class="container">	
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="daftartiket.php">Tiket</a></li>
		<li><a href="cara_pesan.php">Cara Pemesanan</a></li>
		<li><a href="trayek.php">Jadwal</a></li>
		<li><a href="about.php">About</a></li>
		
	</ul>
</div>
</nav>
</body>
</html>