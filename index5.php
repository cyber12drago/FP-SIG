<?php 
  session_start();
  include 'koneksi.php';  // include = menambahkan/mengikutkan file, setting koneksi ke database
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Rute Bis</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href=" assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" tsype="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css"> 

    <script>
      function validateForm() {
        var x = document.forms["myForm"]["fname"].value;
        if (x == "") {
          alert("Name must be filled out");
          return false;
        }
      }
    </script>


  </head>
  <body>
    <script src="assets/js/jquery-min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/nivo-lightbox.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.min.js"></script>
    <script src="assets/js/map.js"></script>

    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyCsa2Mi2HqyEcEnM1urFSIGEpvualYjwwM"></script>
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  

    <!-- Donate Us Section -->
    <section id="donate-map" class="section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Set Asal/Tujuan Terminal</h1>
            </div>
          </div>
          <div class="col-lg-7 col-md-12 col-xs-12">
            <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
              <div class="form-wrapper">
                <form role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator"action=validate_rute.php>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="sel1">Asal:</label>
                          <select name="asal" class="form-control" id="sel1">
                            <?php 
                              $result = $mysqli->query("select * from tempat");  
                              if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()) {

                                  echo '<option value="'.$row["longtitude"].','.$row["latitude"].'">'.ucfirst($row["nama"]).'</option>';
                                }
                              }
                            ?>
                          </select>
                      </div>
                    </div> 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="sel1">Tujuan:</label>

                          <select name="tujuan" class="form-control" id="sel1">
                            <?php 
                              $result = $mysqli->query("select * from tempat");  
                              if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()) {
                                  echo '<option value="'.$row["longtitude"].','.$row["latitude"].'">'.ucfirst($row["nama"]).'</option>';
                                }
                              }
                            ?>
                          </select>
                      </div>
                    </div>
                  <a href="tambah.php">Tambah Tempat?</a>
                   <div class="col-md-12">   
                      <div class="form-submit">
                        <button type="submit" class="btn btn-common" id="form-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Set Asal dan Tujuan</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Donate Us Section End -->
     <!-- Aboutus end -->

 </body>
 </html>