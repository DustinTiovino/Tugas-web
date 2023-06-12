<?php 
include("./login/config/connection.php");

 if (isset($_POST['input'])) {
	$input = $_POST['input'];

	$query = "SELECT * FROM tb_barang where nama_barang LIKE '%{$input}%' OR harga_barang LIKE '%{$input}%'";

	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {?>
		<?php 
		while($num = mysqli_fetch_assoc($result)){
        if($num['gambar'] != "") { 
              $gambar = $num['gambar']; 
            }else {
              $gambar = "default.jpg";
            }
            $link_gambar = "assets/images/data/$gambar";

      ?>
      <span class="card_luar">
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
        </span>

       <?php
       }
       ?> 

		<?php
	}else{
		echo "<h6 class='text-danger text-center mt-3'>Data Not Found</h6>";
	}
}
?>