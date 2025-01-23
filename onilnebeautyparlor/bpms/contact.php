<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Millen Hair Salon - Contact Us</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Modern Design Updates */
        :root {
            --navy-blue: #223656;
            --peach: #EED590;
            --tangerine: #F08C4A;
            --aqua: #43D9C0;
            --white: #FFFFFF;
        }

        /* Hero Section */
        .hero-wrap {
            background: linear-gradient(120deg, var(--navy-blue), var(--aqua));
            background-image: url('images/salon.jpg');
            background-size: cover;
            background-position: center;
            padding: 150px 0 100px; /* Adjusted padding for better spacing */
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-wrap .overlay {
            background: rgba(34, 54, 86, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .hero-wrap h2 {
            color: var(--white);
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Text shadow for better readability */
        }
        .hero-wrap .breadcrumbs {
            color: var(--white);
            font-size: 1.2rem;
            position: relative;
            z-index: 2;
        }
        .hero-wrap .breadcrumbs a {
            color: var(--tangerine);
            text-decoration: none;
        }
        .hero-wrap .breadcrumbs a:hover {
            text-decoration: underline;
        }

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background-color: var(--white);
        }
        .contact-info .box {
            border-radius: 15px;
            background: var(--white);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid var(--tangerine);
            padding: 30px;
            margin: 15px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .contact-info .box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, var(--navy-blue), var(--aqua));
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 1;
        }
        .contact-info .box:hover::before {
            opacity: 0.1;
        }
        .contact-info .box:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }
        .contact-info .icon {
            font-size: 2.5rem;
            color: var(--tangerine);
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        .contact-info h3 {
            color: var(--navy-blue);
            margin-bottom: 15px;
            font-size: 1.5rem;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }
        .contact-info p, .contact-info a {
            color: var(--navy-blue);
            font-size: 1rem;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }
        .contact-info a {
            color: var(--tangerine);
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-wrap h2 {
                font-size: 2.5rem;
            }
            .contact-info .box {
                margin: 10px 0;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for modern icons -->
</head>
<body>
    <?php include_once('includes/header.php'); ?>
  
    <!-- Hero Section -->
    <section class="hero-wrap hero-wrap-2">
        
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5">
                  
                    <p class="breadcrumbs">
                        <!-- Breadcrumbs removed for simplicity -->
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section">
                    <h2 class="mb-4">Get in Touch</h2>
                    <p>We would love to hear from you. Please reach out to us through any of the following methods.</p>
                </div>
            </div>
            <div class="row no-gutters d-flex contact-info"> 
                <?php
                $ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='contactus'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fas fa-map-marker-alt"></span> <!-- Modern Icon -->
                        </div>
                        <h3 class="mb-4">Address</h3>
                        <p><?php echo $row['PageDescription']; ?></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fas fa-phone-alt"></span> <!-- Modern Icon -->
                        </div>
                        <h3 class="mb-4">Contact Number</h3>
                        <p><a href="tel://<?php echo $row['MobileNumber']; ?>">+ <?php echo $row['MobileNumber']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fas fa-envelope"></span> <!-- Modern Icon -->
                        </div>
                        <h3 class="mb-4">Email Address</h3>
                        <p><a href="mailto:<?php echo $row['Email']; ?>"><?php echo $row['Email']; ?></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 py-md-5 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fas fa-clock"></span> <!-- Modern Icon -->
                        </div>
                        <h3 class="mb-4">Timing</h3>
                        <p><?php echo $row['Timing']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
</body>
</html>