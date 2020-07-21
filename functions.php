<?php 
$conn = mysqli_connect("localhost","root","","sumberalam");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambahpms($data) {
	global $conn;
	$id_tkt=htmlspecialchars($data['id_tkt']);
	$id_cus=htmlspecialchars($data['id_cus']);
	$tgl_b = htmlspecialchars($data["tgl_b"]);
	$kursi = htmlspecialchars($data["kursi"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$subtotal = htmlspecialchars($data["harga"]*$jumlah);

	$query = "INSERT INTO pemesanan
				VALUES
			('','$id_tkt', '$id_cus', '$tgl_b', '$kursi', '$jumlah', '$subtotal')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function dpms($id_pemesanan) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan");
	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}


function ikb($data){
	global $conn;

	$tujuan = htmlspecialchars($data['tujuan']);
	$jadwal = htmlspecialchars($data['jadwal']);
	$rute = htmlspecialchars($data['rute']);

	$query = "INSERT INTO keberangkatan VALUES
		('','$tujuan','$jadwal','$rute')
		";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function dkb($id_berangkat) {
	global $conn;
	mysqli_query($conn, "DELETE FROM keberangkatan WHERE id_berangkat = $id_berangkat");
	return mysqli_affected_rows($conn);
}

function ekb($data) {
	global $conn;

	$id_berangkat = $data["id_berangkat"];
	$tujuan = htmlspecialchars($data["tujuan"]);
	$jadwal = htmlspecialchars($data["jadwal"]);
	$rute = htmlspecialchars($data["rute"]);
	

	$query = "UPDATE keberangkatan SET
				tujuan = '$tujuan',
				jadwal = '$jadwal',
				rute = '$rute'
			  WHERE id_berangkat = $id_berangkat
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}
////
function etkt($data) {
	global $conn;

	$id_tkt = $data["id_tkt"];
	$nama = htmlspecialchars($data["nama"]);
	$kls = htmlspecialchars($data["kls"]);
	$harga = htmlspecialchars($data["harga"]);
	$tujuan=htmlspecialchars($data['tujuan']);
	

	$query = "UPDATE tiket SET
				nama = '$nama',
				kls = '$kls',
				harga = '$harga',
				tujuan = '$tujuan'
			  WHERE id_tkt = $id_tkt
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}
function itkt($data){
	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$kls = htmlspecialchars($data['kls']);
	$harga = htmlspecialchars($data['harga']);
	$tujuan = htmlspecialchars($data['tujuan']);

	$query = "INSERT INTO tiket VALUES
		('','$nama','$kls','$harga','$tujuan')
		";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function dtkt($id_tkt){
	global $conn;
	mysqli_query($conn, "DELETE FROM tiket WHERE id_tkt =$id_tkt");
	return mysqli_affected_rows($conn);
}
///
function icus($data){
	global $conn;

	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$telepon = htmlspecialchars($data['telepon']);
	$password=htmlspecialchars($data['password']);
	$alamat = htmlspecialchars($data['alamat']);
	

	$query = "INSERT INTO customer VALUES
		('','$nama','$email','$telepon','$password','$alamat')
		";
	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);
}

function ecus($data) {
	global $conn;

	$id_cus = $data["id_cus"];
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$alamat=htmlspecialchars($data['alamat']);
	$password =htmlspecialchars($data['password']);
	

	$query = "UPDATE customer SET
				nama = '$nama',
				email = '$email',
				telepon = '$telepon',
				alamat = '$alamat',
				password = '$password'
			  WHERE id_cus = $id_cus
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function dcus($id_cus){
	global $conn;
	mysqli_query($conn, "DELETE FROM customer WHERE id_cus =$id_cus");
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM keberangkatan
				WHERE
			  tujuan LIKE '%$keyword%' OR
			  jadwal LIKE '%$keyword%' OR
			  rute LIKE '%$keyword%' 
			";
	return query($query);
}
?>