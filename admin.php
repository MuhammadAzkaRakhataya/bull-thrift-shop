<?php 

$conn = mysqli_connect("localhost", "root", "", "bull_store");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $kotak = [];
    while ($box = mysqli_fetch_assoc($result)){
        $kotak[] = $box;
    }
    return $kotak;
}

function pesan($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $gambar = htmlspecialchars($data["gambar"]);
    $namabarang = htmlspecialchars($data["nama"]);
    $hargabarang = htmlspecialchars($data["harga"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $atasnama = htmlspecialchars($data["atasnama"]);
    $whatsapp = htmlspecialchars($data["whatsapp"]);
    $jenisbayar = htmlspecialchars($data["jenisbayar"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $totalharga = $hargabarang * $jumlah;
    $status = htmlspecialchars($data["status"]);

    // query insert data
    $query = "INSERT INTO orderan VALUES ('',
                '$gambar',
                '$namabarang',
                '$hargabarang',
                '$alamat',
                '$atasnama',
                '$whatsapp',
                '$jenisbayar',
                '$jumlah',
                '$totalharga',
                '$status'   )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $namabarang = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $hargabarang = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // upload gambar
    $gambar = upload();
    if( !$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO outfit VALUES ('',
                '$namabarang',
                '$kategori', 
                '$hargabarang',
                '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih Gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang Anda Upload bukan gambar!');
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('Ukuran Gambar terlalu besar!');
                document.location.href = 'tambah.php';
            </script>";
        return false;
    }

    // Lolos pengecekan, Gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM outfit WHERE id = $id");

    return mysqli_affected_rows($conn);

}
function hapusorder($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM orderan WHERE id = $id");

    return mysqli_affected_rows($conn);

}


function cari($keyword) {
    global $conn;
    
    $query = "SELECT * FROM orderan WHERE atasnama = '$keyword'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if( $keyword !== $row['atasnama']) {
        echo "<script>
            alert('Tidak ada pesanan atas nama tersebut!');
            document.location.href = 'bayar.php';
        </script>";
        return false;
    } else {
        return query($query);
    }

}
function ubah($data) {

    global $conn;

     // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $status = htmlspecialchars($data["status"]);
    
    // query update data
    mysqli_query($conn, "UPDATE orderan SET
                    status = '$status'
                WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function ubahproduk($data) {

    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $namabarang = htmlspecialchars($data["namabarang"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $hargabarang = htmlspecialchars($data["hargabarang"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    // query update data
    mysqli_query($conn, "UPDATE outfit SET
                    namabarang = '$namabarang',
                    kategori = '$kategori',
                    hargabarang = '$hargabarang',
                    gambar = '$gambar'
                    
                WHERE id = $id ");

    return mysqli_affected_rows($conn);
}


?>
