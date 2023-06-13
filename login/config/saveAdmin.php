<?php
include 'connection.php';
$no_barang = $_REQUEST['no_barang'];
$submit_button = $_REQUEST['submit_button'];

	if ($submit_button == "Tambah") {
		$nama_barang = $_POST['nama_barang'];
		$jumlah = $_POST['jumlah'];
		$harga_barang = $_POST['harga_barang'];

		$gambar = "";
		$gambar_cek = $_FILES['gambar']['name'];
		if($gambar_cek != "") {
			$folder   = "../../assets/images/data"; //tempat di upload
			$gambar_tmp = $_FILES['gambar']['tmp_name']; //file yg diupload
			$gambar_name= md5(date("YmdHis")); //nama gambar yg baru
			$gambar_split = explode(".",$gambar_cek);//memecah nama gambar 
			$ext  = end($gambar_split);
			$gambar = $gambar_name.".".$ext;
			move_uploaded_file($gambar_tmp, "$folder/$gambar");
		}

		$sql="INSERT into tb_barang(nama_barang,jumlah,harga_barang,gambar) values('$nama_barang','$jumlah','$harga_barang','$gambar')";	
		mysqli_query($conn,$sql);


    	$sql = "SELECT no_barang FROM tb_barang ORDER BY no_barang ASC";
		$result = mysqli_query($conn, $sql);
		//sama seperti comment #2, fungsi ditaruh di tombol tambah agar menghilangkan bug dimana harus menekan tombol delete terlebih dahulu baru urutan akan berubah
		$current_no_barang = 1;
		while ($row = mysqli_fetch_assoc($result)) {
		    $new_no_barang = $current_no_barang;
		    if ($row['no_barang'] != $current_no_barang) {
		        $sql = "UPDATE tb_barang SET no_barang = $new_no_barang WHERE no_barang = " . $row['no_barang'];
		        mysqli_query($conn, $sql);
		    }
		    $current_no_barang++;
		}
		//end
	}
	else if ($submit_button == "delete") {

		$qry = mysqli_query($conn,"SELECT * FROM tb_barang WHERE no_barang='$no_barang' ");
		$row = mysqli_fetch_array($qry);
		if(!empty($row['gambar']))
		{
			unlink("../../assets/images/data/$row[gambar]");//hapus file gambar
		}

		$sql = "DELETE FROM tb_barang WHERE no_barang='$no_barang' ";
		mysqli_query($conn,$sql);

    	// $sql = "DELETE from tb_barang where no_barang='$no_barang'";
    	// $query = mysqli_query($conn,$sql);
    	
    	//comment #1
    	//mengubah data id, contoh 1,2,3,4 dihapus nomor 4, data selanjutnya akan balik menggunakan auto increament 4, sumber : chatGPT
    	
    	$sql = "ALTER TABLE tb_barang AUTO_INCREMENT = 1";
    	$query = mysqli_query($conn,$sql);
    	
    	//end

    	//comment #2
    	//mencegahan misal 1,2,3,4, dihapus nomor 2, maka 3 dan 4 otomatis akan berubah menjadi 2 dan 3, sumber : chatGPT
    	
    	$sql = "SELECT no_barang FROM tb_barang ORDER BY no_barang ASC";
		$result = mysqli_query($conn, $sql);

		$current_no_barang = 1;
		while ($row = mysqli_fetch_assoc($result)) {
		    $new_no_barang = $current_no_barang;
		    if ($row['no_barang'] != $current_no_barang) {
		        $sql = "UPDATE tb_barang SET no_barang = $new_no_barang WHERE no_barang = " . $row['no_barang'];
		        mysqli_query($conn, $sql);
		    }
		    $current_no_barang++;
		}
		//end
	}
	else if ($submit_button == "edit") {
		$nama_barang = $_POST['nama_barang'];
		$jumlah = $_POST['jumlah'];
		$harga_barang = $_POST['harga_barang'];
		//$gambar = $_POST['gambar'];
    	$sql = "UPDATE tb_barang set nama_barang = '$nama_barang',jumlah = '$jumlah',harga_barang = '$harga_barang' where no_barang = '$no_barang'";
    	$query = mysqli_query($conn,$sql);

		// if($gambar != "") {
  //   	$sql = "UPDATE tb_barang set nama_barang = '$nama_barang',jumlah = '$jumlah',harga_barang = '$harga_barang',gambar = '$gambar' where no_barang = '$no_barang'";
  //   	$query = mysqli_query($conn,$sql);
  //   	}else{
  //   	$sql = "UPDATE tb_barang set nama_barang = '$nama_barang',jumlah = '$jumlah',harga_barang = '$harga_barang' where no_barang = '$no_barang'";
  //   	$query = mysqli_query($conn,$sql);
  //   	}

    	$gambar_cek = $_FILES['gambar']['name'];
		if($gambar_cek != "") {
			$folder   = "../../assets/images/data"; //tempat di upload
			$gambar_tmp = $_FILES['gambar']['tmp_name']; //file yg diupload
			$gambar_name= md5(date("YmdHis")); //nama gambar yg baru
			$gambar_split = explode(".",$gambar_cek);//memecah nama gambar 
			$ext  = end($gambar_split);
			$gambar = $gambar_name.".".$ext;
			move_uploaded_file($gambar_tmp, "$folder/$gambar");

			//hapus gambar lama
			$qry = mysqli_query($conn,"SELECT * FROM tb_barang WHERE no_barang='$no_barang' ");
			$row = mysqli_fetch_array($qry);
			if(!empty($row['gambar']))
			{
				unlink("../../assets/images/data/$row[gambar]");//hapus file gambar
			}

			//update gambar baru
			$sql = "UPDATE tb_barang SET gambar='$gambar' WHERE no_barang='$no_barang' ";
			mysqli_query($conn,$sql);

		}
	}

header('location:../adminPage.php');
?>