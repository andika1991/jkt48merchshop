<?php

include 'koneksi.php';


$id_pesanan = $_POST['id_pesanan'];
$status_pesanan = $_POST['status_pesanan'];


$query = "UPDATE pesanan SET status_pesanan = '$status_pesanan' WHERE id_pesanan = $id_pesanan";
$result = mysqli_query($conn, $query);


if ($result) {
    echo "Status pembayaran berhasil diperbarui.";
} else {
    echo "Gagal memperbarui status pembayaran: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
