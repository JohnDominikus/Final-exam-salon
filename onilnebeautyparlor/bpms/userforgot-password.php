<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mobilenum = $_POST['mobilenum'];

    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND mobile_number='$mobilenum'");
    $user = mysqli_fetch_array($query);

    if ($user) {
        // Generate a new password (or you could implement sending a reset link to email)
        $new_password = "NewPassword123"; // For demonstration, use a secure method to generate passwords
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        $update_query = mysqli_query($con, "UPDATE users SET password='$hashed_password' WHERE email='$email' AND mobile_number='$mobilenum'");

        if ($update_query) {
            echo "<script>alert('Password reset successful. Your new password is $new_password');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No account found with the provided email and mobile number.');</script>";      
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Forgot Password</title>
<!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <form method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="mobilenum">Mobile Number</label>
            <input type="text" class="form-control" id="mobilenum" name="mobilenum" required="true" maxlength="10" pattern="[0-9]+">
        </div>
        <button type="submit" name="submit" class="btn btn-default">Reset Password</button>
    </form>
</body>
</html>
