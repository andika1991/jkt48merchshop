<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $judul_artikel = $_POST['judul_artikel'];
    $isi = $_POST['isi'];

   
    if (isset($_FILES['banner']) && $_FILES['banner']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["banner"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

       
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        

       
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $target_file = ""; 
        } else {
            if (move_uploaded_file($_FILES["banner"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["banner"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $target_file = ""; 
            }
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
        $target_file = ""; 
    }

    
    $sql = "INSERT INTO artikel (judul, isi, gambar_artikel) VALUES ('$judul_artikel', '$isi', '$target_file')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Artikel baru berhasil ditambahkan!');
        window.location.href = 'page.php';
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  
    mysqli_close($conn);
}
?>
