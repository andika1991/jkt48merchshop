<?php
// Pastikan ada parameter ID keranjang yang diterima
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Sertakan file koneksi
    include 'koneksi.php';

    // Escape input ID keranjang untuk mencegah SQL injection
    $id_keranjang = mysqli_real_escape_string($conn, $_GET['id']);

    // Query untuk menghapus item dari keranjang
    $query = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "<script>
        alert('Item produk  berhasil dihapus!');
        window.location.href = 'keranjang.php?success=1';
      </script>";
      
    } else {
        echo "<script>
   
        window.location.href = 'keranjang.php?error=1';
      </script>";
    }
} else {
  
    header("Location: keranjang.php");
    exit;
}
?>
