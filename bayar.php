<?php 

    require 'admin.php';

    $order = query("SELECT * FROM orderan" );

    if (isset($_POST["cari"])) {
        $order = cari($_POST["keyword"]);
      }

    $status = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai yang dipilih dari form
        $status = $_POST["status"];
    }

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
            background-size: 55%;
        }
        .container-fluid{
          margin-top: -10px;
          height: 100px;
          box-shadow: 5px 0px 30px gray;
          background: none;
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
        span{
          color: rgb(0, 225, 195);
        }
        .form{
            margin-top: 100px;
        }
        .list-group-item{
            font-size: 15px;
        }
        .container {
            background-color: #fff;
            text-align: center;
            margin-top: 50px;
        }

        .collapse .navbar-nav{
              display: flex;
              flex-direction: row;
            }

            .collapse .navbar-nav .nav-item{
              padding-right: 30px;
            }

        .d-flex{
          justify-content: center;
          margin-top: 1rem;
        }

        .table {
            box-shadow: 0px 5px 20px gray;
        }

        .table th {
            background-color: rgb(0, 225, 195);
        }
        .btn{
            color: #fff;
            width: 100px;
            background: -webkit-linear-gradient(left, #5BC0F8, #0081C9);
        }
        a{
            text-decoration: none;
            color: #fff;
        }
        .btn:hover{
            color: #fff;
            box-shadow: 0px 0px 15px #5BC0F8;
        }
        input[type="search"]{
            width: 500px;
        }
        .table img{
          width: 50px;
        }
        @media (max-width:760px) {
          .container-fluid img{
              width: 70px;
            }
            input[type="search"]{
            width: 200px;
            }
            .table img{
              width: 20px;
            }
            .btn{
              width: 50px;
              height: 30px;
            }
            .btn{
              font-size: 10px;
            }
            .container{
              font-size: 10px;
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
              <a class="nav-link" href="index.php"><i class="fa-solid fa-house-chimney" style="margin-right: 5px;"></i>Home</a>
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
              <a class="nav-link active" aria-current="page" href="#" style="color: rgb(0, 225, 195); text-shadow: 1px 1px 1px black;">Pesanan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br>

    <form class="d-flex" role="search" method="post">
        <input class="form-control me-2" name="keyword" type="search" placeholder="Cari Pesanan Anda..." aria-label="Search" style="margin-top:5px; height:40px;" autofocus autocomplete="off">
        <button class="btn btn-outline-success" name="cari" type="submit" style="margin-top:5px; height:40px;"><b>Cari</b></button>
    </form>

  <div class="container">
    <table class="table table-striped-columns">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Pesanan Atas Nama</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($order as $row) : ?>
          <tr>
            <td><?= $i ?></td>
            <td><img src="imgorderan/<?= $row["gambar"] ?>"></td>
            <td><?= $row["namabarang"] ?></td>
            <td><?= $row["atasnama"] ?></td>
            <td><?= $row["totalharga"] ?></td>
            <td><?= $row["status"] ?></td>
            <td>
                <a href="checkout.php?id=<?= $row["id"] ?>"> 
                <button type="button" class="btn" style="background: -webkit-linear-gradient(left, #5BC0F8, #0081C9)">
                    <b>CheckOut </b>
                </button>
                 </a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  </body>
</html>