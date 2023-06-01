<?php
	include "./config/connection.php";
	$sql = "SELECT* from tb_barang";
	$query = mysqli_query($conn,$sql);
?>

<?php 
session_start();

if(!isset($_SESSION['login'])){
	header("location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../assets/css/items.css?v=<?php echo time(); ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD</title>
	<a href="logout.php" class="logout">LOGOUT</a>
</head>
<body>
<form method="POST" action="./config/saveAdmin.php">
	<table class="items"> 
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
			<td colspan="3"><input type="submit" name="submit_button" class="tambah" id="submit_button" value="Tambah"></td>
		</tr>
	</table>
<br>
	<table border="1" class="isi">
		<tr class="header">
			<td width="">No Barang</td>
			<td> Nama Barang</td>
			<td>Jumlah</td>
			<td>Harga Barang</td>
			<td colspan="2">Action</td>
		</tr>
		
		<?php 
		$num = mysqli_num_rows($query);
		for ($x = 0 ; $x < $num ; $x++){
			$result = mysqli_fetch_array($query);
			$no_barang = $result['no_barang'];
			$nama_barang = $result['nama_barang'];
			$jumlah = $result['jumlah'];
			$harga_barang = $result['harga_barang'];
		?>

		<tr>
			<td class="no_barang"><?php echo $no_barang; ?></td>
			<td class="nama_barang"><?php echo $nama_barang; ?></td>
			<td class="jumlah_barang"><?php echo $jumlah; ?></td>
			<td class="harga_barang"><?php echo $harga_barang; ?></td>
			<td class="action"><input type="button" name="delete_button" id="delete_button" value="delete" onclick="func_delete(<?php echo "{$no_barang}"?>)"></td>
					<td><input type="button" name="edit" id="edit" value="edit" onclick="func_edit(<?php echo"'$no_barang','$nama_barang','$jumlah','$harga_barang'"?>)"></td>
			</tr>
		<?php 
		}
		?>
	</table>
</form>
<?php
//echo str_pad("1", 5, '0', STR_PAD_LEFT);
?>
</body>
<script>
	function func_delete(no_barang){
		location.href = "./config/saveAdmin.php?no_barang="+no_barang+"&submit_button=delete";
	}

	function func_edit(no_barang,nama_barang,jumlah,harga_barang){
		document.getElementById('no_barang').value = no_barang;
		document.getElementById('nama_barang').value = nama_barang;
		document.getElementById('jumlah').value = jumlah;
		document.getElementById('harga_barang').value = harga_barang;
		document.getElementById('submit_button').value = "edit";
	}
</script>
</html>