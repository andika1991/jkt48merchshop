<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_metodepembayaran = $_POST['id_metodepembayaran'];
    $nama_metodepembayaran = $_POST['nama_metodepembayaran'];
    $nomor_metode = $_POST['nomor_metode'];
   
    $petunjuk_pembayaran = $_POST['petunjuk_pembayaran'];
    $kategori_metode = $_POST['kategori_metode'];
    
   
    $file_name = '';

 
    if(isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['logo']['name'];
        $file_tmp = $_FILES['logo']['tmp_name'];
        $file_destination = "img/" . $file_name;

      
        if (move_uploaded_file($file_tmp, $file_destination)) {
        } else {
     
            echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
            exit; 
        }
    }

   
    $query = "UPDATE metodepembayaran 
              SET nama_metodepembayaran='$nama_metodepembayaran', nomor_metode='$nomor_metode', kategori_metode='$kategori_metode', 
                  petunjuk_pembayaran='$petunjuk_pembayaran'";

    if ($file_name !== '') {
        $query .= ", logo='$file_destination'";
    }

    
    $query .= " WHERE id_metodepembayaran='$id_metodepembayaran'";
    
 
    if(mysqli_query($conn, $query)) {
        echo "<script>
        alert('Produk berhasil diperbarui!');
        window.location.href = 'metodepembayaran.php';
        </script>";
    } else {
 
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>