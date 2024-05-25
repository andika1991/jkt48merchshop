<?php
include 'session.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Template</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Halvetica', sans-serif;
        }
    .sidebar {
      
   height:auto;
    background-color: #343a40;
    padding-top: 20px;
    transition: width 0.3s;
    width: 250px;
    overflow-y: auto; /* Menambahkan ini agar sidebar bisa digulir secara vertikal */
}

        .sidebar a {
            color: white;
            padding: 10px;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin: 5px 0; 
        }
        .sidebar a .icon {
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar-collapsed {
            width: 90px;
        }
        .sidebar-collapsed a .text {
            display: none;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .content-collapsed {
            margin-left: 90px; 
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .hamburger {
            font-size: 24px;
            cursor: pointer;
            color: white;
            margin-left: auto;
        }

        .tab {
            padding:100px;
            margin-bottom:30px;
        }


 /* Styling for form elements */
.form-group {
    margin-bottom: 20px;
    margin-left:120px;
}

form {
    margin-top:100px;
    width:200%;
}

label {
    font-weight: bold;
}

button {
    background-color: #007bff;
    border-color: #007bff;
    position: fixed;
    bottom: 20px; 
    right: 20px; 
    z-index: 999; 
    padding: 10px 20px; 
    border-radius: 5px; 
    color: #fff; 
    cursor: pointer; 
    transition: background-color 0.3s, border-color 0.3s, transform 0.3s; 
}

button:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    transform: scale(1.05); 
}

   




    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar flex-shrink-0 p-3 bg-dark" id="sidebar">
        <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Admin Panel</span>
            <span class="hamburger" id="sidebarToggle">&#9776;</span>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#128202;</span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#128179;</span>
                    <span class="text">Kelola Pesanan</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white" >
                    <span class="icon">&#128722;</span>
                    <span class="text">Manajemen Products</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#128101;</span>
                    <span class="text">Manajemen Pengguna</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#128202;</span>
                    <span class="text">Metode Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#9881;</span>
                    <span class="text">Kode diskon</span>
                </a>
            </li>
        </ul>
    </div>

  <main>

  <?php

include 'koneksi.php';

//
if(isset($_GET['id_metodepembayaran'])) {
    $id = $_GET['id_metodepembayaran'];

    
    $query = "SELECT * FROM metodepembayaran WHERE id_metodepembayaran = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

       
        $id_metodepembayaran = $row['id_metodepembayaran'];
        $nama_metodepembayaran = $row['nama_metodepembayaran'];
        $nomor_metode = $row['nomor_metode'];
        $kategori_metode = $row['kategori_metode'];
        $petunjuk_pembayaran = $row['petunjuk_pembayaran'];
        $logo = $row['logo'];
       
       
    } else {
       
        echo "Data tidak ditemukan.";
        exit();
    }
} else {

    echo "ID tidak ditemukan.";
    exit();
}
?>
  <form method="POST" action="proseseditpembayaran.php" enctype="multipart/form-data" >
  <input type="hidden" name="id_metodepembayaran" value="<?php echo $id_metodepembayaran; ?>">
    <div class="form-group">
        <label for="nama_metodepembayaran">Nama Produk:</label>
        <input type="text" class="form-control" id="nama_metodepembayaran" name="nama_metodepembayaran" value="<?php echo $nama_metodepembayaran; ?>" >
    </div>
    <div class="form-group">
        <label for="nomor_metode">Nomor Metode:</label>
        <input type="text" class="form-nomor_metode" id="nomor_metode" name="nomor_metode"  value="<?php echo $nomor_metode; ?>">
    </div>
    <div class="form-group">
    <label for="logo">Foto Produk:</label>
    <input type="file" class="form-control" id="logo" name="logo" >
    
    <?php if(isset($logo) && !empty($logo)): ?>
 
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="petunjuk_pembayaran">Petunjuk Pembayaran:</label>
    <textarea class="form-control" id="petunjuk_pembayaran" name="petunjuk_pembayaran" rows="8"><?php echo $petunjuk_pembayaran; ?></textarea>
</div>

    <div class="form-group">
        <label for="kategori_metode">Kategori :</label>
        <select class="form-control" id="kategori_metode" name="kategori_metode">
            <option value="">Pilih Kategori</option>
            <option value="E-Wallet"<?php echo ($kategori_metode == "E-Wallet") ? "selected" : ""; ?>>E-Wallet</option>
            <option value="Bank"<?php echo ($kategori_metode == "Bank") ? "selected" : ""; ?>>Bank</option>
        </select>
    </div>
 
  
 
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

  </main>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        sidebar.classList.toggle('sidebar-collapsed');
        content.classList.toggle('content-collapsed');
    });
</script>
</body>
</html>
