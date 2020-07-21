<?php 
session_start();
$koneksi = new mysqli("localhost","root","","sumberalam");
include 'navbar.php';

//jika tdk ada session customer (blm login)maka dilarikan ke login.php
if (!isset($_SESSION["customer"])) {
	echo "<script>alert('Anda LOGIN dahulu!');</script>";
	echo "<script>location='login.php';</script>";
}

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{	
	echo "<script>alert('Anda tidak bisa Checkout!');</script>";
	echo "<script>location='index.php';</script>";
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>


<section class="konten">
	<div class="container">
		<center><h1>Checkout Tiket</h1></center>
		<hr><br><br>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>NO</th>
					<th>TIKET</th>
					<th>HARGA</th>
					<th>JUMLAH</th>
					<th>SUBHARGA</th>		
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja = 0; ?>
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
					<td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++ ?>
				<?php $totalbelanja+=$subharga; ?>
			<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?= number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>

		</table>

		<form method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" readonly value="<?= $_SESSION["customer"]['nama'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-3">
					<input type="text" readonly value="<?= $_SESSION["customer"]['telepon'] ?>" class="form-control">
				</div>
				<div class="col-md-3">
					<input type="text" readonly value="<?= $_SESSION["customer"]['email'] ?>" class="form-control">
				</div>
				<div class="col-md-3">
					<select class="form-control" name="id_kursi">
						<option value="">Pilih No Kursi</option>
						<?php 
						$ambil = $koneksi->query("SELECT * FROM kursi");
						while($perongkir= $ambil->fetch_assoc()){
						 ?>
						<option value="<?= $perongkir["id_kursi"] ?>">
						<?= $perongkir['urutan'] ?>
					</option>
					<?php } ?>
					</select>
				</div>
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>


		<?php 
		if (isset($_POST["checkout"])) 
		{
			$id_cus = $_SESSION["customer"]["id_cus"];
			$id_kursi = $_POST["id_kursi"];
			$tgl_pemesanan = date("Y-m-d");

			$ambil = $koneksi->query("SELECT * FROM kursi WHERE id_kursi='$id_tkt'");
			$arrayongkir = $ambil->fetch_assoc();

			$ttl_pemesanan = $totalbelanja;

			// menyimpan data ke tabel pembelian
			$koneksi->query("INSERT INTO pemesanan(
				id_cus,id_kursi,tgl_pemesanan,ttl_pemesanan)
				VALUES ('$id_cus','$id_kursi','$tgl_pemesanan','$ttl_pemesanan')"
			);

			//mendapatkan id_pemesanan barusan terjadi
			$id_pembelian_barusan = $koneksi->insert_id;

			foreach ($_SESSION["keranjang"] as $id_tkt => $jumlah) 
			{
				//mendapatkan data tiket berdasarkan id_tkt
				$ambil=$koneksi->query("SELECT * FROM tiket WHERE id_tkt='$id_tkt'");
				$perproduk=$ambil->fetch_assoc();

				$nama = $perproduk['nama'];
				$harga = $perproduk['harga'];
				$kls = $perproduk['kls'];
				$tujuan = $perproduk['tujuan'];
				$subharga = $perproduk['harga']*$jumlah;

				$koneksi->query("INSERT INTO pemesanan_tkt (id_pemesanan,id_tkt,nama,harga,kls,tujuan,subharga,jumlah)
					VALUES ('$id_pembelian_barusan','$id_tkt','$nama','$harga','$kls','$tujuan','$subharga','$jumlah') ");
			}


			//mengkosongkan keranjang belanja
			unset($_SESSION["keranjang"]);

			//tampilkan dialihkan ke halamn nota,nota dari pembelian yg barusan
			echo "<script>alert('Pembelian SUKSES!!');</script>";
			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		}
		?>

	</div>
</section>
<!--  -->

</body>
</html>