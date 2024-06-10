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
      
   height:100vh;
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
    bottom: 20px; /* Jarak dari bawah */
    right: 20px; /* Jarak dari kanan */
    z-index: 999; /* Memastikan tombol di atas konten lain */
    padding: 10px 20px; /* Padding tombol */
    border-radius: 5px; /* Membuat sudut tombol lebih lembut */
    color: #fff; /* Warna teks */
    cursor: pointer; /* Ubah kursor saat diarahkan ke tombol */
    transition: background-color 0.3s, border-color 0.3s, transform 0.3s; /* Animasi saat dihover */
}

button:hover {
    background-color: #0056b3;
    border-color: #0056b3;
    transform: scale(1.05); /* Membuat tombol membesar sedikit saat dihover */
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
                <a href="#" class="nav-link active" aria-current="page">
                    <span class="icon">&#9881;</span>
                    <span class="text">Artikel</span>
                </a>
            </li>
        </ul>
    </div>

  <main>

  <?php

include 'koneksi.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $query = "SELECT * FROM artikel WHERE id_artikel = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

   
        $id_artikel = $row['id_artikel'];
        $judul = $row['judul'];
        $isi = $row['isi'];
        $gambar_artikel = $row['gambar_artikel'];
      
       
       
    } else {
     
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    
    echo "ID tidak ditemukan.";
    exit();
}
?>

<h2 style="margin-top:30px;margin-left:100px;">Edit Artikel</h2>
  <form method="POST" action="proseseditartikel.php" enctype="multipart/form-data" >
  <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>">
    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" >
    </div>
    
    <div class="form-group">
    <label for="gambar_artikel">Banner:</label>
    <input type="file" class="form-control" id="gambar_artikel" name="gambar_artikel" >
    
    <?php if(isset($logo) && !empty($logo)): ?>
 
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="isi">Isi:</label>
    <textarea class="form-control" id="isi" name="isi" rows="8"><?php echo $isi; ?></textarea>
</div>


     <button type="submit" class="btn btn-primary">Update</button>
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
