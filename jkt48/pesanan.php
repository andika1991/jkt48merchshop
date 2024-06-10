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
                <a href="index.php" class="nav-link text-white">
                    <span class="icon">&#128202;</span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="pesanan.php" class="nav-link active" aria-current="page">
                    <span class="icon">&#128179;</span>
                    <span class="text">Kelola Pesanan</span>
                </a>
            </li>
            <li>
                <a href="manajemenproduk.php" class="nav-link text-white " >
                    <span class="icon">&#128722;</span>
                    <span class="text">Manajemen Products</span>
                </a>
            </li>
            <li>
                <a href="manajemenpengguna.php" class="nav-link text-white ">
                    <span class="icon">&#128101;</span>
                    <span class="text">Manajemen Pengguna</span>
                </a>
            </li>
            <li>
                <a href="metodepembayaran.php" class="nav-link text-white">
                    <span class="icon">&#128202;</span>
                    <span class="text">Metode Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="page.php" class="nav-link text-white">
                    <span class="icon">&#9881;</span>
                    <span class="text">Artikel</span>
                </a>
            </li>
        </ul>
    </div>


  <main>



  <div class="container mt-5">
        <h2 class="mb-4">Kelola Pesanan</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Invoice ID</th>
                        <th>Waktu Order </th>
                        <th>Bukti Bayar</th>
                        <th>Status Pesanan</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Order By</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';

                    $query = "SELECT pesanan.*, pengguna.username, metodepembayaran.nama_metodepembayaran FROM pesanan JOIN pengguna ON pesanan.id_pengguna = pengguna.id_pengguna JOIN metodepembayaran ON pesanan.id_metodepembayaran = metodepembayaran.id_metodepembayaran
                             ORDER BY pesanan.id_pesanan DESC;";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["invoice_id"] . "</td>";
                            echo "<td>" . $row["timeorder"] . "</td>";
                
                            if (!empty($row["bukti_bayar"])) {
                               
                                echo "<td><a href='" . $row["bukti_bayar"] . "' target='_blank'>Lihat Bukti Bayar</a></td>";
                            } else {
                              
                                echo "<td><button onclick='showAlert()'>Belum mengirimkan bukti</button></td>";
                            }
                            echo "<td>";
                    echo "<select id='status_pesanan" . $row["id_pesanan"] . "' onchange='updateStatus(" . $row["id_pesanan"] . ")'>";
                    echo "<option value='Menunggu Pembayaran'" . ($row["status_pesanan"] == "Menunggu Pembayaran" ? " selected" : "") . ">Menunggu Pembayaran</option>";
                    echo "<option value='Diproses'" . ($row["status_pesanan"] == "Diproses" ? " selected" : "") . ">Diproses</option>";
                    echo "<option value='Dikirim'" . ($row["status_pesanan"] == "Dikirim" ? " selected" : "") . ">Dikirim</option>";
                    echo "<option value='Diterima Pelanggan'" . ($row["status_pesanan"] == "Diterima Pelanggan" ? " selected" : "") . ">Diterima Pelanggan</option>";
                    echo "<option value='Cenceled'" . ($row["status_pesanan"] == "Cenceled" ? " selected" : "") . ">Cenceled</option>";
                    echo "</select>";
                    echo "</td>";
                            echo "<td>" . $row["total_harga"] . "</td>";
                            echo "<td>" . $row["nama_metodepembayaran"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                        
                          
                            
                            echo "<td>
                            <a href='detailpesanan.php?id=" . $row["id_pesanan"] . "' class='btn btn-primary btn-sm btn-edit'>Detail</a>
                           
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

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function updateStatus(id_pesanan) {
        var status_pesanan = $("#status_pesanan" + id_pesanan).val(); 

        var confirmation = confirm("Apakah Anda yakin ingin mengupdate status pesanan menjadi '" + status_pesanan + "'?");

        if (confirmation) {
           
            var formData = new FormData();
            formData.append('id_pesanan', id_pesanan);
            formData.append('status_pesanan', status_pesanan);

         
            fetch('update_status_pesanan.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Ada kesalahan saat memperbarui status pembayaran.');
                    }
                   
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                 
                });
        } else {
            var previousValue = $("#status_pesanan" + id_pesanan).data("previous-value"); 
            $("#status_pesanan" + id_pesanan).val(previousValue); 
        }
    }
</script>

    

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
    function confirmDelete(id_pengguna) {
        if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
            // Redirect to delete action with product ID
            window.location.href = "delete_pengguna.php?id_pengguna=" + id_pengguna;
        }
    }
</script>

</body>

</html>
