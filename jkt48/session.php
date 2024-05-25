<?php

session_start();


include 'koneksi.php';

if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

    $query = "SELECT id_admin, email FROM admin WHERE email = '$email'";


    $result = mysqli_query($conn, $query);


    if ($result && mysqli_num_rows($result) > 0) {
   
        $row = mysqli_fetch_assoc($result);
        $id_admin = $row['id_admin'];
        $email = $row['email'];

        $_SESSION['id_admin'] = $id_admin;
        $_SESSION['email'] = $email;
    } else {
      
    }
} else {
    echo "<script>
        
window.location.href = 'login.html';
  </script>";
}
?>