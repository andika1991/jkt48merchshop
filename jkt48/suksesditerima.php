<?php
session_start();
include 'koneksi.php';

// Pastikan id_pengguna ada di session
if (!isset($_SESSION['id_pengguna'])) {
    echo "User not logged in.";
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

// Ambil id_data_checkout dari URL
$id_data_checkout = intval($_GET['id_data_checkout']);

if ($id_data_checkout > 0) {
    // Ambil id_produk dan nama_produk dari detail_checkout berdasarkan id_data_checkout
    $query = "SELECT p.id_produk, p.nama_produk 
              FROM detail_checkout dc 
              JOIN produk p ON dc.id_produk = p.id_produk 
              WHERE dc.id_datacheckout = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_data_checkout);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id_produk, $nama_produk);

        $produk_list = [];
        while (mysqli_stmt_fetch($stmt)) {
            $produk_list[] = ['id_produk' => $id_produk, 'nama_produk' => $nama_produk];
        }

        mysqli_stmt_close($stmt);

        if (count($produk_list) > 0) {
            echo "<h4>Form Ulasan Produk</h4>";
            echo "<form action='submit_ulasan.php' method='post'>";

            foreach ($produk_list as $produk) {
                $id_produk = $produk['id_produk'];
                $nama_produk = $produk['nama_produk'];

                echo "<div class='form-group'>";
                echo "<label for='penilaian_$id_produk'>Penilaian untuk $nama_produk:</label>";
                echo "<select name='penilaian_$id_produk' required>";
                echo "<option value=''>Pilih Penilaian</option>";
                echo "<option value='Sangat Baik'>Sangat Baik</option>";
                echo "<option value='Baik'>Baik</option>";
                echo "<option value='Cukup'>Cukup</option>";
                echo "<option value='Kurang'>Kurang</option>";
                echo "<option value='Sangat Kurang'>Sangat Kurang</option>";
                echo "</select>";
                echo "<label for='komentar_$id_produk'>Komentar:</label>";
                echo "<textarea name='komentar_$id_produk' rows='4' required></textarea>";
                echo "<input type='hidden' name='id_produk[]' value='$id_produk'>";
                echo "</div>";
            }

            echo "<input type='hidden' name='id_pengguna' value='$id_pengguna'>";
            echo "<button type='submit'>Submit Ulasan</button>";
            echo "</form>";
        } else {
            echo "No products found for this checkout.";
        }
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid checkout ID.";
}

// Menutup koneksi
mysqli_close($conn);
?>
