<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobilenum = $_POST['mobilenum'];
    $gender = $_POST['gender'];
    $details = $_POST['details'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hashing the password

    $query = mysqli_query($con, "INSERT INTO users(name, email, mobile_number, gender, details, password) 
    VALUES('$name', '$email', '$mobilenum', '$gender', '$details', '$password')");

    if ($query) {
        echo "<script>alert('Registration successful.');</script>"; 
        echo "<script>window.location.href = 'userlogin.php'</script>"; 
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";      
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>User Registration</title>
<!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required="true">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="mobilenum">Mobile Number</label>
            <input type="text" class="form-control" id="mobilenum" name="mobilenum" required="true" maxlength="10" pattern="[0-9]+">
        </div>
        <div class="radio">
            <strong>Gender:</strong>
            <label>
                <input type="radio" name="gender" value="Female" checked="true"> Female
            </label>
            <label>
                <input type="radio" name="gender" value="Male"> Male
            </label>
            <label>
                <input type="radio" name="gender" value="Transgender"> Transgender
            </label>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" id="details" name="details" required="true"></textarea>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required="true">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Register</button>
    </form>
    <p>Already have an account? <a href="userlogin.php">Login here</a></p> <!-- Link to login page -->
    <p>Forgot your password? <a href="userforgot-password.php">Reset it here</a></p>
</body>
</html>
