<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_array($query);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        echo "<script>alert('Login successful.');</script>"; 
        echo "<script>window.location.href = 'userdashboard.php'</script>"; // Redirect to client dashboard
    } else {
        echo "<script>alert('Invalid Email or Password.');</script>";   
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Login</title>
<!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <form method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required="true">
        </div>
        <button type="submit" name="login" class="btn btn-default">Login</button>
    </form>
</body>
</html>
