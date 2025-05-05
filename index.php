<?php
session_start();

require_once 'config/connection.php';

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM registration WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) { 
            $_SESSION['isLogin'] = true;
            $_SESSION['username'] = $row['username'];

            echo "<script>alert('Login successful!'); location.href = 'home.php';</script>";
        } else {
            echo "<script>alert('Incorrect password. Please try again.'); location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('No user found with the provided username.'); location.href = 'index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Phishing Prediction System - Login">
    <meta name="author" content="">
    <title>Phishing Prediction - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ff4e00, #ff9f00, #ffb31c);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 400px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .header {
            background: linear-gradient(135deg, #d32f2f, #c2185b);
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .header p {
            margin: 10px 0;
            font-size: 14px;
        }
        .form-container {
            padding: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input {
            width: 93%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #ff4e00;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: #ff4e00;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #e64a19;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #666;
        }
        .footer a {
            color: #ff4e00;
            text-decoration: none;
        }
        .warning-icon {
            font-size: 30px;
            color: #ff4e00;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="header">
            <i class="fas fa-exclamation-circle warning-icon"></i>
            <h2>Phishing Prediction System</h2>
            <p>Login to Secure Dashboard</p>
        </div>
        <div class="form-container">
            <form method="POST">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
        </div>
        <div class="footer">
            <p>Don't have an account? <a href="registration.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>
