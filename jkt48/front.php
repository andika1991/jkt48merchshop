<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
        nav ul li {
            margin: -48px 18px;
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



    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/jkt48.jpg" alt="JKT48MERCH Logo">
        </div>
        <nav>
    <ul>
        <li><a href="loginuser.php"><i class="fas fa-sign-in-alt"></i> LOGIN</a></li>
        <li><a href="daftar.php"><i class="fas fa-user-plus"></i> DAFTAR</a></li>
    </ul>
</nav>

    </header>
    <main>
    <section class="section1">
  
    <video autoplay muted loop>
            <source src="asset/vid.mp4" type="video/mp4">
           
        </video>
        <h1 style="font-size:80px; text-align:center; font-weight:bold; margin-top:30px;">Welcome To</h1>
        <h3 style="font-size:50px; text-align:center; font-weight:bold; margin-top:30px;">JKT48 OFFICIAL MERCHENDISE</h3>
        <a href="home.php" class="button"><i class="bi bi-shop"></i> Belanja Sekarang</a>

    </section>

    <section class="section2">
      <h2 style="text-align:center; margin-top:-40px; color:#FF4655;font-weight:bold;font-size:50px;">JKT48MERCH OFFICIAL STORE</h2>
      <p style="text-align:center; font-size:20px; padding:40px 20px;">JKT48MERCH Official Store adalah toko resmi yang menyediakan berbagai merchandise eksklusif dari grup idola JKT48.<br> Temukan berbagai koleksi seperti t-shirt, poster, album, aksesoris, dan banyak lagi.Semua produk di toko kami merupakan barang original yang didesain khusus  untuk para penggemar setia JKT48. Berbelanja di JKT48MERCH Official Store memastikan Anda mendapatkan barang berkualitas tinggi yang langsung dari sumber resmi. Dukung idola favorit Anda dengan merchandise terbaik hanya di JKT48MERCH Official Store!</p>
      
    </section>

    <section class="section3">
    <h2 style="text-align:center; margin-top:-50px; color:#ffffff;font-weight:bold;font-size:85px;">BELANJA BERAGAM 
MERCHENDISE JKT48</h2>
<img src="asset/mockup-merch.svg" style="margin-left:340px; margin-top:-20px;">
<p><span style="position:absolute;font-size:80px;margin-top:-680px;font-style:italic;font-weight:bold;color:black;">Sat</span> <span style="position:absolute;font-size:80px;margin-left:140px;margin-top:-680px;font-style:italic;font-weight:bold;color:#FFFFFF;">Set</span></p>
   <p style="position:absolute;font-size:70px;margin-top:-600px;font-style:italic;font-weight:bold;color:black;">Anti Ribet....!</p>
<p style="position:absolute;font-size:80px;margin-top:-530px;font-style:italic;font-weight:bold;color:#FFFFFF;">Belanja Bisa <br> dari mana aja....</p>
</section>

<section class="section4">
    <div class="kebanggaan">
<h1 style="font-size:60px; font-weight:bold; margin-left:30px; text-align:center;">
      Merchandise Asli <br> Kebanggaan Bersama
    </h1>
  
    </div>
  <div>
  
    <p style="position:absoluet; margin-top:150px;text-align:left; font-size:20px; margin-left:10px;">
      JKT48MERCH Official Store berkomitmen untuk menyediakan merchandise asli <br>dan eksklusif yang tidak hanya menjadi simbol dukungan Anda,<br> tetapi juga menjadi sumber kebanggaan bersama.<br> Dengan kualitas produk yang terjamin dan desain yang autentik,<br>kami memastikan setiap item yang Anda beli adalah representasi sejati dari kecintaan dan dukungan Anda terhadap JKT48. <br>Belanja di sini tidak hanya tentang memiliki barang-barang eksklusif, tetapi juga tentang menjadi bagian dari komunitas penggemar yang bangga dan setia.
    </p>
  </div>
  <img src="asset/image 3.svg">
</section>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
