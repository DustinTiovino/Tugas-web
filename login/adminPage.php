<?php
session_start();
	include "./config/connection.php";
	$sql = "SELECT * from tb_barang";
	$query = mysqli_query($conn,$sql);
    $gambar = "";
    if ($gambar == "") {
    	$gambar = "default.jpg";
    }
?>

<?php 

if(!isset($_SESSION['login'])){
	header("location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/items.css?v=<?php echo time(); ?>">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD</title>
</head>
<body>
<a href="logout.php" class="logout">LOGOUT</a>
<form method="POST" action="./config/saveAdmin.php" enctype="multipart/form-data">
	<table class="items" id="atas"> 
		<tr class="no">
			<td>No Barang</td>
			<td>:</td>
			<td><input type="text" name="no_barang"  id="no_barang" value="" readonly></td>
		</tr>

		<tr>
			<td>Nama Barang</td>
			<td>:</td>
			<td><input type="text" name="nama_barang" class="nama" id="nama_barang" value="" ></td>
		</tr>

		<tr>
			<td>Jumlah</td>
			<td>:</td>
			<td><input type="text" name="jumlah" class="jumlah" id="jumlah" value=""></td>
		</tr>

		<tr>
			<td>Harga Barang</td>
			<td>:</td>
			<td><input type="text" name="harga_barang" class="harga" id="harga_barang" value=""></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td>:</td>
			<td><input type="file" name="gambar" class="gambar" id="gambar" accept="image/*"></td>
		</tr>

		<tr>
			<td>Gambar Saat Ini</td>
			<td>:</td>
			<td><img src="../assets/images/data/<?php echo $gambar;?>" width="50px" id="gambar_saat_ini"></td>
		</tr>

		<tr>
			<td colspan="3"><input type="submit" name="submit_button" class="tambah" id="submit_button" value="Tambah"></td>
		</tr>

		<tr>
			<td colspan="3" id="cancel" style="visibility:hidden;"><input type="button" name="cancel_edit" class="tambah" id="cancel_edit" value="Cancel" onclick="cancelEdit()"></td>
		</tr>
	</table>
<br>

<div class="container" style="max-width:50%;">
	<div class="text-left mt-5">
		<h5>Search Item</h5>
	</div>

	<input type="text" class="form-control mb-4" id="live_search" autocomplete="off" placeholder="Search ..." value="">
</div>

<div id="searchresult"></div>

<div id="showtable">
	<table class="isi table-bordered">
		<tr class="header">
			<td>No</td>
			<td>Nama Barang</td>
			<td>Jumlah</td>
			<td>Harga Barang</td>
			<td>Gambar</td>
			<td colspan="2">Action</td>
		</tr>

		<?php 
        while($num = mysqli_fetch_array($query))
        {
            if($num['gambar'] != "") { 
            	$gambar = $num['gambar']; 
            }else {
            	$gambar = "default.jpg";
            }
            $link_gambar = "../assets/images/data/$gambar";
        ?>
        <tr>
			<td class="no_barang">
				<?php 
					$no_barang = $num['no_barang'];
					echo $no_barang;
				?>
			</td>

			<td class="nama_barang">
				<?php 
					$nama_barang = $num['nama_barang'];
					echo $nama_barang; 
				?>
			</td>

			<td class="jumlah_barang">
				<?php 
					$jumlah = $num['jumlah'];
					echo $jumlah; 
				?>
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
<!-- <div>
		<?php 
		$num = mysqli_num_rows($query);
		for ($x = 0 ; $x < $num ; $x++) {
			$result = mysqli_fetch_array($query);
			$no_barang = $result['no_barang'];
			$nama_barang = $result['nama_barang'];
			$jumlah = $result['jumlah'];
			$harga_barang = $result['harga_barang'];
			$gambar = $result['gambar'];
		?>

		<tr>
			<td class="no_barang">
				<?php echo $no_barang; ?>
			</td>

			<td class="nama_barang">
				<?php echo $nama_barang; ?>
			</td>

			<td class="jumlah_barang">
				<?php echo $jumlah; ?>
			</td>

			<td class="harga_barang">
				<div class="isi_harga_barang">
					<?php echo "Rp. ".number_format($harga_barang,0,',','.').".00"; ?>
				</div>
			</td>

			<td class="gambar">
				<img src="../assets/images/data/<?php echo $gambar; ?>" width="200px">
			</td>

			<td class="action1">
				<input type="button" name="delete_button" id="delete_button" value="delete" onclick="func_delete(<?php echo "{$no_barang}"?>)">
			</td>

			<td class="action2">
				<input type="button" name="edit" id="edit" value="edit" onclick="func_edit(<?php echo"'$no_barang','$nama_barang','$jumlah','$harga_barang'"?>)">
			</td>
		</tr>

		<?php 
		}
		?>
</div> -->
	</table>
</div>
</form>
<?php
//echo str_pad("1", 5, '0', STR_PAD_LEFT);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
	function func_delete(no_barang){
		location.href = "./config/saveAdmin.php?no_barang="+no_barang+"&submit_button=delete";
	}

	function func_edit(no_barang,nama_barang,jumlah,harga_barang,gambar){
		document.getElementById('no_barang').value = no_barang;
		document.getElementById('nama_barang').value = nama_barang;
		document.getElementById('jumlah').value = jumlah;
		document.getElementById('harga_barang').value = harga_barang;
		if(gambar != ""){
		document.getElementById('gambar_saat_ini').src = "../assets/images/data/"+gambar+"";
		}else{
		document.getElementById('gambar_saat_ini').src = "../assets/images/data/default.jpg";
		}
		document.getElementById('submit_button').value = "edit";
		document.getElementById('cancel').style.visibility = "visible" ;
	}	

	function cancelEdit(){
		document.getElementById('no_barang').value = "";
		document.getElementById('nama_barang').value = "";
		document.getElementById('jumlah').value = "";
		document.getElementById('harga_barang').value = "";
		document.getElementById('gambar_saat_ini').src = "..	/assets/images/data/default.jpg";
		document.getElementById('submit_button').value = "Tambah";
		document.getElementById('cancel').style.visibility = "hidden" ;
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#live_search").keyup(function(){
			var input = $(this).val();
			//alert(input);

			if (input != "") {
				$.ajax({
					url:"livesearch.php",
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