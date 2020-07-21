<?php

	session_start();

	if(isset($_GET['halaman'])) $halaman = $_GET['halaman']; 
	    else $halaman = "index";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Beny / Sumber Alam</title>

	<script src="bootstrap/js/jquery.js"></script>
	
	<!-- Memanggil CSS bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	
	<link rel="stylesheet" href="bootstrap/datepicker/themes/base/jquery.ui.all.css">
	
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Start JS Datepicker -->
	<script src="bootstrap/js/jquery.js"></script>
</head>


<body>

	<!-- navbar -->
<nav class="navbar navbar-default">
	<div class="container">	
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="daftartiket.php">Tiket</a></li>
		<li><a href="cara_pesan.php">Cara Pemesanan</a></li>
		<!-- jika sdh login(ada session pelanggan) -->
		<li><a href="trayek.php">Jadwal</a></li>
		<li><a href="about.php">About</a></li>
		<!-- jika sdh login(ada session login) -->
		<?php if (isset($_SESSION["customer"])) : ?>
			<li><a href="logout.php">Logout</a></li>
			<!-- selain itu(blm login||blm ada session pelanggan) -->
			<?php else: ?>
		<li><a href="l.php">Login</a></li>
	<?php endif ?>
	</ul>
</div>
</nav>

<!-- 
<section class="konten">
  <div class="container">
    <center><h1>Bus Pt.Sumber Alam</h1></center><br>

    <div class="row">
        
      <div class="col-md-3">
        <div class="thumbnail">
          <img src="5e8a7662076f2.jpeg">
          <img src="images/bis(3)1.jpg">
          
        </div>
      </div>


    </div>
  </div>
</section> -->
	<!-- Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-8">
				<?php
					
					//menu navbar
					if ($halaman=='index')
						include 'awal.php';
					elseif ($halaman=='cara_pesan')
						include 'cara_pesan.php';
					elseif ($halaman=='trayek')
						include 'trayek.php';
					elseif ($halaman=='pemesanan')
						include 'pemesanan.php';
					elseif ($halaman=='cek_proses')
						include 'cek_proses.php';

					//footer
					elseif ($halaman=='info_pembayaran')
						include 'info_pembayaran.php';
					elseif ($halaman=='about')
						include 'about.php';

					//kursi
					elseif ($halaman=='kursi_ekonomi')
						include 'kursi_ekonomi.php';
					elseif ($halaman=='kursi')
						include 'kursi.php';

					//pemesanan
					elseif ($halaman=='konfirmasi')
						include 'konfirm_pesanan.php';
					//about
					elseif($halaman=='about')
						include 'about.php';
					elseif($halaman=='daftartiket')
						include 'daftartiket.php';

				?>
				<br><br>
			</div>
			<div class="col-md-2">
				
			</div>
		</div>
		
		<br><br><br><br><br><br>

	</div>

	

</body>
		<script src="bootstrap/datepicker/js/jquery-1.7.2.js"></script>
		<script src="bootstrap/datepicker/ui/jquery.ui.core.js"></script>


		<script src="bootstrap/datepicker/ui/jquery.ui.widget.js"></script>
		<script src="bootstrap/datepicker/ui/jquery.ui.datepicker.js"></script>
		<script>
		$(function() {
		    $( "#datepicker" ).datepicker({
		    dateFormat:"yy/mm/dd",
		        changeMonth: true,
		        changeYear: true
		    });
		});
		</script>
		<script>
	            $(".input-group.date").datepicker({autoclose: true, todayHighlight: true})
	        </script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</html>
