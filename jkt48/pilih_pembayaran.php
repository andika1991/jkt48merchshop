<?php
include 'session_user.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-BNL0l6+xgpwpgGUdO/0glj3e/Cv8yTpHPn4I72n9xZ4r7jvRkfltpBb1jQb+tzxf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+YoHbqv6a8z6P4mk8ze8kF0R1Bq8qG2St7Z9gH6" crossorigin="anonymous"></script>

    <title>JKT48MERCH - Official Store</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #E50112;
            color: white;
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .logo img {
            height: 73px;
            width: 177px;
            margin-left: 20px;
        }
        nav {
    display: inline-block;
    float: right;
    margin-right: 20px;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

nav ul li {
    position: relative;
    margin: -48px 18px;
}

nav ul li:hover ul {
    display: block;
}

nav ul ul li {
    margin: 10px 0;
}

nav ul ul ul {
    left: 100%;
    top: 0;
}

nav a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: #333;
}

nav a:hover {
    background-color: #f0f0f0;
    color: #007bff;
    border-radius: 5px;
}


/* Gaya untuk submenu */
.submenu {
    display: none;
    position: absolute;
    top: 30px; /* Mengatur posisi submenu relatif terhadap submenu kategori */
  
    margin-top: -10px; /* Menghindari celah antara submenu */
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000; /* Mengatur z-index agar submenu muncul di atas konten lain */
}

/* Menampilkan submenu saat kategori barang diklik */
.submenu.active {
    display: block;
}

/* Gaya untuk setiap item dalam submenu */
.submenu li {
    position: relative;
    margin: 0; /* Hapus margin bawaan */
}

.submenu li a {
    background-color: #FFFFFF;
    color: #111111;
    text-decoration: none;
    padding: 8px 16px; /* Menyesuaikan padding agar submenu lebih ramping */
    border-radius: 5px;
    transition: background-color 0.3s;
    display: block; /* Membuat setiap item dalam submenu menjadi blok */
}

.submenu li a:hover {
    background-color: #ddd;
}




        nav ul li a {
            background-color: #FFFFFF;
            color: #111111;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 12px;
            transition: background-color 0.3s;
        }
        nav ul li a:hover {
            background-color: #ddd;
        }
        main {
            flex: 1;
        }
        .footer-container {
    position: relative; 
    background-color: #111111;
    color: white;
    text-align: center;
    padding: 80px 0;
    width: 100%;
}
        footer p {
            margin: 5px 0;
        }
        footer a {
            color: #FFFFFF;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: none;
            color:blue;
        }
        .gambarfooter {
            display: flex;
            align-items: left;
            justify-content: left;
            gap: 20px;
            margin-top: -50px;
            margin-left: 20px;
        }
        .gambarfooter img {
            height: 50px; /* Adjust as needed */
        }
        .contact-info {
            text-align: left;
            margin-top: 20px;
            margin-left: 20px;
        }
        .partnerpembayaran{
    text-align: left;
    display: flex; 
    flex-direction: row; 
    flex-wrap: wrap;
    gap: 10px; 
    margin-left: 900px; /* Menempatkan elemen di sebelah kanan samping */
}


h5 {
    
    margin-top: -74px;
    margin-left:1000px;
    text-align:left;
}

.allrights {
    text-align: center;
}

.sosmed {
    position: absolute;
    bottom: 50px;
    left: 50%; 
    transform: translateX(-50%); 
    text-align: center;
    justify-content: center;
}


.sosmed ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

.sosmed ul li {
    
 
    margin-right: 10px; 
}

.sosmed ul li:last-child {
    margin-right: 0; 
}

.lanjutkan_pembayaran {
    display: inline-block; 
    padding: 5px 10px; 
    background-color: #007bff; 
    color: #fff; 
    text-decoration: none; 
    border: none; 
    border-radius: 3px; 
}

.Rectangle27 {
    width: 200px;
    height: auto; 
    padding: 10px; 
    background-color: #f0f0f0; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    margin-bottom: 10px; 
}

.Rectangle27 img {
    width: 50px; 
    height: auto; 
    margin-right: 10px; 
}

.ButtonContainer {
    margin-top: 10px; 
}

    </style>
</head>
<body>
    <header>
    <div class="logo">
    <a href="home.php">
        <img src="img/jkt48.jpg" alt="JKT48MERCH Logo">
       
    </a>
</div>
        <nav>
    <ul>
        <li><a href="#" class="kategori-trigger">Kategori Barang</a>
            <ul class="submenu">
                <li><a href="subkategori1.php">Pakaian</a></li>
                <li><a href="subkategori2.php">Musik</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
                <li><a href="subkategori1.php">Subkategori 1</a></li>
            </ul>
        </li>
        <li><a href="keranjang.php"><i class="bi bi-cart-dash"></i>Keranjang</a></li>
        <?php
    
        if (isset($_SESSION['username'])) {
            
            $username = $_SESSION['username'];
            echo "<li><a href='akun.php' class='login'><img src='img/Group.jpg' alt='User Icon'> $username</a></li>";
            
        } else {
            // Jika pengguna belum login, tampilkan opsi login dan daftar
            echo "<li><a href='login.php' class='login'><i class='fas fa-lock'></i> Login</a></li>";
            echo "<li><a href='daftar.php'>Daftar</a></li>";
        }
        ?>
    </ul>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var kategoriTrigger = document.querySelector('.kategori-trigger');
    var submenu = document.querySelector('.submenu');

    kategoriTrigger.addEventListener('click', function() {
        submenu.classList.toggle('active');
    });

    // Menyembunyikan submenu saat kategori barang tidak diklik
    document.addEventListener('click', function(event) {
        if (!kategoriTrigger.contains(event.target)) {
            submenu.classList.remove('active');
        }
    });
});

</script>


    </header>
    <main>
    
    <?php
// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah pengguna telah login
if (isset($_SESSION['id_pengguna'])) {
    // Ambil informasi yang diperlukan dari URL
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_datacheckout = isset($_GET['id_datacheckout']) ? $_GET['id_datacheckout'] : null;
    
    if ($id_datacheckout) {
        // Query untuk mendapatkan detail checkout dan data checkout berdasarkan ID data checkout
        $query_checkout = "SELECT detail_checkout.*, datacheckout.*
                           FROM detail_checkout
                           JOIN datacheckout ON detail_checkout.id_datacheckout = datacheckout.id_datacheckout
                           WHERE detail_checkout.id_datacheckout = $id_datacheckout";
        $result_checkout = mysqli_query($conn, $query_checkout);
        
        if ($result_checkout && mysqli_num_rows($result_checkout) > 0) {
            // Ambil harga dari hasil query
            $row_checkout = mysqli_fetch_assoc($result_checkout);
            $harga = $row_checkout['total_pembayaran'];

            // Query untuk mendapatkan kategori metode pembayaran yang unik
            $query_kategori = "SELECT DISTINCT kategori_metode FROM metodepembayaran";
            $result_kategori = mysqli_query($conn, $query_kategori);

            if ($result_kategori && mysqli_num_rows($result_kategori) > 0) {
                echo  "<div class='harga' style='position:absolute;padding:20px;margin-left:30px;margin-bottom:40px;'>";
                echo "<span style='color: #8E9A9D; font-size: 32px; font-family: Arial; font-weight: 400; line-height: 22px; word-wrap: break-word;'>IDR </span>";
echo "<span style='color: #DC3545; font-size: 32px; font-family: Arial; font-weight: 700; line-height: 22px; word-wrap: break-word;'>" . number_format($harga, 0, ',', '.') . "</span>";
echo '</div>';
                while($kategori_row = mysqli_fetch_assoc($result_kategori)) {
                    $kategori = $kategori_row['kategori_metode'];
                    echo "<p style='padding:10px; margin-top:80px;'> ($kategori):</p>";
                    // Query untuk mendapatkan metode pembayaran untuk kategori ini
                    $query_metode_pembayaran = "SELECT * FROM metodepembayaran WHERE kategori_metode='$kategori'";
                    $result_metode_pembayaran = mysqli_query($conn, $query_metode_pembayaran);
                    // Tampilkan metode pembayaran
                    while($row = mysqli_fetch_assoc($result_metode_pembayaran)) {
                        echo '<div class="Rectangle27">';
                        echo "<input type='radio' name='metode_pembayaran' value='" . $row['id_metodepembayaran'] . "' id='metode_".$row['id_metodepembayaran']."'>";
                        echo "<label for='metode_".$row['id_metodepembayaran']."'><img src='" . $row['logo'] . "' alt='" . $row['nama_metodepembayaran'] . "' style='width: 80px; height: auto;'> " . $row['nama_metodepembayaran'] . "</label>";
                        echo '<div class="ButtonContainer">';
                        echo '<a href="pembayaran.php?id_pengguna=' . $id_pengguna . '&id_datacheckout=' . $id_datacheckout . '&harga=' . $harga . '&id_metodepembayaran=' . $row['id_metodepembayaran'] . '" class="lanjutkan_pembayaran" id="link_' . $row['id_metodepembayaran'] . '">Pilih Pembayaran</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            } else {
                echo "Error: Tidak dapat mengambil kategori metode pembayaran.";
            }
        } else {
            echo "Error: Tidak dapat menemukan data checkout.";
        }
    } else {
        echo "Error: ID Data Checkout tidak valid.";
    }
} else {
    echo "Error: Pengguna belum login.";
}
?>



<script>
    document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Semua tautan lanjutkan_pembayaran disembunyikan
            document.querySelectorAll('.lanjutkan_pembayaran').forEach(function(link) {
                link.style.display = 'none';
            });
            // Tampilkan tautan lanjutkan_pembayaran yang sesuai
            var idMetode = this.value;
            document.getElementById('link_' + idMetode).style.display = 'block';
        });
    });
</script>





    
</main>
    <footer class="footer-container">
        <div class="gambarfooter">
            <img src="img/jkt482.svg" alt="JKT48 Image 1">
            <div style="width: 1px; height: 50px; background-color: white;"></div>
            <img src="img/jkt48ori.svg" alt="JKT48 Image 2">
        </div>
        <h5>Partner Pembayaran</h5>
        <div class="partnerpembayaran">
            
            <?php
                include 'koneksi.php';
                $query = "SELECT logo FROM metodepembayaran";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<img src="' . $row['logo'] . '" alt="Payment Partner Logo" style="width:50px;height:40px; border-radius:3px; ">';
                    }
                } else {
                    echo 'Error fetching logos: ' . mysqli_error($conn);
                }

                mysqli_close($conn);
            ?>
        </div>

        <div class="contact-info">
            <h2>Kontak Umum</h2>
            <p><a href="https://www.google.com/maps/place/Jalan+Sumantri+Brodjonegoro+Universitas+Lampung" target="_blank"><i class="bi bi-building"></i> Jalan Sumantri Brodjonegoro Universitas Lampung</a></p>
            <p><a href="mailto:jkt48merch@gmail.com"><i class="bi bi-envelope-at-fill"></i> jkt48merch@gmail.com</a></p>
            <p><a href="tel:+6208736635545"><i class="bi bi-telephone"></i> 08736635545</a></p>
        </div>
      
        <div class="allrights" >
        <p>&copy; 2024 JKT48MERCH. All rights reserved.</p>
        <p><a href="contact.php">Contact Us</a> | <a href="privacy.php">Privacy Policy</a></p></div>
        <div class="sosmed">
        <ul class="social-icon-one social-icon-colored">
    <li>
        <a href="https://www.youtube.com/@jktmerch" target="_blank">
            <span class="bi bi-youtube"></span>
        </a>
    </li>
    <li>
        <a href="https://www.facebook.com/jktmerch" target="_blank">
            <span class="bi bi-facebook"></span>
        </a>
    </li>
    <li>
        <a href="https://twitter.com/jktmerch" target="_blank">
            <span class="bi bi-twitter"></span>
        </a>
    </li>
    <li>
        <a href="https://www.instagram.com/jktmerch" target="_blank">
            <span class="bi bi-instagram"></span>
        </a>
    </li>
</ul>
</div>

    </footer>
</body>

</html>
