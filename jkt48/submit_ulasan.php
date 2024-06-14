<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['id_pengguna'])) {
    echo "User not logged in.";
    exit();
}

$id_pengguna = intval($_POST['id_pengguna']);

foreach ($_POST['id_produk'] as $id_produk) {
    $penilaian = $_POST['penilaian_' . $id_produk];
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar_' . $id_produk]);

    // Insert ulasan ke tabel penilaian
    $query = "INSERT INTO penilaian (penilaian, komentar, id_produk, id_pengguna) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssii", $penilaian, $komentar, $id_produk, $id_pengguna);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            echo "Error inserting review for product $id_produk: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

echo "<script>
        alert('Ulasan Berhasil Dikirim.');
        window.location.href = 'akun.php';
      </script>";
?>
exit();


mysqli_close($conn);
?>
