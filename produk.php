<?php
session_start();
	include "./login/config/connection.php";
	$sql = "SELECT * from tb_barang";
	$query = mysqli_query($conn,$sql);
    $gambar = "";
    if ($gambar == "") {
    	$gambar = "default.jpg";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <title>SUN ATK HOMEPAGE</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!--navigasi-->
    <nav style="margin-top: -200px ;">
      <div class="layar-dalam">
        <div class="logo">
          <a href=""><img src="assets/images/logo2.png" class="putih" /></a>
          <!-- <a href=""><img src="assets/blacklogo.png" class="hitam" /></a> -->
        </div>
        <div class="menu">
          <ul>
            <li><a href="#profile" class="active"></a></li>
            <li><a href="#about"></a></li>
            <li><a href="#aboutus"></a></li>
            <li><a href="index.php">Kembali</a></li>
          </ul>
        </div>
      </div>
    </nav>


<div class="container" style="max-width:50%;margin-top: 200px;">
	<div class="text-left mt-5">
		<h5>Search Item</h5>
	</div>

	<input type="text" class="form-control mb-4" id="live_search" autocomplete="off" placeholder="Search ..." value="">
</div>
      <h2 class="text-center mb-4">Produk Kami</h2>

<div id="searchresult"></div>
<div id="showtable">
	
      <?php
		while($num = mysqli_fetch_array($query)){
        if($num['gambar'] != "") { 
              $gambar = $num['gambar']; 
            }else {
              $gambar = "default.jpg";
            }
            $link_gambar = "assets/images/data/$gambar";

      ?>
      <div class="card_luar">
            <div class="card">
                <div class="card_image">
                  <img src="<?php echo $link_gambar;?>" class="card_image">
                </div>
                <div class="card_name">
                  <?php 
                    $nama_barang = $num['nama_barang'];
                    echo $nama_barang; 
                  ?>
                  </div>
                <div class="card_price">
                  <?php 
                    $harga_barang = $num['harga_barang'];
                    echo "Rp. ".number_format($harga_barang,0,',','.').".00"; 
                  ?>
                </div>
            </div>
        </div>

       <?php
       }
       ?> 
</div>
 
    <script src="assets/js/javascript.js"></script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   	<script type="text/javascript">
	$(document).ready(function(){
		$("#live_search").keyup(function(){
			var input = $(this).val();
			//alert(input);

			if (input != "") {
				$.ajax({
					url:"searchuser.php",
					method:"POST",
					data:{input:input},

					success:function(data){
						$("#searchresult").html(data);
						$("#showtable").css("display","none");
						$("#searchresult").css("display","block");
					}
				});
			}else{
				$("#searchresult").css("display","none");
				$("#showtable").css("display","block");
			}
		});
	});
</script>
  </body>
</html>
