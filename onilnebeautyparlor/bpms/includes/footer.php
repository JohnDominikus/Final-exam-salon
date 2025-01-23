<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Styles */
    :root {
      --navy-blue: #223656;
      --peach: #EED590;
      --tangerine: #F08C4A;
      --aqua: #43D9C0;
      --white: #FFFFFF;
      --soft-beige: #F4E7D3;
      --dark-brown: #6B4F4F;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    .footer {
      background-color: var(--navy-blue);
      color: var(--white);
      padding: 40px 0;
    }

    .footer h2 {
      color: var(--peach);
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .footer a {
      color: var(--aqua);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer a:hover {
      color: var(--tangerine);
    }

    .footer .ftco-footer-widget {
      margin-bottom: 30px;
    }

    .footer .block-23 ul {
      list-style: none;
      padding: 0;
    }

    .footer .block-23 ul li {
      margin-bottom: 15px;
      display: flex;
      align-items: center;
    }

    .footer .block-23 ul li .icon {
      color: var(--peach);
      margin-right: 10px;
      font-size: 18px;
    }

    .footer .block-23 ul li .text {
      color: var(--white);
      font-size: 14px;
    }

    .footer iframe {
      border: 0;
      width: 100%;
      height: 200px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .footer .social-icons {
      margin-top: 20px;
    }

    .footer .social-icons a {
      color: var(--white);
      font-size: 20px;
      margin-right: 15px;
      transition: color 0.3s ease;
    }

    .footer .social-icons a:hover {
      color: var(--tangerine);
    }

    .footer .copyright {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: var(--white);
    }

    /* Animation for Hover Effects */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .footer a:hover, .footer .social-icons a:hover {
      animation: fadeIn 0.5s ease;
    }
  </style>
</head>
<body>
  <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <!-- About Us Section -->
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2 logo">@Milen Salon Shop</h2>
            <?php
            $ret = mysqli_query($con, "select * from tblpage where PageType='aboutus'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
            <p><?php echo substr($row['PageDescription'], 0, 200); ?> <a href="about.php">More.......</a></p>
            <?php } ?>
          </div>
        </div>

        <!-- Contact Section -->
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Question?</h2>
            <div class="block-23 mb-3">
              <?php
              $ret = mysqli_query($con, "select * from tblpage where PageType='contactus'");
              while ($row = mysqli_fetch_array($ret)) {
              ?>
              <ul>
                <li>
                  <span class="icon icon-map-marker"></span>
                  <span class="text"><?php echo $row['PageDescription']; ?></span>
                </li>
                <li>
                  <a href="#">
                    <span class="icon icon-phone"></span>
                    <span class="text">+<?php echo $row['MobileNumber']; ?></span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span class="icon icon-envelope"></span>
                    <span class="text"><?php echo $row['Email']; ?></span>
                  </a>
                </li>
              </ul>
              <?php } ?>
            </div>
          </div>
        </div>

        <!-- Map Section -->
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <div class="block-23 mb-3">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.3267785321405!2d120.97445127357602!3d14.408316481758492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d22decfa4fb3%3A0x22ee9a583731962f!2sRFC%20Molino%20Mall!5e0!3m2!1sen!2sph!4v1736975557149!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Social Media Icons -->
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="social-icons">
            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>

      <!-- Copyright Section -->
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="copyright">2025 &copy; Milen Salon. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>