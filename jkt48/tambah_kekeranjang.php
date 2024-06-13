<?php
session_start();
include 'koneksi.php'; 


$id_produk = isset($_GET['id_produk']) ? intval($_GET['id_produk']) : 0;
$id_pengguna = $_SESSION['id_pengguna']; 


$query = "SELECT * FROM keranjang WHERE id_pengguna = $id_pengguna AND id_produk = $id_produk";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  
    $query = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_pengguna = $id_pengguna AND id_produk = $id_produk";
} else {
  
    $query = "INSERT INTO keranjang (id_pengguna, id_produk, jumlah) VALUES ($id_pengguna, $id_produk, 1)";
}

mysqli_query($conn, $query);
echo '<script>
    window.location.href = "detailproduk.php?id='.$id_produk.'";
    alert("Produk berhasil dimasukkan ke keranjang!");
</script>';

?>
