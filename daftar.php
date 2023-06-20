    <?php

    require("admin.php");

    if(isset($_POST["register"])){

        if(akungame($_POST) > 0 ){
            echo "<script>
                  alert('Akun Game Kamu Berhasil Ditambahkan!');
                  document.location.href = 'index.php';
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    .card{
      width: 22rem;
      margin-top: 50px;
      box-shadow: 10px 10px 25px gray;
    }
    .navbar-nav{
      align-items: right;
    }
    .stripped{
        width: 100px;
        height: 5px;
        background-color: gold;
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .list-group-item input{
        border-radius: 10px;
        border-color: lightgray;
        width: 200px;
        height: 40px;
        border: 1;
        padding-left: 10px;
    }
    .site-footer{
      background-color: white;
    }

    span{
      color: gold;
    }

    .social-icons{
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
    a{
      text-decoration: none;
      color: black;
    }

    /* Responsive */
    @media (max-width:720px) {
      .container-fluid{
        width: 100%;
        height: 100px;
      }
      .collapse .navbar-nav{
        display: flex;
        flex-direction: row;
      }
      .collapse .navbar-nav .nav-item{
        padding-right: 30px;
      }
      .card{
        width: 15rem;
      }
      .card-title{
        font-size: 20px;
      }
      .card-text{
        font-size: 15px;
      }
      .list-group-item{
        font-size: 15px;
      }
      input[type]{
        height: 30px;
        width: 150px;
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
        <img src="img/logostore.png" width="35"  class="d-inline-block align-text-top">
        <a class="navbar-brand" href="#">Angga Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php" ><i class="fa-solid fa-house-chimney" style="margin-right: 5px;"></i>Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active"  aria-current="page" href="daftar.php" style="color: gold; text-shadow: 1px 1px 1px black;"><i class="fa-solid fa-user-plus" style="margin-right: 5px;"></i>Daftarkan Akun Game</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br>

<center>
  <div class="card">
      <div class="card-body">
          <h2 class="card-title">Daftarkan Akun Game Anda</h2>
          <div class="stripped"></div>
          <p class="card-text">Isi Form Terlebih Dahulu!</p>
      </div>
      <form action="" method="post" class="regist-form">
      <ul class="list-group list-group-flush">
          <li class="list-group-item"><label for="userid">User ID :</label><br>
          <input type="number" name="userid" id="userid" required>
        </li>
          <li class="list-group-item"><label for="username">Username :</label><br>
          <input type="text" name="username" id="username" required>
        </li>
      </ul>
      <div class="card-body">
          <button class="btn btn-warning" type="submit" name="register"><i class="fa-solid fa-user-plus"></i>Daftar</button>
      </div><br>
      </form>
      <br><br>
  </div>
</center>

     <!-- Site footer -->
     <footer class="site-footer">
      <div class="container footer">
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6><span>About</span></h6>
            <p class="text-justify">Angga Store (PT ANGGA STORE INDONESIA) adalah tempat top up games yang aman, murah dan terpercaya. Proses nya cepat. Open 24 jam. Payment terlengkap. Jika ada kendala silahkan klik logo CS pada kanan bawah di website ini.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6><span>Menu</span></h6>
            <ul class="footer-links">
              <li><a href="#">Home</a></li>
              <li><a href="daftar.php">Daftarkan Akun Anda</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6><span>Game</span></h6>
            <ul class="footer-links">
              <li><a href="mlbb.php">Mobile Legends</a></li>
              <li><a href="#">Coming Soon</a></li>
              <li><a href="#">Coming Soon</a></li>
              <li><a href="#">Coming Soon</a></li>
              <li><a href="#">Coming Soon</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023  All Rights Reserved by 
         <a href="#">Angga Store</a>.
            </p>
            
          </div>
        </div>
      </div>
      <br><br>
</footer>

<!-- JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>