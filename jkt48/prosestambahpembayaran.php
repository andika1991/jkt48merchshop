<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama_metode = $_POST['nama_metode'];
    $nomor_metode = $_POST['nomor_metode'];
    $petunjuk_pembayaran = $_POST['petunjuk_pembayaran'];
    $kategori_metode = $_POST['kategori_metode'];



   
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["logo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        
        $check = getimagesize($_FILES["logo"]["tmp_name"]);
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

      
    
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

     
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
      
        } else {
            if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
               
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
        $target_file = ""; 
    }

 
    $sql = "INSERT INTO metodepembayaran (nama_metodepembayaran, nomor_metode, petunjuk_pembayaran, kategori_metode, logo)
            VALUES ('$nama_metode', '$nomor_metode', '$petunjuk_pembayaran', '$kategori_metode', '$target_file')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Metode Pembayaran baru berhasil ditambahkan!');
        window.location.href = 'metodepembayaran.php';
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);
}
?>
