<?php
    session_start();
    if (isset($_SESSION['email']))
        header("Location: user_dashboard.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['mobilenum'] = $_POST['mobilenum'];
        $_SESSION['password'] = $_POST['password'];

        
        header("Location: user_dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sacred Heart Parish Management System</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Playfair Display', serif;
        }
        body {
            min-height: 100vh;
            background-image:url(images/background.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25.5px 10.5px;
            background-color: #DDE76E;
        }
        h1 {
            margin-left: 10px;
        }
        nav a {
            color: black;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            margin-right: 70px;
            cursor: pointer;
            transition: 0.3s;
        }
        nav a:hover {
            background-color:#a1b537;
            color: white;
          }
          nav a:active{
            background-color: #556B2F;
            color: white;
          }
          nav a:visited{
            background-color: #6B5F0B;
            color: white;
          }
        #container {
            margin:0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
        }
        .form-box {
            width: 100%;
            max-width: 450px;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: block;
        }
        .form-box-invisible {
            width: 100%;
            max-width: 450px;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
        }
        h2 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            background-color: #eee;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 16px;
            color: blue;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width:100%;
            padding: 12px;
            background-color:rgb(105, 105, 235);
            border-radius: 6px;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            margin-bottom: 20px;
            transition: 0.5s;
        }
        input[type="submit"]:hover {
            background-color: skyblue;
        }
        p {
        font-size: 14.5px;
        text-align: center;
        margin-bottom: 10px; 
        }
        button[type="button"] {
            border: none;
            color: blue;
            background-color: #fff;
        }
        button[type="button"]:hover {
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sacred Heart Parish Management System</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>
    <div id="container">
        <div class="form-box" id="login-form">
            <form actions="">
                <h2>User Login</h2>
                <input type="email" name="loginemail" placeholder="Email" required>
                <input type="password" name="loginpassword" placeholder="Password" required>
                <input type="submit" name="login">Login</button>
                <p>Don't have an account? <button type="button" id="to-register" onclick="toggleForm()">Sign Up</button></p>
            </form>
        </div>
        <div class="form-box-invisible" id="register-form">
            <form action="user.php" method="post">
                <h2>User Registration</h2>
                <input type="email" name="email" placeholder="Enter Email address" maxlength="255" required>
                <input type="text" name="firstname" placeholder="Enter your first name" maxlength="50" required>
                <input type="text" name="lastname" placeholder="Enter your last name" maxlength="50" required>
                <input type="tel" name="mobilenum" placeholder="Enter your mobile number" maxlength="12" required>
                <input type="password" name="password" placeholder="Password (8 characters minimum)" minlength="8" required>
                <input type="submit" name="register" value="Register">
                <p>Already have an account? <button type="button" id="to-login" onclick="toggleForm()">Login</button></p>
            </form>
        </div>
    </div>
    <script>
        function toggleForm() {
            document.getElementById("login-form").classList.toggle("form-box-invisible");
            document.getElementById("register-form").classList.toggle("form-box-invisible");
        }
    </script>
</body>
</html>