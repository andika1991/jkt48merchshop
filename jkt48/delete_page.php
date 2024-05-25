<?php

include 'koneksi.php';


if(isset($_GET['id'])) {

    $id_artikel = mysqli_real_escape_string($conn, $_GET['id']);


    $query = "DELETE FROM artikel WHERE id_artikel = '$id_artikel'";
    

    if(mysqli_query($conn, $query)) {
   
        header("Location: page.php");
        exit(); 
    } else {

        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
   
    echo "ID Produk tidak ditemukan.";
}


mysqli_close($conn);
?>
