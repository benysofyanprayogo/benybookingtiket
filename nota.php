<?php 
$koneksi = new mysqli("localhost","root","","sumberalam"); 
include 'navbar.php';
if (isset($_SESSION["customer"])) {
	echo "<script>alert('Anda LOGIN dahulu!');</script>";
	echo "<script>location='l.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>NOTA PEMESANAN</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>
<br><br>
<section class="konten">
	<div class="container">
		<!-- nota disini cps saja dari nota yg ada di admin -->
		<h3>Data pemesan beserta ordernya adalah sebagai berikut:</h3><br>

<?php 
	$ambil = $koneksi->query("SELECT * FROM
		pemesanan JOIN customer ON pemesanan.id_cus = customer.id_cus WHERE pemesanan.id_pemesanan='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
 ?>
  <!-- <pre><?php print_r($detail); ?></pre>  -->

<table class="table table-bordered">
 	<thead>
 		<tr class="bg-primary">
 			<th>NAMA PEMESAN</th>
 			<th>TELEPON PEMESAN</th>
 			<th>EMAIL PEMESAN</th>
 			<th>ALAMAT PEMESAN</th>
 			<th>TANGGAL PEMESANAN</th>
 			<th>TOTAL PEMESANAN</th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<td><strong><?= $detail['nama']; ?></strong><br></td>
 			<td><?= $detail["telepon"]; ?></td>
 			<td><?= $detail["email"]; ?></td>
 			<td><?= $detail["alamat"]; ?></td>
 			<td><?= $detail["tgl_pemesanan"]; ?></td>
 			<td><?= $detail["ttl_pemesanan"]; ?></td>
 		</tr>
 	</tbody>
</table>
<hr>
 <table class="table table-bordered">
 	<thead>
 		<tr class="bg-primary">
 			<th>NO</th>
 			<th>NAMA TIKET</th>
 			<th>JUMLAH TIKET</th>
 			<th>HARGA TIKET</th>
 			<th>SUBTOTAL</th>
 			<th>NO KURSI</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pemesanan_tkt JOIN tiket ON pemesanan_tkt.id_tkt = tiket.id_tkt
 			WHERE pemesanan_tkt.id_pemesanan='$_GET[id]'"); ?>
 			<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 			
 		<tr>
 			<td><?= $nomor; ?></td>
 			<td><?= $pecah['nama']; ?></td>
 			<td><?= $pecah['jumlah']; ?></td>
 			<td><?= $pecah['harga']; ?></td>
 			<td>
 				<?= $pecah['harga']*$pecah['jumlah']; ?>
 			</td>

 			<?php $ambil=$koneksi->query("SELECT * FROM pemesanan JOIN kursi ON pemesanan.id_kursi = kursi.id_kursi
 			WHERE pemesanan.id_pemesanan='$_GET[id]'"); ?>
 			<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 			<td><?= $pecah['id_kursi']; ?></td>
 			 <?php } ?>

 			
 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>

 	</tbody>
 </table>

<div class="row">
	<div class="col-md-8">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran Rp. <?= number_format($detail['ttl_pemesanan']); ?>
				ke <br>
				<strong>BANK RAKYAT 198-009025-6456 AN.BENY s Prayogo</strong>
			</p>
		</div>
	</div>
</div>
<a href="index.php"><button class="btn btn-warning">Kembali ke Halaman Utama</button></a>



		</div>
	</section>
</body>
</html>