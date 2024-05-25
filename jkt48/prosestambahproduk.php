<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $kategori_produk = $_POST['kategori_produk'];
    $promo = $_POST['promo'];
    $harga_normal = $_POST['harga_normal'];
    $harga_promo = $_POST['harga_promo'];

  
    if (isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

   
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

      
        if ($_FILES["foto_produk"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

     
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

       
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
      
        } else {
            if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
               
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
        $target_file = ""; 
    }

    
    $sql = "INSERT INTO produk (nama_produk, foto_produk, deskripsi_produk, kategori_produk, promo, harga_normal, harga_promo)
            VALUES ('$nama_produk', '$target_file', '$deskripsi_produk', '$kategori_produk', '$promo', '$harga_normal', '$harga_promo')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Produk baru berhasil ditambahkan!');
        window.location.href = 'manajemenproduk.php';
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

 
    mysqli_close($conn);
}
?>
