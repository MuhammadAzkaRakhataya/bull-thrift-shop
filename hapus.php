<?php 

    require 'admin.php';

    $id = $_GET["id"];

    if( hapus($id) > 0 ) {
        echo "
                <script>
                    alert('Orderan Berhasil Dihapus');
                    document.location.href = 'haladmin.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Orderan Gagal Dihapus');
                    document.location.href = 'haladmin.php';
                </script>
            ";
    }

?>