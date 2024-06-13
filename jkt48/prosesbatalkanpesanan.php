<?php
include 'koneksi.php';


$invoice_id = intval($_GET['invoice_id']);

if ($invoice_id > 0) {

    $query = "UPDATE pesanan SET status_pesanan = 'Cancelled' WHERE id_pesanan = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
 
        mysqli_stmt_bind_param($stmt, "i", $invoice_id);
        $result = mysqli_stmt_execute($stmt);

        
        if ($result) {
       
            header('Location: suksesdibatalkan.php');
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
