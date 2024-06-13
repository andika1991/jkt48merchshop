<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

 
    $query = "SELECT * FROM pengguna WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
       
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $row['username'];
           
            echo "<script>
                  
                    window.location.href = 'home.php';
                  </script>";
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
            echo "<script>window.location.href = 'loginuser.php'; </script>";
        }
    } else {
        echo "<script>alert('User Tidak Ditemukan');</script>";
        echo "<script>window.location.href = 'loginuser.php'; </script>";
    }


    mysqli_free_result($result);
}


mysqli_close($conn);
?>
