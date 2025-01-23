<?php
// Database connection and session start
include('includes/dbconnection.php');
session_start();
error_reporting(0);

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
  
        echo "<script>window.location.href='makeappoinment.php'</script>"; // Redirect to thank-you page
    } else {
        $msg = "Something Went Wrong. Please try again";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Millen Hair Salon || Home Page</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <!-- Stylesheets -->
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
    <!-- Custom Styles -->
    <style>
        :root {
            --navy-blue: #223656;
            --peach: #EED590;
            --tangerine: #F08C4A;
            --aqua: #43D9C0;
            --white: #FFFFFF;
            --soft-beige: #F4E7D3;
            --dark-brown: #6B4F4F;
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--navy-blue) !important;
            border-color: var(--navy-blue) !important;
            color: var(--white) !important;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1a2a40 !important;
            border-color: #1a2a40 !important;
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(34, 54, 86, 0.5) !important;
        }

        /* Hero Section */
        .hero {
            background-image: url(images/redbg.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
        }
        .hero .overlay {
            background-color: rgba(34, 54, 86, 0.6);
            padding: 20px;
            border-radius: 15px;
        }
        .hero h1 {
            font-family: 'Pacifico', cursive;
            font-size: 4rem;
            color: var(--white);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 20px;
            color: var(--white);
        }

        /* Appointment Section */
        .ftco-booking {
            background-color: var(--soft-beige);
            padding: 50px 0;
        }
        .appointment-wrap {
            background-color: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .appointment-wrap h3 {
            color: var(--dark-brown);
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .appointment-wrap .form-control {
            border: 2px solid var(--dark-brown);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        .appointment-wrap .form-control:focus {
            border-color: var(--aqua);
        }
        .appointment-wrap .btn-primary {
            background-color: var(--navy-blue);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--white);
            transition: background 0.3s;
        }
        .appointment-wrap .btn-primary:hover {
            background-color: #EBEBEBFF;
        }

        /* Reservation Text Color */
        .appointment-wrap .subheading {
            color: var(--tangerine);
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Image Section */
        .img {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Scroll Effects */
        [data-aos] {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        [data-aos="fade-up"] {
            opacity: 0;
            transform: translateY(50px);
        }
        [data-aos="fade-down"] {
            opacity: 0;
            transform: translateY(-50px);
        }
        [data-aos="fade-left"] {
            opacity: 0;
            transform: translateX(-50px);
        }
        [data-aos="fade-right"] {
            opacity: 0;
            transform: translateX(50px);
        }
        [data-aos].aos-animate {
            opacity: 1;
            transform: translate(0);
        }
    </style>
</head>
<body>
    <?php include_once('includes/header.php'); ?>

    <!-- Hero Section -->
    <section id="home-section" class="hero" style="background-image: url(images/redbg.jpg);" data-stellar-background-ratio="0.5">
        <div class="home-slider owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
                        <img class="one-third align-self-end order-md-last img-fluid" src="images/bg_1.png" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text mt-5">
                                <span class="subheading">Beauty Parlour</span>
                                <h1 class="mb-4">Good hair days start here.</h1>
                                <p class="mb-4">Ready to ditch the bad hair days and embrace your hair goals? We're experts in all things hair, from classic cuts and vibrant colors to the trendiest styles. Whether you're craving a complete makeover or just need a bit of TLC, we'll create a look that's perfect for you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third align-self-end order-md-last img-fluid" src="images/bg_2.png" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text mt-5">
                                <span class="subheading">Natural Beauty</span>
                                <h1 class="mb-4">Get the look you deserve.</h1>
                                <p class="mb-4">This parlour provides huge facilities with advanced technology equipments and best quality service. Here we offer best treatment that you might have never experienced before.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third align-self-end order-md-last img-fluid" src="images/har2.png" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text mt-5">
                                <span class="subheading">  Real Beauty</span>
                                <h1 class="mb-4">  Style that defines who you are.</h1>
                               
                            <p class="mb-4">Your look is a reflection of your personality. At Millen Hair Salon, we believe in enhancing your natural beauty with styles that suit your unique features. Whether it's a fresh haircut, a bold new color, or a complete makeover, our expert stylists are here to help you achieve the look you desire.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section class="ftco-section ftco-no-pt ftco-booking" data-aos="fade-down">
        <div class="container-fluid px-0">
            <div class="row no-gutters d-md-flex justify-content-end">
                <div class="one-forth d-flex align-items-end">
                    <div class="text">
                        <div class="appointment-wrap">
                        <br />
                        <br />
                            <span class="subheading">Reservation</span>
                            <br />
                                <br />
                            <h3 class="mb-2">Make an Appointment</h3>
                            <br />
                                <br />
                            <form action="#" method="post" class="appointment-form">
                                <div class="form-group">
                                   
                                        
                                            
                                   
                                <div class="form-group">
                                <p class="mb-2">"Transform your style with Milen Salon—where your dream look is just a click of your fingertips away. Book your Milen Salon appointment now and let us bring out the best in you!"</p>
                                </div>
                                <br />
                               
                                <br />
                                <br />
                                    <input type="submit" name="submit" value="Make an Appointment" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="one-third">
                    <div class="img" style="background-image: url(images/salon.jpg);"></div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

    <!-- Scripts -->
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
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>
</html>