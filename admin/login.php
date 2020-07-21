<?php 
session_start();
$koneksi = new mysqli("localhost","root","","sumberalam");


?>
<?php  
//jika ada tombol login(tombol login ditekan)
if (isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password  = $_POST["password"];
    //lakukan query ngecek akun di tbl admin di db
    $ambil = $koneksi->query("SELECT * FROM admin
        WHERE username='$username' AND password='$password'");

    //ngitung akun yg terambil
    $akunyangcocok = $ambil->num_rows;

    //jika 1 akun yg cocok ,mka diloginkan
    if ($akunyangcocok==1)
    {
        //anda sukses login
        //mendapatkan akun dlm bentuk array
        $akun = $ambil->fetch_assoc();
        //login di session admin
        $_SESSION["admin"] = $akun;
        echo "<script>alert('Anda Berhasil LOGIN!');</script>";
        echo "<script>location='index.php';</script>";
    }
    else
    {
        //anda gagal login
        echo "<script>alert('Anda Gagal LOGIN!');</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <style type="text/css">
    .kotak{ 
        margin-top: 150px;
    }

    .kotak .input-group{
        margin-bottom: 20px;
    }
    </style>
</head>
<body>

<?php if( isset($error) ) : ?>
    <?php 
    echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal, username dan Password Salah!</div>";
     ?>
<?php endif; ?>

<div class="panel panel-default">
            <form  method="post">
                <div class="col-md-3 col-md-offset-4 kotak">
                    <h3>Silahkan Login ..</h3>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="username" class="form-control" placeholder="Username" name="username" autocomplete="off">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="input-group">           
                        <input type="submit" class="btn btn-primary" value="Login" name="login">
                    </div>
                </div>
            </form>
        </div>







</body>
</html>