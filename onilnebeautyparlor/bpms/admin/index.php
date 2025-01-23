<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE UserName='$adminuser' && Password='$password'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['bpmsaid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details.";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Salon Management System | Login Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Font Awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- Animate.css -->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <style>
        /* Modern Design Updates */
        body {
            background: linear-gradient(120deg, #f4e7d3, #d8c1a8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Roboto Condensed', sans-serif;
        }
        .login-page {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            background-image: url('images/salon-background.jpg'); /* Add a salon-themed background image */
            background-size: cover;
            background-position: center;
        }
        .login-page h3 {
            color: #6b4f4f;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .login-page h4 {
            color: #030303FF;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 400;
        }
        .login-page input[type="text"],
        .login-page input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #071C7AFF;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: rgba(255, 255, 255, 0.8);
        }
        .login-page input[type="text"]:hover,
        .login-page input[type="password"]:hover {
            border-color: #071C7AFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-page input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #071C7AFF;
            border: none;
            border-radius: 8px;
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s;
        }
        .login-page input[type="submit"]:hover {
            background: #071C7AFF;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-page .forgot-grid {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .login-page .forgot-grid a {
            color: #071C7AFF;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        .login-page .forgot-grid a:hover {
            color: #071C7AFF;
        }
        .login-page .error-message {
            color: #ff0000;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <h3>Sign In</h3>
        <h4>Welcome to the Salon Management System</h4>
        <form role="form" method="post" action="">
            <?php if ($msg) { ?>
                <p class="error-message"><?php echo $msg; ?></p>
            <?php } ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Sign In">
            <div class="forgot-grid">
                <div class="forgot">
                    <a href="../index.php">Back to Home</a>
                </div>
                <div class="forgot">
                    <a href="forgot-password.php">Forgot Password?</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="js/classie.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
