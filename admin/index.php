<?php 
session_start();

if( !isset($_SESSION["admin"]) ) {
    echo "<script>alert('Anda harus LOGIN dahulu!');</script>";
    echo "<script>location='login.php';</script>";
    exit;
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rapi Doho</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#da0000;">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="#" style="color:#fff; font-size:30px;">PT KAI<b> Indonesia</b></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">

          <li style="background:#da0000;color:#fff;"><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="color:#fff;"> Logout</span></a>
              
          </li>
        </ul>
          
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="margin-top: 20px;">
          <ul class="nav nav-sidebar">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> &nbsp; Dashboard</a></li>
            <li><a href="index.php?page=info_keberangkatan"><span class="glyphicon glyphicon-calendar">&nbsp;</span>Jadwal</a></li>
            <li><a href="index.php?page=info_tiket"><span class="glyphicon glyphicon-tags">&nbsp;</span>Tiket</a></li>
             <li><a href="index.php?page=info_customer"><span class="glyphicon glyphicon-user">&nbsp;</span>Customer</a></li>
            <li><a href="index.php?page=info_pemesanan"><span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>Pemesanan</a></li>
          </ul>
        </div>
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <?php
if(isset($_GET['page'])) {
    $page = $_GET['page'] . ".php";
    include ("$page");

} else {
    include ('home.php');
}?>
</div>
</div>
        </div>
      </div>
    </div>
  </body>
</html>
