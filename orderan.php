<?php 

    require 'admin.php';

    $order = query("SELECT * FROM orderan" );

    if (isset($_POST["cari"])) {
        $order = cari($_POST["keyword"]);
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
        .d-flex{
          justify-content: center;
          margin-top: 2rem;
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
            background-color: rgb(0, 225, 195)
        }
        a{
            text-decoration: none;
            color: #fff;
        }
        .btn:hover{
            color: #fff;
            box-shadow: 0px 0px 15px #5BC0F8;
        }
        @media (max-width:760px) {
          *{
            font-size: 10px;
          }
        }
        </style>
  </head>
  <body>

    <form class="d-flex" role="search" method="post">
        <input class="form-control me-2" name="keyword" type="search" placeholder="Cari Pesanan Anda..." aria-label="Search" style="margin-top:5px; height:40px; width: 500px;" autofocus autocomplete="off">
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
            <td><img src="imgorderan/<?= $row["gambar"] ?>" width="50px"></td>
            <td><?= $row["namabarang"] ?></td>
            <td><?= $row["atasnama"] ?></td>
            <td><?= $row["totalharga"] ?></td>
            <td><?= $row["status"] ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"] ?>"> 
                <button type="button" class="btn btn-success">
                    <b>Ubah </b>
                </button>
                 </a>
                 <a href="hapusorder.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin Ingin Dihapus?')" style="color: red;">
                 <button type="button" class="btn btn-danger" style="background-color: red;">
                    <b>Hapus </b>
                </button>
                </a>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    
  </div>
  <center>

      <a href="haladmin.php">
            <button class="btn btn-info" style="background-color: green;">Kembali</button>
            </a>
            <a href="index.php">
            <button class="btn btn-warning" style="background-color: gold; color: black;">Home</button>
            </a>
  </center><br><br>

  </body>
</html>