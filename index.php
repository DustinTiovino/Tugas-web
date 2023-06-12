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
    <nav>
      <div class="layar-dalam">
        <div class="logo">
          <a href=""><img src="assets/images/logo2.png" class="putih" /></a>
          <!-- <a href=""><img src="assets/blacklogo.png" class="hitam" /></a> -->
        </div>
        <div class="menu">
          <ul>
            <li><a href="#profile" class="active">Profile</a></li>
            <li><a href="#about">Layanan </a></li>
            <li><a href="produk.php">Produk Kami </a></li>
            <li><a href="#aboutus">About us</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="scroll">
      <main>
        <section class="profile" id="profile">
          <main class="content profile_layer">
            <h1>Toko Perlengkapan</h1>
            <p>Selamat Datang</p>
            <a href="https://www.tokopedia.com/sunstationeries" target="_blank"
              ><button><span>Selengkapnya</span></button></a
            >
          </main>
        </section>
        <!-- <img src="assets/foto toko.jpg" alt="SUN ATK" /> -->

        <section class="about" id="about">
          <h2>Layanan yang Ditawarkan</h2>
          <div class="card-layout">
            <div>
              <input
                type="button"
                id="fotocopy_buka"
                class="fotocopy_buka card-layout-item"
                value="fotocopy"
                onclick="fotocopyOpen()"
                style="font-size: 0px"
              />
              <p id="fotocopy_detail" class="fotocopy_detail">
                1. Fotocopy warna (ukuran A4, F4)<br />
                2. Fotocopy hitam putih (ukuran A4, F4, A3)<br />
                <input
                  type="button"
                  id="fotocopy_tutup"
                  class="fotocopy_tutup"
                  value="tutup"
                  onclick="fotocopyClose()"
                />
              </p>
            </div>
            <div>
              <input
                type="button"
                id="cuciFoto_buka"
                class="cuciFoto_buka card-layout-item"
                value="Cuci Foto dan Pas Foto"
                onclick="cuciFotoOpen()"
                style="font-size: 0px"
              />
              <p id="cuciFoto_detail" class="cuciFoto_detail">
                1. Cuci foto ukuran 2x3 3x4 4x6 2r 3r<br />
                2. Pasfoto + cuci foto ukuran 2x3 3x4 4x6<br />
                <input
                  type="button"
                  id="cuciFoto_tutup"
                  class="cuciFoto_tutup"
                  value="tutup"
                  onclick="cuciFotoClose()"
                />
              </p>
            </div>
            <div>
              <input
                type="button"
                id="editFoto_buka"
                class="editFoto_buka card-layout-item"
                value="Jasa Edit Foto"
                onclick="editFotoOpen()"
                style="font-size: 0px"
              />
              <p id="editFoto_detail" class="editFoto_detail">
                1. Mengedit warna latar pasfoto<br />
                <input
                  type="button"
                  id="editFoto_tutup"
                  class="editFoto_tutup"
                  value="tutup"
                  onclick="editFotoClose()"
                />
              </p>
            </div>
            <div>
              <input
                type="button"
                id="scan_buka"
                class="scan_buka card-layout-item"
                value="Scan"
                onclick="scanOpen()"
                style="font-size: 0px"
              />
              <p id="scan_detail" class="scan_detail">
                1. Mengubah dokumen ke pdf<br />
                2. Mengubah dokumen ke jpg<br />
                <input
                  type="button"
                  id="scan_tutup"
                  class="scan_tutup"
                  value="tutup"
                  onclick="scanClose()"
                />
              </p>
            </div>
            <div>
              <input
                type="button"
                id="print_buka"
                class="print_buka card-layout-item"
                value="Print"
                onclick="printOpen()"
                style="font-size: 0px"
              />
              <p id="print_detail" class="print_detail">
                1. Print warna (ukuran A4, F4, Quarto) <br />
                2. Print hitam putih (ukuran A4, F4, Quarto)<br />
                <input
                  type="button"
                  id="print_tutup"
                  class="print_tutup"
                  value="tutup"
                  onclick="printClose()"
                />
              </p>
            </div>
            <div>
              <input
                type="button"
                id="laminating_buka"
                class="laminating_buka card-layout-item"
                value="Laminating"
                onclick="laminatingOpen()"
                style="font-size: 0px"
              />
              <p id="laminating_detail" class="laminating_detail">
                1. Melaminating dokumen (ukuran kertas hingga A3)<br />
                <input
                  type="button"
                  id="laminating_tutup"
                  class="laminating_tutup"
                  value="tutup"
                  onclick="laminatingClose()"
                />
              </p>
            </div>
          </div>
        </section>
      </main>
      <h2 class="text-center mb-4">Produk Kami</h2>
      <?php
      for ($x = 0 ; $x < 7 ; $x++) {
        $num = mysqli_fetch_array($query);
        if($num['gambar'] != "") { 
              $gambar = $num['gambar']; 
            }else {
              $gambar = "default.jpg";
            }
            $link_gambar = "assets/images/data/$gambar";

      ?>
      <span class="card_luar" id="card_luar">
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
       
       <a href="produk.php"><button type="button" style="margin-top:10px;margin-left: 87%;" class="btn btn-warning">Selengkapnya</button></a>

      <div class="aboutus" id="aboutus">
        <h2>About Us</h2>
        <div class="aboutusmid">
          <div class="atasabout">
            <p>
              SUN ATK adalah sebuah toko yang menyediakan layanan dan juga
              barang berupa keperluan Alat Tulis Kantor (ATK), toko ini mulai
              berdiri sejak awal tahun 2004 yang masih ada hingga saat ini. Pada
              mulanya toko ini hanya memberikan pelayanan berupa barang dan jasa
              yang berkaitan dengan keperluan kantor, namun seiring waktu
              layanan yang diberikan pun bertambah seperti layanan isi ulang
              pulsa, kuota dan token listrik.
            </p>

            <!--<button><span>Lihat</span></button>-->
          </div>

          <div class="container">
            <div class="wrapper">
              <img src="assets/images/foto_toko.jpg" />
              <img src="assets/images/toko 1.jpg" />
              <img src="assets/images/toko 3.jpg" />
              <img src="assets/images/toko 5.jpg" />
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="contact" id="contact">
          <div class="layar-dalam">
            <div>
              <h5>Contact Us</h5>
              <i class="fa fa-whatsapp">
                <a
                  href="https://wa.me/+6289659317779"
                  target="_blank"
                  style="font-size: 17px; text-decoration: underline"
                  >Hubungi Kami</a
                >
              </i>
              <br />

              <a
                href="https://www.tokopedia.com/sunstationeries"
                style="font-size: 17px"
                >Tokopedia</a
              >

              <br />
            </div>
            <div>
              <div class="alamat">
                <h5>Alamat</h5>
                <blockquote>
                  <span>Alamat: Jl. Adi Sucipto No.31B</span>
                </blockquote>
              </div>
              <div>
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8154267486625!2d109.37089081466938!3d-0.06900489994964018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59ff30c6248f%3A0xef9ebdbaa3de54f!2sJl.%20Adi%20Sucipto%20No.31B%2C%20Sungai%20Raya%2C%20Kec.%20Sungai%20Raya%2C%20Kabupaten%20Kubu%20Raya%2C%20Kalimantan%20Barat%2078117!5e0!3m2!1sid!2sid!4v1677451184660!5m2!1sid!2sid"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>
          </div>
          <!-- <p>ahdfbdakjfhdshjkfhgb</p> -->
          <div class="copyright">&copy; 2023 by SunATK</div>
        </div>
      </footer>
    </div>
    <script src="assets/js/javascript.js"></script>
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
     
  </body>
</html>
