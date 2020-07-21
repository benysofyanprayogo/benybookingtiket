<?php 
session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

$koneksi = new mysqli("localhost","root","","sumberalam");

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{	
	echo "<script>alert('KERANJANG Kosong,Silahkan Pesan Tiket Dahulu!');</script>";
	echo "<script>location='daftartiket.php';</script>";
}
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>



<section class="konten">
	<div class="container">
		<center><h1>Keranjang Tiket</h1></center><br>
		<hr>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>TIKET</th>
					<th>KELAS</th>
					<th>HARGA</th>
					<th>TUJUAN</th>	
					<th>JUMLAH</th>
					<th>SUBHARGA</th>
					<th>OPSI</th>			
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_tkt => $jumlah) : ?>
					<!-- menampilkan tiket yg sedang diperulangkan berdasarkan id_tkt -->
					<?php 
					$ambil = $koneksi->query("SELECT * FROM tiket WHERE id_tkt='$id_tkt'");
					$pecah = $ambil->fetch_assoc();
					$subharga = $pecah["harga"]*$jumlah;
					
					 ?>
				<tr>
					<td><?= $nomor; ?></td>
					<td><?php echo $pecah["nama"]; ?></td>
					<td><?= $pecah["kls"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
					<td><?= $pecah["tujuan"]; ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td><a href="hpskeranjang.php?id_tkt=<?= $id_tkt ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				<?php $nomor++ ?>
			<?php endforeach ?>
			</tbody>
		</table>
		<a href="daftartiket.php" class="btn btn-danger">Lanjutkan belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>
</body>
</html>