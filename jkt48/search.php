<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #search {
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    outline: none;
}

#search-results {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ddd;
    width: 500px;
    max-height: 300px;
    overflow-y: auto;
    z-index: 1000;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
    left: 500px; /* Menggeser elemen ke kiri */
}

.search-results-list {
    padding: 10px;
}

.search-result-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.result-title {
    font-size: 16px;
    font-weight: bold;
    margin-left: 10px;
}

.result-img {
    width: 50px;
    height: 50px;
    object-fit: cover;
}
    </style>
</head>

<body>
    
</body>
</html>

<?php
include 'koneksi.php';

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($conn, $_GET['q']);
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$q%'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='search-result-item'>";
            echo "<a href='detailproduk.php?id=" . $row['id_produk'] . "'>";
            echo "<img src='" . $row['foto_produk'] . "' alt='" . $row['nama_produk'] . "' class='result-img'>";
            echo "<h4 class='result-title'>" . $row['nama_produk'] . "</h4>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Tidak ada produk yang ditemukan.</p>";
    }
}
?>
