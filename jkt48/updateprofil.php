<?php
session_start();
include 'koneksi.php';

$id_pengguna = $_SESSION['id_pengguna'];
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

// Penanganan unggah foto profil
$uploadOk = 1;
$target_file = '';
$imageFileType = '';

if (!empty($_FILES["foto_profil"]["name"])) {
    $target_dir = "img/"; // Direktori tempat menyimpan foto profil
    $target_file = $target_dir . basename($_FILES["foto_profil"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file gambar valid
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto_profil"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["foto_profil"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["foto_profil"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["foto_profil"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }
    }
}

$query = "UPDATE pengguna SET username='$username', email='$email'";
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query .= ", password='$hashed_password'";
}
if (!empty($target_file) && $uploadOk == 1) {
    $query .= ", fotoprofil='$target_file'";
}
$query .= " WHERE id_pengguna=$id_pengguna";

if (mysqli_query($conn, $query)) {
    // Update session username
    $_SESSION['username'] = $username;

    // Redirect to profile page
    header("Location: akun.php");
    exit;
} else {
    echo "Terjadi kesalahan saat memperbarui profil: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
