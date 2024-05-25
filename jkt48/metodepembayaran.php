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
    height: auto; /* Tinggi sidebar mengikuti tinggi dari elemen parent-nya */

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
     footer {
position:fixed;
    bottom: 0; 
    left: 0;
    width: 100%; 
    background-color: #E50112; 
   color:white;
    padding: 10px; 
    text-align: center; 
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
                <a href="manajemenpengguna.php" class="nav-link text-white">
                    <span class="icon">&#128101;</span>
                    <span class="text">Manajemen Pengguna</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link active">
                    <span class="icon">&#128202;</span>
                    <span class="text">Metode Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <span class="icon">&#9881;</span>
                    <span class="text">Page</span>
                </a>
            </li>
        </ul>
    </div>

  <main>

  <div class="tambahdata">
  <i class="bi bi-plus-circle"></i>
  <a href="tambahmetodepembayaran.php" class="btn">Tambah Data</a> </div>
  <div class="container mt-5">
        <h2 class="mb-4">Daftar Metode Pembayaran</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Logo</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';

                    $query = "SELECT * FROM metodepembayaran;";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["id_metodepembayaran"] . "</td>";
                            echo "<td>" . $row["nama_metodepembayaran"] . "</td>";
                            echo "<td><img src='" . $row["logo"] . "'  alt='Foto Produk' style='max-width: 100px; max-height: 100px; border-radius:4px;' ></td>";
                            echo "<td>" . $row["kategori_metode"] . "</td>";
                          
                            
                            echo "<td>
                            <a href='editmetodepembayaran.php?id_metodepembayaran=" . $row["id_metodepembayaran"] . "' class='btn btn-primary btn-sm btn-edit'>Edit</a>
                            <button class='btn btn-danger btn-sm btn-delete' onclick='confirmDelete(" . $row["id_metodepembayaran"] . ")'>Delete</button>
                             </td>";
                        
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>0 results</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>


    

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

<script>
    function confirmDelete(id_metodepembayaran) {
        if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
            // Redirect to delete action with product ID
            window.location.href = "delete_pembayaran.php?id_metodepembayaran=" + id_metodepembayaran;
        }
    }
</script>

</body>

</html>
