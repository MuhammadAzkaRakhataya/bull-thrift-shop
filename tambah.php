<?php 

    require("admin.php");

    if( isset($_POST["submit"])) {

    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script";
        echo "<br>";
        echo mysqli_error($conn);
    }

    
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Siswa</title>
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
            margin-top: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 5px 7px 10px gray;
            width: 18rem;
        }
        .card-title{
            font-weight: 700;
            background: -webkit-linear-gradient(left, #00FFAB, #14C38E);
            color: #fff;
            width: 287px;
            height: 70px;
            margin-top: -16px;
            margin-left: -16px;
            border-radius: 10px 10px 0px 0px;
            text-align: center;
            padding: 20px;
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
            margin-left: 92px;
            margin-top: -10px;
            margin-bottom: 30px;
            background: -webkit-linear-gradient(left, #00FFAB, #14C38E);
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
            input[type="radio"]{
                display: flex;
                flex-direction: row;
            }
            input[type]{
                font-size: 15px;
                width: 150px;
            }
            .btn{
                margin-left: 4.5rem;
                width: 100px;
                height: 40px;
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
                    <h4 class="card-title">Input Produk Baru</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="nama">Nama Barang : </label><br>
                            <input type="text" name="nama" id="nama" required autocomplete="off">
                        </li>
                        <li class="list-group-item">
                            <label for="kategori">Kategori :</label><br>
                            <input type="radio" name="kategori" id="baju" value="baju">
                            <label for="baju">Baju</label><br>
                            <input type="radio" name="kategori" id="jacket" value="jacket">
                            <label for="jacket">Jacket</label><br>
                            <input type="radio" name="kategori" id="celana" value="celana">
                            <label for="celana">Celana</label>
                        </li>
                        <li class="list-group-item">
                            <label for="harga">Harga Barang :</label><br>
                            <input type="number" name="harga" id="harga" placeholder="isi dengan angka saja!" required>
                        </li>
                        <li class="list-group-item">
                            <label for="gambar">Gambar Produk :</label><br>
                            <input type="file" name="gambar" id="gambar" required>
                        </li>   
                    </ul>
                </div>
                <ul>
                </ul>
                    <button type="submit" name="submit" class="btn btn-info"><b>Tambah</b></button>
                    <a href="haladmin.php" style="text-decoration: none; color: red;">Batal</a>
                    <br>
                </div>
            </form>
        </center>
        
    </div>

  </body>
</html>