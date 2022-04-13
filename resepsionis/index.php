<?php
  include "../includes/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RESPSIONIS - HOTEL BOOKING</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../hotel.png" />
  <link href="../css/bootstrap5.0.1.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">RESEPSIONIS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
           <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
           <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
             <h5><a class="nav-link" href="">Home</a></h5> 
            </li>
          </ul>     
  
        </div>
      </div>
</nav>

<!--------------------------------------------- SCRIPT AWAL DATA RESERVASI ----------------------------------------------------------- -->
<div class="container mt-2" id="data_reservasi">
 <h2 class="text-center" >DATA RESERVASI</h2>
 <h5 class="text-center">HotelYO</h5>
 
   <div id="data_table"> 
   
   </div>
 


</div>
<!--------------------------------------------- SCRIPT AKHIR DATA  RESERVASI ----------------------------------------------------------- -->

<!------------------------------ Script Awal Modal Lihat Reservasi------------------------------ -->
<div class="modal fade" id="modal_lihat_reservasi">
  <div class="modal-dialog">
    <div class="modal-content">
       <input type="text" id="idpelanggan" value="3" hidden>   
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-center">Data Tamu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div id="pelanngan" class="modal-body">
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <p class="text-center"></p>
      </div>

    </div>
  </div>
</div>
<!------------------------------ Script Akhir Modal Lihat Reservasi ------------------------------ -->

<!----------------------------- Script Awal Modal Check Reservasi -------------------------------- -->
<div class="modal fade" id="modal_check_reservasi">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reservasi</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-floating mt-2 mb-2">
         <select class="form-select mt-3" id="proses" name="proses">
           <option value="1"> Selesai Checkin </option> 
           <option value="0"> Dalam Proses </option> 
           <option value="3"> Batal </option>   
          </select>
           <label for="idkamar">Proses</label>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="id_proses" >Proses</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!----------------------------- Script Akhir Modal Check Reservasi -------------------------------- -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<!-- SCRIPT FOOTER -->
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

<!-- SCRIPT FOOTER -->
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


<!-- SCRIPT JAVASCRIPT -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap5.0.1.bundle.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
 load_table();

 function load_table() 
 {
  var id=0;
  $.ajax({
     url: "proses/load_table.php",
     method: "POST",
     data:{ids:id},
          success: function(data)
          {
            //alert(data);return;
            $("#data_table").html(data).refresh;
          }
        });
  }

  $("#id_proses").click(function(){
    var proses    = $("#proses").val();
    var idproses  = $("#id_proses").val();

     $.ajax({
     url: "proses/proses_check.php",
     method: "POST",
     data:{ids:idproses, proses:proses},
          success: function(data)
          {
           if (data=="OK") 
            {
              alert("BERHASIL DIUBAH!");
              window.location.href="index.php";
		        } 
             if (data=="ERROR") 
              {
               alert("GAGAL DIUBAH!")
	            }
          }
        });
  });

});

</script>

<!-- END BODY -->
</body>
</html>
