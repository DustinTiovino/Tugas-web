<?php 
session_start();
if(!isset($_SESSION['login'])){
	header("location:index.php");
	exit;
}

include("./config/connection.php");

 if (isset($_POST['input'])) {
	$input = $_POST['input'];

	$query = "SELECT * FROM tb_barang where nama_barang LIKE '%{$input}%' OR jumlah LIKE '%{$input}%' OR harga_barang LIKE '%{$input}%'";

	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {?>
		<table class="isi table-bordered">
			<!-- <thead> -->
				<tr class="header">
					<td>No</td>
					<td>Nama Barang</td>
					<td>Jumlah</td>
					<td>Harga Barang</td>
					<td>Gambar</td>
					<td colspan="2">Action</td>

				</tr>
			<!-- </thead>
			<tbody> -->
				<?php
					while ($num = mysqli_fetch_assoc($result)) {
						if($num['gambar'] != "") { 
			            	$gambar = $num['gambar']; 
			            }else {
			            	$gambar = "default.jpg";
			            }
			            $link_gambar = "../assets/images/data/$gambar";
						$no_barang = $num['no_barang'];
						$nama_barang = $num['nama_barang'];
						$jumlah = $num['jumlah'];
						$harga_barang = $num['harga_barang'];
						$gambar = $num['gambar'];
				?>

				<tr>
					<td class="no_barang">
						<?php echo $no_barang;?>
					</td>

					<td class="nama_barang">
						<?php echo $nama_barang;?>
					</td>

					<td class="jumlah_barang">
						<?php echo $jumlah;?>
					</td>

					<td class="harga_barang">
						<div class="isi_harga_barang">
							<?php 
								$harga_barang = $num['harga_barang'];
								echo "Rp. ".number_format($harga_barang,0,',','.').".00"; 
							?>
						</div>
					</td>
					
					<td class="gambar">
						<img src="<?php echo $link_gambar;?>" width="200px">
					</td>
					
					<td class="action1">
						<input type="button" name="delete_button" id="delete_button" value="delete" onclick="func_delete(<?php echo "{$no_barang}"?>)">
					</td>

					<td class="action2">
						<a href="#atas"><input type="button" name="edit" id="edit" value="edit" onclick="func_edit(<?php echo"'$no_barang','$nama_barang','$jumlah','$harga_barang','$gambar'"?>)"></a>
					</td>
				</tr>
				<?php 
					}
				?>
			<!-- </tbody> -->
		</table>

		<?php
	}else{
		echo "<h6 class='text-danger text-center mt-3'>Data Not Found</h6>";
	}
}
?>