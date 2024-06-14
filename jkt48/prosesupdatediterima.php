<?php
include 'koneksi.php';

$id_pesanan = intval($_GET['id_pesanan']);

if ($id_pesanan > 0) {
    // Update status pesanan
    $query = "UPDATE pesanan SET status_pesanan = 'Diterima Pelanggan' WHERE id_pesanan = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_pesanan);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Ambil data dari data_checkout berdasarkan id_pesanan
            $query_checkout = "SELECT id_datacheckout FROM pesanan WHERE id_pesanan = ?";
            $stmt_checkout = mysqli_prepare($conn, $query_checkout);

            if ($stmt_checkout) {
                mysqli_stmt_bind_param($stmt_checkout, "i", $id_pesanan);
                mysqli_stmt_execute($stmt_checkout);
                mysqli_stmt_bind_result($stmt_checkout, $id_data_checkout);

                if (mysqli_stmt_fetch($stmt_checkout)) {
                    // Redirect ke suksesditerima.php dengan parameter id_data_checkout
                    header('Location: suksesditerima.php?id_data_checkout=' . $id_data_checkout);
                    exit();
                } else {
                    echo "Error: Data checkout not found.";
                }

                mysqli_stmt_close($stmt_checkout);
            } else {
                echo "Error preparing checkout statement: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid invoice ID.";
}

// Menutup koneksi
mysqli_close($conn);
?>
