<?php
session_start();

if ($_SESSION["role"] === "admin") {
    header("Location: admin_dashboard.php");
    exit();
}
if (!isset($_SESSION["username"])) {
    header("Location: user_loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sacred Heart of Jesus Parish - User Dashboard</title>
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
        }

        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid white;
            background-color: white;
        }

        .sidebar .username {
            margin: 5px 0;
            font-size: 18px;
            color: white;
            font-weight: bold;
        }

        .sidebar .email {
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

        .main {
            flex: 1;
            padding: 30px;
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
        
        .header  {
            font-size: 30px;
            margin-right: 10px;
            color: #d4af37;
        }
        .logo {
           width: 100px;
        }

        h1 {
            color: #8b6914;
            font-size: 24px;
            margin-top: 30px;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .box {
            flex: 1;
            min-width: 180px;
            max-width: 250px;
            text-align: center;
            padding: 25px 15px;
            color: #8b6914;
            border-radius: 8px;
            background-color: #fffdf7;
            border: 1px solid #d4af37;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .box:hover {
            transform: translateY(-5px);
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
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img src="default-avatar.png" alt="Profile">
        <div class="username"><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
        <div class="email">user@gmail.com</div>

        <a href="user_dashboard.php" class="active">Menu</a>
        <a href="request_certificate.php">Request</a>
        <a href="track_certificate.php">Track</a>
        <a href="userlogout.php" class="logout">Log out</a>
    </div>

    <!-- Main content -->
    <div class="main">
        <div class="header">
            <img src="images/logo2.png" alt="Logo" class="logo"> Sacred Heart of Jesus Parish
        </div>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
        <p>This is the user dashboard for the Sacred Heart of Jesus Parish information system. You can request and track certificates here.</p>

    </div>

</body>
</html>