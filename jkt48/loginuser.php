<?php
session_start();


if (isset($_SESSION['email'])) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
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
.section1 {
    position: relative;
    width: 100%;
    height: 100vh; 
    overflow: hidden;
}

.section1 video {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 20%;
    z-index: -1;
    object-fit: cover;
}

.button {
    display: inline-block;
    padding: 10px 20px;
    font-size:30px;
    border-radius: 5px;
    text-decoration: none;
    background: linear-gradient(90deg, #0085FF 0%, #0047AB 100%); 
    color: white;
    position: absolute;
    overflow: hidden;
    margin-top:80px;
    margin-left: 500px; 
}


.button::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.6) 50%, rgba(255,255,255,0) 100%);
    transition: left 0.3s;
}

.button:hover::after {
    left: 100%;
}

.button:hover {
    background-position: right center;
    color: #E50112; 
    transition: background-position 0.3s;
}

.section2 {
    margin-bottom:70px;
}

.section3 {
    background-color:#FF4655;
    padding:0px 20px;
}


.section4 {

    display: flex;
  
}

.section4 img {
    
  margin-left: 20px;
}

.kebanggaan{
    position:absolute;
    margin-top:-17px;
}

.section5{
    background-color:#FF4655 
}

.card {
    width: 18rem;
    border: 1px solid #ccc;
    margin-left:10px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #555;
    margin-bottom: 10px;
}

.btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}



body {
    background: linear-gradient(135deg, #FFD700, #FF6347);
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.login-container {
    position: absolute;
    top: 60%;
    right: 7%;
    transform: translateY(-50%);
    max-width: 600px; /* Ensure the container is wide */
    width: 100%; /* Ensure it takes the full width available */
    padding: 100px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease;
}


.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}


.form-label {
    color: #555;
    font-size: 16px;
}

.form-control {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}


.btn-primary {
    display: block;
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #FF6347;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #FF4500;
}

main {
    padding-bottom: 530px;
}




    </style>
</head>
<body>
<header>
        <div class="logo">
            <img src="img/jkt48.jpg" alt="JKT48MERCH Logo">
        </div>
        <nav>

    <ul>

    <li>
    <input type="text" id="search" placeholder="Cari produk...">
                </li>
                
        <div id="search-results" class="search-results"></div>
    

        <li><a href="#" class="kategori-trigger">Kategori Barang</a>
        <ul class="submenu">
    <li><a href="Pakaian.php"><i class="fas fa-tshirt"></i> Pakaian</a></li>
    <li><a href="Aksesoris.php"><i class="fas fa-ring"></i> Aksesoris</a></li>
    <li><a href="koleksi.php"><i class="fas fa-gem"></i> Koleksi</a></li>
    <li><a href="elektronik.php"><i class="fas fa-laptop"></i> Elektronik</a></li>
    <li><a href="pernakpernik.php"><i class="fas fa-shopping-basket"></i> Pernak-Pernik</a></li>
    <li><a href="rumahtangga.php"><i class="fas fa-home"></i> Rumah Tangga</a></li>
    <li><a href="musik.php"><i class="fas fa-music"></i> Musik</a></li>
    <li><a href="Perlengkapansekolah.php"><i class="fas fa-school"></i> Perlengkapan Sekolah</a></li>
    <li><a href="lainnya.php"><i class="fas fa-ellipsis-h"></i> Lainnya</a></li>
</ul>

        </li>
        <li><a href="keranjang.php"><i class="bi bi-cart-dash"></i>Keranjang</a></li>
        <?php
    
        if (isset($_SESSION['username'])) {
          
            $username = $_SESSION['username'];
            echo "<li><a href='akun.php' class='login'><img src='img/Group.jpg' alt='User Icon'> $username</a></li>";
           
        } else {
          
            echo "<li><a href='loginuser.php' class='login'><i class='fas fa-sign-in-alt'></i>  Login</a></li>";
            echo "<li><a href='daftar.php'><i class='fas fa-user-plus'></i>Daftar</a></li>";
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
        <div class="imgjkt">
        <img src="asset/jkt48.jpeg" style="width:600px;height:530px;position:absolute; margin-top:0px;"></div>
    <div class="login-container">
        <h2>Login</h2>
        <form action="prosesuserlogin.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-BNL0l6+xgpwpgGUdO/0glj3e/Cv8yTpHPn4I72n9xZ4r7jvRkfltpBb1jQb+tzxf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: 'search.php',
                    method: 'GET',
                    data: { q: query },
                    success: function(data) {
                        $('#search-results').html(data).show();
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        $(document).click(function(event) {
            if (!$(event.target).closest('#search, #search-results').length) {
                $('#search-results').hide();
            }
        });
    });
</script>
</html>
