<?php

include 'koneksi.php';


if(isset($_GET['id_produk'])) {
 
    $id_produk = mysqli_real_escape_string($conn, $_GET['id_produk']);

   
    $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    
  
    if(mysqli_query($conn, $query)) {
       
        header("Location: manajemenproduk.php");
        exit(); 
    } else {
     
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
   
    echo "ID Produk tidak ditemukan.";
}


mysqli_close($conn);
?>
