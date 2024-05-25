<?php

include 'koneksi.php';


if(isset($_GET['id_metodepembayaran'])) {
 
    $id_metodepembayaran = mysqli_real_escape_string($conn, $_GET['id_metodepembayaran']);

   
    $query = "DELETE FROM metodepembayaran WHERE id_metodepembayaran = '$id_metodepembayaran'";
    

    if(mysqli_query($conn, $query)) {
        echo "<script>
        alert('Metode Pembayaran baru berhasil dihapus!');
        window.location.href = 'metodepembayaran.php';
      </script>";
    } else {
   
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
 
    echo "ID Produk tidak ditemukan.";
}


mysqli_close($conn);
?>
