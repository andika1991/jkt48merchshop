<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id_artikel = $_POST['id_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];


    if (isset($_FILES['gambar_artikel']) && $_FILES['gambar_artikel']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["gambar_artikel"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

       
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

      
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $target_file = ""; // Set a default value if the file upload fails
        } else {
            if (move_uploaded_file($_FILES["gambar_artikel"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["gambar_artikel"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                $target_file = ""; // Set a default value if the file upload fails
            }
        }
    } else {
        // No new file uploaded, keep the old file
        $query = "SELECT gambar_artikel FROM artikel WHERE id_artikel = $id_artikel";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $target_file = $row['gambar_artikel'];
        } else {
            $target_file = ""; // Set a default value if the file retrieval fails
        }
    }

    // Update data artikel di database
    $sql = "UPDATE artikel SET judul = '$judul', isi = '$isi', gambar_artikel = '$target_file' WHERE id_artikel = $id_artikel";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Artikel berhasil diperbarui!');
        window.location.href = 'page.php';
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>
