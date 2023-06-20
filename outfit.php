<?php 

    require("admin.php");

    $id = $_GET['id'];

    $outfit = query("SELECT * FROM outfit WHERE id = $id");

    if( isset($_POST["submit"])) {

    if( pesan($_POST) > 0 ) {
        echo "
            <script>
                alert('Pemesanan Berhasil');
                document.location.href = 'bayar.php?id=$outfit[id]';
            </script
        ";
    } else {
        echo "
            <script>
                alert('Pemesanan Gagal');
                document.location.href = 'bayar.php';
            </script";
        echo "<br>";
        echo mysqli_error($conn);
    }

    $status = "";
    $jenisbayar = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mendapatkan nilai yang dipilih dari form
        $status = $_POST["status"];
        $jenisbayar = $_POST["jenisbayar"];
    }
    
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Produk Sekarang!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Poppins';
            background-image: url(img/bg.avif);
            background-size: contain;
        }
        .form{
            margin-top: 100px;
        }
        .card{
            width: 25rem;
            margin-top: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 5px 7px 10px gray;
        }
        .card-title{
            font-weight: 700;
            background-color: #00FFAB;
            color: #fff;
            width: 400px;
            height: 70px;
            margin-top: -16px;
            margin-left: -16px;
            border-radius: 10px 10px 0px 0px;
            text-align: center;
            padding: 20px;
        }
        .list-group-item img{
            width: 70%;
            border-radius: 10px;
        }
        .list-group-item{
            color: #999;
            font-size: 15px;
        }
        .list-group-item:hover{
            color: black;
        }
        .list-group-item input{
            border-radius: 10px;
            color: gray;
        }
        .btn{
            color: #fff;
            width: 100px;
            margin-left: 150px;
            margin-top: -10px;
            margin-bottom: 30px;
            background-color: #00FFAB;
        }
        .btn:hover{
            color: #fff;
            box-shadow: 0px 0px 15px #14C38E;
        }
        @media (max-width:760px) {
            .card{
                width: 15rem;
            }
            .card-title{
                width: 240px;
                font-size: 20px;
            }
            .list-group-item{
                font-size: 13px;
            }
            input[type]{
                font-size: 15px;
                width: 150px;
            }
            .btn{
                margin-left: 4.5rem;
                width: 100px;
                height: 60px;
                font-size: 15px;
            }
        }
    </style>
  </head>
  <body>

    <div class="container">
        <center>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Beli Produk</h4>
                    <ul class="list-group list-group-flush">
                    <?php foreach ($outfit as $row) : ?>
                        <li class="list-group-item">
                            <img src="imgorderan/<?= $row["gambar"]; ?>" class="card-img-top">
                            <input type="hidden" name="gambar" value="<?= $row["gambar"]; ?>    ">
                        </li>
                        <li class="list-group-item">
                            <label for="nama">Nama Barang : </label><br>
                            <input type="text" name="nama" id="nama" value="<?= $row["namabarang"]; ?>" readonly autocomplete="off">
                        </li>
                        <li class="list-group-item">
                            <label for="harga">Harga Barang :</label><br>
                            <input type="number" name="harga" id="harga" value="<?= $row["hargabarang"]; ?>" readonly autocomplete="off">
                        </li>
                        <li class="list-group-item">
                            <label for="alamat">Masukan Alamat Anda :</label><br>
                            <input type="text" name="alamat" id="alamat" required>
                        </li>
                        <li class="list-group-item">
                            <label for="atasnama">Pesanan Atas Nama :</label><br>
                            <input type="text" name="atasnama" id="atasnama" required>
                        </li>
                        <li class="list-group-item">
                            <label for="whatsapp">Masukan Nomor Whatsapp Anda :</label><br>
                            <input type="number" name="whatsapp" id="whatsapp" required>
                        </li>
                        <li class="list-group-item">
                            <label for="jenisbayar">Jenis Pembayaran :</label><br>
                            <input type="radio" name="jenisbayar" id="dana" value="qrdana.jpeg">
                            <label for="dana">Dana</label><br>
                            <input type="radio" name="jenisbayar" id="cod" value="cod.png">
                            <label for="cod">Cash On Delivery</label>
                        </li>
                        <li class="list-group-item">
                            <label for="jumlah">Ingin Beli Berapa? :</label><br>
                            <input type="number" name="jumlah" id="jumlah" required>
                        </li>
                        <input type="text" name="status" id="status" value="BELUM DI CHECKOUT" hidden>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <ul>
                </ul>
                    <button type="submit" name="submit" class="btn btn-info"><b>Pesan Produk!</b></button>
                    <a href="index.php" style="text-decoration: none; color: red;">Batal</a>
                    <br>
                </div>
            </form>
            <br><br>
        </center>
        
    </div>

  </body>
</html>