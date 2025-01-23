<?php
session_start();
include('includes/dbconnection.php');

if (!isset($_SESSION['userid'])) {
    header('location:login.php');
}

// Sample data for services
$services = [
    ["service" => "Haircut", "date" => "2025-01-25", "status" => "Completed"],
    ["service" => "Manicure", "date" => "2025-01-26", "status" => "Upcoming"],
    ["service" => "Massage", "date" => "2025-01-27", "status" => "Upcoming"],
];

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Client Appointment Dashboard</title>
<!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <h2>Your Services</h2>
    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) { ?>
                <tr>
                    <td><?php echo $service['service']; ?></td>
                    <td><?php echo $service['date']; ?></td>
                    <td><?php echo $service['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <button onclick="window.location.href='make-appointment.php'">Make an Appointment</button>

    <p><a href="profile.php">Profile</a> | <a href="settings.php">Settings</a> | <a href="logout.php">Logout</a></p>
</body>
</html>
