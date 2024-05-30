<?php

session_start();


include 'koneksi.php';

if (isset($_SESSION['email'])) {
    
    $email_pengguna = $_SESSION['email'];

   
    $query = "SELECT id_pengguna, username FROM pengguna WHERE email = '$email_pengguna'";


    $result = mysqli_query($conn, $query);

 
    if ($result && mysqli_num_rows($result) > 0) {
       
        $row = mysqli_fetch_assoc($result);
        $id_pengguna = $row['id_pengguna'];
        $nama_pengguna = $row['username'];
        $_SESSION['id_pengguna'] = $id_pengguna;
        $_SESSION['nama_pengguna'] = $nama_pengguna;
    } else {
        
        $id_pengguna = 0; 
        $nama_pengguna = "Nama Pengguna";
    }
} else {
    
    $id_pengguna = 0; 
    $nama_pengguna = "Nama Pengguna";
}
?>
