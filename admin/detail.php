<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>

</body>
</html>
<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #ffdbdb}

th {
    background-color: #e33d3d;
    color: white;
}

	
</style>
<div class="row">
	<div class="col-md-12">
		<h2><div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#da0000;color:#fff;line-height:60px;font-size:20px;"><b>
Detail Pemesanan Tiket</b>
</div></h2>
		<hr>

<?php 
$koneksi = new mysqli("localhost","root","","sumberalam");
	$ambil = $koneksi->query("SELECT * FROM
		pemesanan JOIN customer ON pemesanan.id_cus = customer.id_cus WHERE pemesanan.id_pemesanan='$_GET[id_pemesanan]'");
	$detail = $ambil->fetch_assoc();
 ?>
 <pre><?php print_r($detail); ?></pre>
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

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA TIKET</th>
 			<th>HARGA</th>
 			<th>JUMLAH</th>
 			<th>SUBTOTAL</th>
 			<th>NO KURSI</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pemesanan_tkt JOIN tiket ON pemesanan_tkt.id_tkt = tiket.id_tkt
 			WHERE pemesanan_tkt.id_pemesanan='$_GET[id_pemesanan]'"); ?>
 		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 		<tr>
 			<td><?= $nomor; ?></td>
 			<td><?= $pecah['nama']; ?></td>
 			<td><?= $pecah['harga']; ?></td>
 			<td><?= $pecah['jumlah']; ?></td>
 			<td>
 				<?= $pecah['harga']*$pecah['jumlah']; ?>
 			</td>
 			<?php $ambil=$koneksi->query("SELECT * FROM pemesanan JOIN kursi ON pemesanan.id_kursi = kursi.id_kursi
 			WHERE pemesanan.id_pemesanan='$_GET[id_pemesanan]'"); ?>
 			<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 			<td><?= $pecah['id_kursi']; ?></td>
 			 <?php } ?>
 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>

	</div>
</div>

<!-- Modal Tambah Data Keberangkatan -->
