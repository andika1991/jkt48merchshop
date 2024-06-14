<?php

include 'koneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $kategori_produk = $_POST['kategori_produk'];
    $promo = $_POST['promo'];
    $harga_normal = $_POST['harga_normal'];
    $harga_promo = $_POST['harga_promo'];
    $status_produk =$_POST['status_produk'];
 
    $file_name = '';

   
    if(isset($_FILES['foto_produk']) && $_FILES['foto_produk']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['foto_produk']['name'];
        $file_tmp = $_FILES['foto_produk']['tmp_name'];
        $file_destination = "img/" . $file_name;

      
        if (move_uploaded_file($file_tmp, $file_destination)) {
    
        } else {
         
            echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
            exit; 
        }
    }

  
    $query = "UPDATE produk 
              SET nama_produk='$nama_produk', deskripsi_produk='$deskripsi_produk', kategori_produk='$kategori_produk', 
                  promo='$promo', harga_normal='$harga_normal', harga_promo='$harga_promo',status_produk='$status_produk'";

    
    if ($file_name !== '') {
        $query .= ", foto_produk='$file_destination'";
    }

    
    $query .= " WHERE id_produk='$id_produk'";
    
  
    if(mysqli_query($conn, $query)) {
        echo "<script>
        alert('Produk berhasil diperbarui!');
        window.location.href = 'manajemenproduk.php';
        </script>";
    } else {
      
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
   
    mysqli_close($conn);
}
?>

