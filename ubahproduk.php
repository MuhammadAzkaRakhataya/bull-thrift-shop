<?php

    require 'admin.php';

    // ambil data dari URL
    $id = $_GET['id'];

    // ambil data mahasiswa berdasarkan id
    $order = query("SELECT * FROM outfit WHERE id = '$id'")[0];

     // cek apakah tombol submit sudah ditekan atau belum
     if (isset($_POST["submit"])) {
        // cek apakah data berhasil diubah atau tidak
        if ( ubahproduk($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'orderan.php';
                </script>
            ";
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
            background-image: url(bg.png);
        }
        .container-fluid{
            margin-top: -10px;
            height: 70px;
            box-shadow: 5px 0px 30px gray;
        }
        .table {
        box-shadow: 5px 5px 10px gray;
        }

        .table th {
        background-color: gold;
        }
        
        a{
            text-decoration: none;
        }

        .card{
            box-shadow: 5px 5px 15px gray;
        }
        .stripped{
            width: 100px;
            height: 5px;
            background-color: gold;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <table class="table table-striped-columns" border="1" cellpadding="10" cellspacing="0">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga Barang</th>
                </tr>
                <tr>
                <input type="hidden" name="id" value="<?= $order["id"]; ?>">
                    <td><?= $order["id"]; ?></td>
                    <td><input type="hidden" name="gambarlama" value="<?= $order["gambar"]; ?>"><img src="imgorderan/<?= $order["gambar"]; ?>" width="100px" alt=""><input type="file" name="gambar" id="gambar"></td>
                    <td><input type="text" name="nama" id="namabarang" required value="<?= $order["namabarang"]; ?>"></td>
                    <td><input type="radio" name="kategori" id="baju" value="baju">
                        <label for="baju">Baju</label><br>
                        <input type="radio" name="kategori" id="jacket" value="jacket">
                        <label for="jacket">Jacket</label><br>
                        <input type="radio" name="kategori" id="celana" value="celana">
                        <label for="celana">Celana</label>
                    </td>
                    <td><input type="number" name="hargabarang" id="hargabarang" required value="<?= $order["hargabarang"]; ?>"></td>
                </tr>
            </table>
            <center>
                <button class="btn btn-warning" type="submit" name="submit">Ubah Data</button>
                <br><br>
                <a href="haladmin.php" style="color: red; ">
                    Batal
                </a><br><br><br>
            </center>
        </form>
        </div>
    <br>
    
</body>
</html>
