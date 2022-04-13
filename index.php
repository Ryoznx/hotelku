<?php
  include "includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WELCOME - HotelYO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="hotel.png" />
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet">
</head>
<body>

<!------------------------------ISI BODY----------------------------- -->

<!------------------AWAL BAGIAN HEADER----------------- -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

<!------------------AKHIR BAGIAN HEADER----------------- -->

<!------------------------------AWAL BAGIAN NAVBAR(MENU)----------------------------- -->
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white" id="tombol_kamar"> Fasilitas Kamar</a></li>
          <li><a href="#" class="nav-link px-2 text-white"id="tombol_fasilitas">Fasilitas Umum</a></li>
        </ul>
          <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Login
</button>
<!-- jumbutron -->
<h1>HOTELYO</h1>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: #000 !important;">Login </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post"><
      <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label text-dark">Username</label>
  <input type="text" class="form-control" id="username" name="username" placeholder="username">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label text-dark">Password</label>
  <input type="password" class="form-control" id="password" name="password" placeholder="password">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="login">Kirim</button>
      </div>
    </div>
  </div>
</div>
<?php
      if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // menyeleksi data user dengan username dan password yang sesuai
        $login = mysqli_query($conn, "SELECT * FROM tb_user where username='$username' and password='$password'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($login);

        // cek apakah username dan password di temukan pada database
        if ($cek > 0) {

          $data = mysqli_fetch_assoc($login);

          // cek jika user login sebagai admin
          if ($data['tipe'] == "admin") {

            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['tipe'] = "admin";
            // alihkan ke halaman dashboard admin
            echo "<script>window.location.href = 'admin';</script>";

            // cek jika user login sebagai pegawai
          } else if ($data['tipe'] == "resepsionis") {
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['tipe'] = "resepsionis";
            // alihkan ke halaman dashboard pegawai
            echo "<script>window.location.href = 'resepsionis';</script>";

            // cek jika user login sebagai pengurus
          } else {
            // alihkan ke halaman login kembali
            echo "<script>window.location.href = '';</script>";
          }
        } else {
          echo "<script>window.location.href = '';</script>";
        }
      }
      ?>
      </form>
        </div>
      </div>
    </div>
  </header>
<!------------------------------AKHIR BAGIAN NAVBAR(MENU)----------------------------- -->
<!-- Jumbutron -->
<div class="container-fluid py-5 " style="background-color: gainsboro;" id="panel_jumbotron">
  <div >

    <h1 class="display-">Selamat datang di <b><span class="text-purple text-bold">Hotelyo</span></h1>
    <p class="col-md-8 fs-4">Sewa kamar Hotel dan Apartemen, dimanapun dan kapanpun anda mau.</p>
  </div>
</div>

<!------------------------------AWAL BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->
<div id="demo_slide" class="carousel slide" data-bs-ride="carousel">
    <!-- INDIKATOR CAROUSEL -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    
   <div class="carousel-inner">
     <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
        <?php
            $aktif="active";
            $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              //membaca data pada baris tabel
              while($row = $result->fetch_assoc()) {
                $nf= $row["nama_fasilitas"];
                $gambar= $row["gambar"];
                $ket = $row["keterangan"];
        ?>
              <div class="carousel-item <?php echo $aktif;?> ">
                <img src="<?php echo $gambar; ?>" alt="Los Angeles" class="d-block" style="width:100%">
                  <div class="carousel-caption">
                    <h3><?php echo $nf; ?></h3>
                    <p><?php echo $ket; ?></p>
                  </div>
              </div>
            
        <?php
            $aktif="";
              }
            } 
        ?>
      <!-- Akhir Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
      
    <!-- KONTROL TOMBOL KIRI DAN KANAN SLIDESHOW -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>

   </div>
  </div>
<!------------------------------AKHIR BAGIAN CAROUSEL(SLIDESHOW)----------------------------- -->

<!-- SCRIPT TOMBOL PESAN SEKARANG -->
<div class="container mt-2">
    <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-sm form-floating mb-3 mt-4">
                    <button type="button" id="tombol_pesan" class="btn btn-outline-warning">Mulai Pesan Sekarang</button>
                    
                </div>
            </div> 
    </div>
 </div>

<!-- SCRIPT CHECK IN, CHECK OUT, JUMLAH KAMAR -->
 <div class="container mt-2" id="panel_cek">
    <div class="d-flex justify-content-center">
        <form>
            <div class="row">
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="date" class="form-control" id="masuk" name="masuk">
                    <label for="masuk"> Check In</label>
                </div>
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="date" class="form-control" id="keluar" name="keluar">
                    <label for="keluar"> Check Out</label>
                </div>
                <div class="col-sm form-floating mb-3 mt-3">
                    <input type="number" class="form-control" id="jkamar"  name="jkamar">
                    <label for="jkamar">Jumlah Kamar</label>
                </div>
            </div>
          </form>       
    </div>
 </div>

 <!-- SCRIPT PEMESANAN -->
 <div class="container mt-4 col-sm-8" id="panel_pemesanan">
    <div class="card d-flex justify-content-center">
        <div class="card-body bg-primary">
            <div class="row bg-primary text-white">
                <h4>Form Pemesanan</h4>
                <p>Silahkan memasukan data pada form ini untuk memulai pemesanan!</p>
            </div>
            <div class="row bg-white">
              <form id="form_pesan">
                <div class="form-floating mb-2 mt-3">
                    <input type="text" class="form-control" id="nama"  name="nama">
                    <label for="nama">Nama Pemesanan</label>
                </div>         
                <div class="form-floating mt-2 mb-2">
                    <input type="email" class="form-control" id="email" name="email">
                    <label for="pwd">Email</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                    <input type="text" class="form-control" id="hp" name="hp">
                    <label for="hp">No. Telepon</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                    <input type="text" class="form-control" id="tamu" name="tamu">
                    <label for="tamu">Nama Tamu</label>
                </div>
                <div class="form-floating mt-2 mb-2">
                <select class="form-select mt-3" id="idkamar" name="idkamar">
                  <?php
                    $sql = "SELECT * FROM tb_kamar";
                    $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                      //membaca data pada baris tabel
                      while($row = $result->fetch_assoc()) {
                  ?>
                        <option value="<?php echo $row["id_kamar"]; ?>"> <?php echo $row["nama_kamar"]; ?> </option>                 
                  <?php 
                    }
                   }
                  ?>
                   </select>
                    <label for="idkamar">Tipe Kamar</label>
                </div>
                <div class="mt-3 mb-3">
                    <button type="button" id="konfirmasi" class="btn btn-outline-success">Konfirmasi Pemesanan</button>
                    <button type="button" id="tombol_batal" class="btn btn-outline-danger">Batal</button>
                </div>
            </form>

          </div>
        </div>
    </div>
</div>

<!-- SCRIPT FASILITAS -->
<div class="container mt-2" id="panel_fasilitas_kami">
    <h2 class="text-center" >FASILITAS KAMI</h2>
      <h5 class="text-center">HotelYO</h5>
        
      <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
        <?php
            $aktif="active";
            $sql = "SELECT * FROM tb_fasilitas_umum ORDER BY id DESC LIMIT 5";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              //membaca data pada baris tabel
              while($row = $result->fetch_assoc()) {
                $nf= $row["nama_fasilitas"];
                $gambar= $row["gambar"];
                $ket = $row["keterangan"];
        ?>

      <div class="container mt-4">
      <div class="card">
        <h5><?php echo $nf ; ?></h5>
        <p><?php echo $ket ; ?></p>
        <img class="img-fluid" max-width: 100%;  height: auto; src="<?php echo $gambar ; ?>" alt="Gambar"> 
      </div>
      </div>
    <?php
        }
      } 
    ?>
</div>

<!-- SCRIPT KAMAR -->
<div class="container mt-2 col-sm-7" id="panel_kamar">
  <h1 class="text-center" >Fasilitas</h1>
  <center><p>Hotel Kami Memiliki Fasilitas</p></center>

  <div class="justify-content-center">
   <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
   <div class="   row" id="panel_kamar">
  <div class="   row" id="panel_kamar">
   <!-- Mulai Script Panggil SlideShow Dari Tabel Fasilitas Umum menggunakan PHP -->
   <?php
     $sql = "SELECT * FROM tb_fasilitas_kamar ORDER BY id DESC LIMIT 5";
      $result = $conn->query($sql);
       if ($result->num_rows > 0) {
       //membaca data pada baris tabel
        while($row = $result->fetch_assoc()) {
         $idk= $row["id_kamar"];
         $gambar= $row["gambar"];
         $fas = $row["fasilitas"];

         $sql2    = "SELECT nama_kamar FROM tb_kamar WHERE id_kamar= '$idk'";
         $result2 = $conn->query($sql2);
         $row2    = $result2->fetch_assoc();
   ?>

  <div class="card mt-2 mb-4 col-lg-4 col-sm-6 col-md">
        <h5 class="card-title"><?php echo $row2["nama_kamar"]; ?> :</h5>
        <ul> 
          <li><?php echo $fas; ?></li>
        </ul>
        <img class="img-fluid flex-center" src="<?php echo $gambar; ?>" alt="Card image cap">
        <div class="card-body">
          <p class="card-text"></p>
        </div>
      </div>
   <?php
        }
      }
    ?>   
  </div>
</div>
        </div>
</div>
</div>

<!-- SCRIPT TEANTANG KAMI -->
<div class="container  mt-2" id="panel_tentang_kami">
  <div class="d-flex justify-content-center">
    <div class="row">
     <div class="col-sm-12 p-5">
      <h2 class="text-center">TENTANG KAMI</h2>
      <p><center> <b>HotelYO</b>
“Hotelyo ini luas dan bersih dengan fasilitas lengkap. Sangat dekat dengan wisata-wisata menarik, <br>
dan kami sangat menikmatinya. Tempat tidurnya nyaman dan toiletnya bersih.
 Secara keseluruhan memuaskan dan akan memesannya lagi lain kali.”
 <section id="projects">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <h2>Destinasi Paling Populer di Indonesia</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4 mb-3" data-aos="flip-right">
            <div class="card">
              <img src="jakarta.jpg" class="card-img-top" alt="Project 1" />
              <div class="card-body">
                <p class="card-text">DKI Jakarta</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" data-aos="flip-right" data-aos-delay="500">
            <div class="card">
              <img src="candi.jpg" class="card-img-top" alt="Project 2" />
              <div class="card-body">
                <p class="card-text"> Candi Borobudur</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" data-aos="flip-right" data-aos-delay="1000">
            <div class="card">
              <img src="bandung.jpg" class="card-img-top" alt="Project 3" />
              <div class="card-body">
                <p class="card-text">Bandung </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" data-aos="flip-right" data-aos-delay="500">
            <div class="card">
              <img src="bali.jpg" class="card-img-top" alt="Project 4" />
              <div class="card-body">
                <p class="card-text">Bali</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" data-aos="flip-right" data-aos-delay="1000">
            <div class="card">
              <img src="semarang2.jfif" class="card-img-top" alt="Project 5" />
              <div class="card-body">
                <p class="card-text">Kota tua semarang</p>
              </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
   </div>
  </div>
  
 </div>
</div>
<!-- Footer -->

      <br>
      
<!-- SCRIPT FOOTER -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="footer__priceline__list">
<ul  style="display:flex; justify-content:center;" >
<li style="margin-right:100px">
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_booking/27c8d1832de6a3123b6ee45b59ae2f81b0d9d0d0.png" title="Booking.com" alt="Booking.com" height="26" width="91">
</li>
<li style="margin-right:100px">
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_priceline/f80e129541f2a952d470df2447373390f3dd4e44.png" title="Priceline" alt="Priceline" height="26" width="91">
</li>
<li style="margin-right:100px">
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_kayak/83ef7122074473a6566094e957ff834badb58ce6.png" title="Kayak" alt="Kayak" height="26" width="79">
</li>
<li style="margin-right:100px">
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_agoda/1c9191b6a3651bf030e41e99a153b64f449845ed.png" title="Agoda" alt="Agoda" height="26" width="70">
</li>
<li style="margin-right:100px">
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_rentalcars/6bc5ec89d870111592a378bbe7a2086f0b01abc4.png" title="Rentalcars" alt="Rentalcars" height="26" width="109">
</li>
<img src="https://t-cf.bstatic.com/static/img/tfl/group_logos/logo_opentable/a4b50503eda6c15773d6e61c238230eb42fb050d.png" title="OpenTable" alt="OpenTable" height="26" width="95">
</li>
</ul>
</div>
<!-- hiasan -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#0d6efd"
          fill-opacity="10"
          d="M0,128L30,149.3C60,171,120,213,180,224C240,235,300,213,360,192C420,171,480,149,540,160C600,171,660,213,720,197.3C780,181,840,107,900,101.3C960,96,1020,160,1080,197.3C1140,235,1200,245,1260,234.7C1320,224,1380,192,1410,176L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- footer -->
    <footer class="bg-primary text-white text-center pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://instagram.com/r.yoznx?utm_medium=copy_link" class="text-white fw-bold">Riocoding</a></p>
    </footer>
<!-- PANGGIL FILE JAVASCRIPT DARI FOLDER js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap5.0.1.bundle.min.js"></script>
<script src="crud_js/pesan.js"></script>

<!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->
<script>
$(document).ready(function(){

     /*KONDISI SAAT WEBSITE DIJALANKAN PERTAMA KALI*/
     $('#panel_cek').hide();
     $('#panel_fasilitas_kami').hide();
     $('#panel_pemesanan').hide();
     $('#panel_tentang_kami').show();
     $('#panel_kamar').hide();

     /*KONDISI TOMBOL PESAN SEKARANG DI KLIK*/
      $("#tombol_pesan").click(function(){
        $('#panel_tentang_kami').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_cek').show();
        $('#panel_pemesanan').show();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });

      /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
      $("#tombol_batal").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').show();
        $('#demo_slide').show();
        $('#panel_kamar').hide();
      });

       /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_fasilitas").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').show();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').hide();
        $('#demo_slide').hide();
      });
        /*KONDISI TOMBOL BATAL SAAT DI KLIK*/
        $("#tombol_kamar").click(function(){
        $('#panel_cek').hide();
        $('#panel_fasilitas_kami').hide();
        $('#panel_pemesanan').hide();
        $('#panel_tentang_kami').hide();
        $('#panel_kamar').show();
        $('#demo_slide').hide();
      });

});

</script>
<!------------------------------ AWAL KONDISI CODING JAVASCRIPT-------------------------------- -->

</body>
<!-- END BODY -->
</html>
