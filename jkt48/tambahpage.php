<?php
include 'session.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Halvetica', sans-serif;
        }
        .sidebar {
    background-color: #343a40;
    padding-top: 20px;
    transition: width 0.3s;
    width: 250px;
    height: auto; 

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

      

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border: 1px solid #ddd;
        }
        th {
            background-color: #343a40;
            color: white;
            text-align:center;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }
        .btn-edit, .btn-delete {
            margin-right: 5px;
        }

        .tambahdata {
    background-color: #007bff;
    color: white;
    width: 200px;
    padding: 2px 10px;
    border-radius: 5px;
    font-size: 25px;

    margin-top: 40px;
    margin-left: 30px;
    transition: background-color 0.3s, transform 0.3s; 
}

.tambahdata:hover {
    background-color: #0056b3; 
    transform: scale(1.02); 
}

        
        .tambahdata a{
            font-size:20px;
           color:white;
        }

.form-group {
    margin-bottom: 20px;
    margin-left:120px;
}

form {
    margin-top:100px;
    width:140%;
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
                <a href="#" class="nav-link text-white" aria-current="page">
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
                <a href="#" class="nav-link active">
                    <span class="icon">&#9881;</span>
                    <span class="text">Artikel</span>
                </a>
            </li>
        </ul>
    </div>

  <main>
<h2 style="padding:20px; margin-left:30px;margin-top:40px;">Tambah Artikel Baru</h2>
  <form method="POST" action="prosestambahpage.php"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="judul_artikel">Judul Artikel:</label>
        <input type="text" class="form-control" id="judul_artikel" name="judul_artikel" required>
    </div>

    
    <div class="form-group">
        <label for="isi">Isi:</label>
        <textarea class="form-control" id="isi" name="isi" rows="20" required></textarea>
    </div>
    
  
    <div class="form-group">
        <label for="banner">Banner:</label>
        <input type="file" class="form-control" id="banner" name="banner" required>
    </div>
  
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

    

  </main>
 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
