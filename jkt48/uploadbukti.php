<?php
// Pastikan tombol submit telah ditekan
if (isset($_POST['submit'])) {
    // Tentukan direktori tempat menyimpan file bukti pembayaran
    $targetDirectory = "img/";

    // Buat nama file unik untuk bukti pembayaran
    $fileName = uniqid('bukti_pembayaran_') . "_" . basename($_FILES["bukti_pembayaran"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Periksa apakah file adalah gambar
    $allowTypes = array('jpg','png','jpeg','gif');
    if (in_array($fileType, $allowTypes)) {
        // Pindahkan file ke direktori yang ditentukan
        if (move_uploaded_file($_FILES ["bukti_pembayaran"]["tmp_name"], $targetFilePath)) {
         

      
            $invoice_id = $_POST['invoice_id'];
            $id_datacheckout = $_POST['id_datacheckout'];
     
            include 'koneksi.php'; 
            $query_update_pesanan = "UPDATE pesanan SET bukti_bayar='img/$fileName' WHERE invoice_id='$invoice_id'";
            if (mysqli_query($conn, $query_update_pesanan)) {
                echo "<script>
                window.location.href = 'tunggu.php?invoice_id=" . $invoice_id . "&id_datacheckout=" . $id_datacheckout . "';
            </script>";
            
            } else {
                echo "Error: " . $query_update_pesanan . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat meng-upload file.";
        }
    } else {
        echo "Maaf, hanya file gambar yang diizinkan untuk di-upload.";
    }
}
?>
