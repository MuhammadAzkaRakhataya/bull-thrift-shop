<?php

  require 'admin.php';

  $outfit = query("SELECT * FROM outfit");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bull Thrift Shop</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    body{
      font-family: 'Poppins';
      background-image: url(img/bg.avif);
    }
    .container-fluid{
      margin-top: -10px;
      height: 70px;
      box-shadow: 5px 0px 30px gray;
      background: none;
    }
    .banner img{
      box-shadow: 10px 10px 25px gray;
      margin-bottom: 50px;
      border-radius: 30px;
    }
    .daftarbaju .card{
      width: 15rem;
      text-align: center;
      margin-left: 20px;
      box-shadow: 7px 7px 25px gray;
      margin-bottom: 50px;
      border-radius: 10px;
      background-size: cover;
      background-position: left;
    }
    .card{
    box-shadow: 7px 7px 25px gray;
    }

    .container{
      display: flex;
      justify-content: center;
    }

    .daftarbaju{
      display: flex;
      flex-direction: row;
    }
    .daftarbajuz{
      display: flex;
      flex-direction: row;
    }
    
    .daftarbaju .card img{
      border-radius: 10px;
    }
    a{
      text-decoration: none;
      color: black;
    }
    .navbar-nav{
      align-items: right;
    }
    .navbar-brand{
      font-size: 50px;
    }
    .nav-link{
      font-size: 20px;
    }

    .site-footer{
      background-color: white;
    }

    .card-text{
      font-size: 17px;
      font-weight: 800;
      color: limegreen;
    }

    span{
      color: rgb(0, 225, 195);
    }

    .social-icons{
      display: flex;
      flex-direction: row;
    }

    tr{
      display: flex;
      flex-direction: row;
    }

    .social-icons li{
      margin-right: 1rem;
    }
    .site-footer{
      margin-top: 2rem;
      box-shadow: -5px -5px 30px gray;
    }
    /* Responsive */
    @media (max-width:1200px) {
            .container-fluid{
              width: 100%;
              height: 100px;
            }
            .container-fluid img{
              width: 100px;
            }
            .banner img{
              width: 85%;
              border-radius: 10px;
            }

            .collapse .navbar-nav{
              display: flex;
              flex-direction: row;
            }

            .collapse .navbar-nav .nav-item{
              padding-right: 30px;
            }

            .container{
              width: 85%;
            }
            .daftarbaju{
              margin-left: -1.5rem;
            }
            .daftarbajuz .card{
              width: 10rem;
            }
          }
          
          @media (max-width:760px) {
            .daftarbaju .card .card-body {
              font-size: 70%;
              margin: -10px -10px -10px -10px;
            }
            .daftarbajuz{
              flex-direction: column;
            }
            .daftarbajuz .card{
              width: 10rem;
              margin-bottom: 1rem;
            }
            .container-fluid img{
              width: 70px;
            }
            .container-fluid{
              font-size: 20px;
            }
            .container-fluid .nav-item a{
              font-size: 15px;
            }
            .container-fluid .navbar-brand{
              font-size: 100%;
            }
            .text-justify{
              font-size: 15px;
            }
        }
  </style>
</head>
<body>

  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img src="img/logoshop.png" width="100"  class="d-inline-block align-text-top">
        <a class="navbar-brand" href="#"><b>BULL <span>THRIFT</span> SHOP</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" style="color: rgb(0, 225, 195); text-shadow: 1px 1px 1px black;"><i class="fa-solid fa-house-chimney" style="margin-right: 5px; color: rgb(0, 225, 195);"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Baju</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Jacket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Celana</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bayar.php">Pesanan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br>

    <center>
      <div class="banner">
        <img src="img/sliderbaju1.jpg" width="75%">
      </div>
      <div class="container">
        <div class="daftarbaju">
          <div class="daftarbajuz">
            <?php foreach ($outfit as $row) : ?>
                <div class="card">
                  <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                  <img src="imgorderan/<?= $row["gambar"]; ?>" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title"><?= $row["namabarang"]; ?></h5>
                    <h5 class="card-text">Rp. <?= $row["hargabarang"]; ?></h5>
                    <a href="outfit.php?id=<?= $row["id"] ?>" class="btn btn-success"><b>Beli</b></a>
                  </div>
                </div><br>
              <?php endforeach ; ?>
              </div>
          </div>
      </div>
    </center>

     <!-- Site footer -->
     <footer class="site-footer">
      <div class="container footer">
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <br>
            <h6><span>About</span></h6>
            <p class="text-justify"><span><b>BULL THRIFT SHOP</b></span> adalah tempat Toko Outfit, murah dan kualitas bahan terbaik. Proses pengiriman nya cepat. Payment terlengkap. Jika ada kendala silahkan chat Owner dengan cara click icon WhatsApp berikut. <br> <a href="https://wa.me/6287824014626" style="font-size: 50px ;"><span><i class="fa-brands fa-square-whatsapp"></i></span></a></p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6><span>Menu</span></h6>
            <ul class="footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="baju.php">Baju</a></li>
              <li><a href="jacket.php">Jacket</a></li>
              <li><a href="celana.php">Celana</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6><span>Kategori</span></h6>
            <ul class="footer-links">
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023  All Rights Reserved by 
         <a href="#">Bull Thrift Shop</a>.
            </p>
            <a href="haladmin.php">( Admin Button )</a>
          </div>
        </div>
      </div>
      <br><br>
</footer>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>