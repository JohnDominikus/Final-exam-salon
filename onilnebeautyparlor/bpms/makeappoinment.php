<?php
// Database connection and session start
include('includes/dbconnection.php');
session_start();
error_reporting(0);

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $services = $_POST['services'];
    $branch = $_POST['branch']; // Newly added branch
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];
    $phone = $_POST['phone'];

    // Check if the user already has an appointment
    $check_appointment = mysqli_query($con, "SELECT * FROM tblappointment WHERE Email = '$email' AND PhoneNumber = '$phone'");
    if (mysqli_num_rows($check_appointment) > 0) {
        $msg = "Our system detected that you already have an appointment.";
    } else {
        $aptnumber = mt_rand(100000000, 999999999); // Generate a random 9-digit appointment number

        // Insert appointment into database
        $query = mysqli_query($con, "INSERT INTO tblappointment (AptNumber, Name, Email, PhoneNumber, AptDate, AptTime, Services, Branch) 
                                    VALUES ('$aptnumber', '$name', '$email', '$phone', '$adate', '$atime', '$services', '$branch')");

        if ($query) {
            // Fetch the appointment number for the session
            $ret = mysqli_query($con, "SELECT AptNumber FROM tblappointment WHERE Email='$email' AND PhoneNumber='$phone'");
            $result = mysqli_fetch_array($ret);
            $_SESSION['aptno'] = $result['AptNumber'];
            echo "<script>window.location.href='thank-you.php'</script>"; // Redirect to thank-you page
        } else {
            $msg = "Something Went Wrong. Please try again";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salon Appointment Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --salon-pink: #FF6B6B;
            --salon-gold: #FFD700;
            --salon-gray: #4A4A4A;
            --salon-light-gray: #F5F5F5;
            --salon-white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--salon-light-gray);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: var(--salon-white);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .form-container h1 {
            font-size: 24px;
            font-weight: 600;
            color: var(--salon-gray);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--salon-gray);
            margin-bottom: 8px;
        }

        .form-container .form-group input,
        .form-container .form-group select {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: var(--salon-white);
            transition: border-color 0.3s ease;
        }

        .form-container .form-group input:focus,
        .form-container .form-group select:focus {
            border-color: var(--salon-pink);
            outline: none;
        }

        .form-container .form-group input::placeholder {
            color: #999;
        }

        .form-container .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23999%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 12px;
        }

        .form-container .form-group button {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            color: var(--salon-white);
            background-color: var(--salon-pink);
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container .form-group button:hover {
            background-color: var(--salon-gold);
        }

        .form-container .form-group button:focus {
            outline: none;
        }

        /* Back button style */
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            color: var(--salon-gray);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .back-button:hover {
            color: var(--salon-pink);
        }
    </style>
</head>
<body>
    <!-- Salon Appointment Form -->
    <div class="form-container">
        <i class="fas fa-arrow-left back-button" onclick="window.history.back();"></i> <!-- Back Arrow Icon -->
        <h1>Book Your Salon Appointment</h1>

        <!-- Displaying the message if user already has an appointment -->
        <?php if(isset($msg)) { echo "<p style='color: red; text-align: center;'>$msg</p>"; } ?>

        <form action="#" method="post" class="appointment-form">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="form-group">
                <label for="services">Select Service</label>
                <select id="services" name="services" required>
                    <option value="">Choose a service</option>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM tblservices");
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<option value='{$row['ServiceName']}'>{$row['ServiceName']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="branch">Select Branch</label>
                <select id="branch" name="branch" required>
                    <option value="">Choose a branch</option>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM tblbranch");
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<option value='{$row['Branch']}'>{$row['Branch']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="adate">Appointment Date</label>
                <input type="date" id="adate" name="adate" required>
            </div>
            <div class="form-group">
                <label for="atime">Appointment Time</label>
                <input type="time" id="atime" name="atime" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required maxlength="10" pattern="[0-9]+">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Book Now</button>
            </div>
        </form>
    </div>
</body>
</html>
