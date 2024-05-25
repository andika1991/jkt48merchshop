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
    overflow-y: auto;
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
// Include your database connection file
include 'koneksi.php';

// Check if ID is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data based on ID
    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Assign fetched data to variables
        $id_pengguna = $row['id_pengguna'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password']; // You might want to remove or handle password securely
    } else {
        // Handle if no data found
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    // Handle if ID is not set
    echo "ID tidak ditemukan.";
    exit();
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form values to variables
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Check if password is provided, if not, keep the existing password
    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
    }

    // Update the data in the database
    $query = "UPDATE pengguna SET username='$username', email='$email', password='$password' WHERE id_pengguna=$id_pengguna";
    $update_result = mysqli_query($conn, $query);

    if($update_result) {
        echo "<script>
       
        window.location.href = 'manajemenpengguna.php';
        </script>";
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<form method="POST" action="">
    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <!-- Password input - You might want to handle this differently for security reasons -->
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>

</main>

<!-- Bootstrap JS and dependencies -->
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
