<?php 
include 'functions.php';

$film=query("SELECT * FROM bus");
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>PT KAI Indonesia</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> 
</head>
<body>

<!-- konten -->
<section class="konten">
  <div class="container">
   <h1 style="margin-left:25%">PT KAI Indonesia</h1><br>

     <?php foreach($film as $f) : ?>
        
      <div class="col-md-3" style="margin-left: -10px; margin-right: -10px;">
        <div class="thumbnail">
          <img src="images/<?php echo $f['foto']; ?>" alt="">
          <div class="caption"> 

            <center><a class="btn btn-danger" href="daftartiket.php" role="button" style="margin-top:10px;">Pilih tiket &raquo;</a></center>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


    </div>
  </div>
</section>

</body>
</html>