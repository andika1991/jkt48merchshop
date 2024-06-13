<?php
include 'koneksi.php';


$id_pesanan = intval($_GET['id_pesanan']);

if ($id_pesanan > 0) {

    $query = "UPDATE pesanan SET status_pesanan = 'Diterima Pelanggan' WHERE id_pesanan = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
 
        mysqli_stmt_bind_param($stmt, "i", $id_pesanan);
        $result = mysqli_stmt_execute($stmt);

        
        if ($result) {
       
            header('Location: suksesditerima.php');
            exit();
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
