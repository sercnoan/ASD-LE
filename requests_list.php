<?php include 'shjpdb.php'; $status = $_GET['status'] ?? 'All'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sacred Heart of Jesus Parish - <?= $status ?> Certificate Requests</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .sidebar {
            width: 240px;
            background-color: #d4af37;
            background-image: linear-gradient(to bottom, #d4af37, #b8860b);
            padding: 20px;
            text-align: center;
            height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            position: fixed;
        }

        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid white;
            background-color: white;
        }

        .sidebar h3 {
            margin: 5px 0;
            font-size: 18px;
            color: white;
            font-weight: bold;
        }

        .sidebar p {
            font-size: 14px;
            color: #fff8dc;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            margin: 8px 0;
            padding: 10px;
            text-decoration: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 4px;
            transition: all 0.3s;
            font-size: 16px;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* Active menu item */
        .sidebar a.active {
            background-color: white;
            color: #8b6914;
            font-weight: bold;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(0,0,0,0.1) !important;
        }
        
        .logout:hover {
            background-color: rgba(0,0,0,0.2) !important;
        }

        .main {
            flex: 1;
            padding: 30px;
            margin-left: 280px;
            background-color: white;
        }

        .header {
            padding: 15px 0;
            font-weight: bold;
            font-size: 22px;
            color: #8b6914;
            border-bottom: 1px solid #d4af37;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .header .logo {
            height: 30px;
            width: auto;
            margin-right: 10px;
        }

        h2 {
            color: #8b6914;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #fffdf7;
            margin-bottom: 15px;
            padding: 20px;
            border-left: 5px solid #1e40af;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border-radius: 6px;
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin: 0;
            color: #1e40af;
            font-size: 18px;
        }

        .card p {
            margin: 8px 0;
            color: #555;
            line-height: 1.4;
        }
        
        .card p strong {
            color: #8b6914;
        }
        
        /* Apply color coding for different statuses */
        .card.Request {
            border-left-color: #1e40af;
        }
        
        .card.Request h3 {
            color: #1e40af;
        }
        
        .card.Approved {
            border-left-color: #15803d;
        }
        
        .card.Approved h3 {
            color: #15803d;
        }
        
        .card.Denied {
            border-left-color: #dc2626;
        }
        
        .card.Denied h3 {
            color: #dc2626;
        }
       
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <img src="default-avatar.png" alt="Profile">
    <h3>admin</h3>
    <p>admin@gmail.com</p>
    <a href="admin_dashboard.php">Menu</a>
    <a href="requests_page.php" class="<?= $status === 'Pending' ? 'active' : '' ?>">Requests</a>
    <a href="approved_list.php" class="<?= $status === 'Approved' ? 'active' : '' ?>">Approved</a>
    <a href="rejected_list.php" class="<?= $status === 'Denied' ? 'active' : '' ?>">Rejected</a>
    <a href="records.php">Records</a>
    <a href="logout.php" class="logout">Log out</a>
</div>

<!-- Main content -->
<div class="main">
    <div class="header">
        <img src="images/logo2.png" alt="Logo" class="logo"> Sacred Heart of Jesus Parish
    </div>
    
    <h2><?= $status ?> Certificate Requests</h2>
    
    <?php
    $sql = "SELECT * FROM CertificateRequests WHERE status = '$status' ORDER BY date_requested DESC";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card {$row['status']}'>
                    <h3>{$row['owner_name']} ({$row['type']})</h3>
                    <p><strong>Reason:</strong> {$row['reason']}</p>
                    <p><strong>Status:</strong> {$row['status']}</p>
                    <p><strong>Date Requested:</strong> {$row['date_requested']}</p>
                  </div>";
        }
    } else {
        echo "<p>No $status certificate requests found.</p>";
    }
    ?>
</div>

</body>
</html>