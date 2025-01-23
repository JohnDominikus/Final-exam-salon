<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    /* CSS Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      font-family: 'Arial', sans-serif;
      overflow-x: hidden;
      padding-top: 80px;
      scroll-behavior: smooth;
      background-color: #f4f4f4;
    }

    /* Navbar Styling */
    .navbar {
      background-color: #333;
      padding: 12px 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease;
    }

    .navbar.fade-out {
      opacity: 0;
    }

    .navbar .nav-link {
      color: #fff !important;
      transition: color 0.3s ease, background-color 0.3s ease;
      padding: 10px 15px;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
    }

    .navbar .nav-link i {
      margin-right: 8px;
      font-size: 1.2rem;
    }

    /* Hover and active link states */
    .navbar .nav-link:hover, .navbar .nav-item.active .nav-link {
      color: #fff !important;
      background-color: #f4c542;
      border-radius: 5px;
      font-weight: bold;
      transform: scale(1.1);
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .navbar .navbar-brand {
      color: #FF6F61;
      font-size: 2rem;
      display: flex;
      align-items: center;
      margin-right: 20px;
    }

    .navbar .navbar-brand img {
      height: 90px;
      margin-right: 11px;
      border-radius: 40%;
    }

    .navbar-collapse {
      justify-content: flex-end;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-toggler-icon {
      background-color: #FF6F61;
      border-radius: 3px;
    }

    .navbar .fa {
      font-size: 1.5rem;
    }

    /* Smooth scrolling effect */
    html {
      scroll-behavior: smooth;
    }

    /* Additional styles for mobile */
    @media (max-width: 768px) {
      .navbar-collapse {
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <?php
  $current_page = basename($_SERVER['PHP_SELF']);
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="admin/images/themelogo.png" alt="Millen Salon Logo">
        Millen Salon
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($current_page == 'index.php'){echo 'active';} ?>"><a href="index.php" class="nav-link"><i class="fa fa-home"></i> Home</a></li>
          <li class="nav-item <?php if($current_page == 'services.php'){echo 'active';} ?>"><a href="services.php" class="nav-link"><i class="fa fa-scissors"></i> Services</a></li>
          <li class="nav-item <?php if($current_page == 'about.php'){echo 'active';} ?>"><a href="about.php" class="nav-link"><i class="fa fa-info-circle"></i> About</a></li>
          <li class="nav-item <?php if($current_page == 'contact.php'){echo 'active';} ?>"><a href="contact.php" class="nav-link"><i class="fa fa-phone"></i> Contact</a></li>
          <li class="nav-item <?php if($current_page == 'admin/index.php'){echo 'active';} ?>"><a href="admin/index.php" class="nav-link"><i class="fa fa-user"></i> Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Full version of jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    let lastScrollTop = 0;
    window.addEventListener("scroll", function() {
      const navbar = document.querySelector('.navbar');
      let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      
      if (currentScroll > lastScrollTop) {
        navbar.classList.add('fade-out');
      } else {
        navbar.classList.remove('fade-out');
      }
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Prevent negative scroll
    });

    // Active state logic
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function() {
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        this.parentElement.classList.add('active');
      });
    });
  </script>
</body>
</html>
