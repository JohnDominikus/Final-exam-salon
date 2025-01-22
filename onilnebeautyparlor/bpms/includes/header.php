<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, ;
    }
    .navbar {
      background-color: #223656; /* Navy blue background */
      border-radius: 10px;
      margin: 10px;
      padding: 10px 20px;
    }

    .navbar .nav-link {
      color: white;
      margin: 0 10px;
      padding: 10px;
      transition: color 0.3s ease, background-color 0.3s ease;
    }

    .navbar .nav-link:hover, .navbar .nav-item.active .nav-link {
      color: #43d9c0; /* Aqua text color on hover */
      background-color: #f08c4a; /* Tangerine background on hover */
      border-radius: 5px;
    }

    .navbar .nav-item.active .nav-link {
      color: #eed590; /* Gold text color for active link */
      background-color: #2a5170; /* Slightly darker blue for active link background */
    }

    .navbar .navbar-brand {
      color: #eed590; /* Gold brand color */
      font-size: 1.5em; /* Larger brand size */
    }

    .navbar .navbar-brand:hover {
      color: #43d9c0; /* Aqua brand color on hover */
    }

    .navbar-collapse {
      justify-content: center;
    }
  </style>
</head>
<body>
  <?php
  $current_page = basename($_SERVER['PHP_SELF']);
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar" id="ftco-navbar">
    <div class="container">
    <a class="navbar-brand" href="index.php" style="font-family: 'Playfair Display', serif; font-size: 24px; color: #333;">Millen Salon</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav">
          <li class="nav-item <?php if($current_page == 'index.php'){echo 'active';} ?>"><a href="index.php" class="nav-link"><i class="fa fa-home"></i> Home</a></li>
          <li class="nav-item <?php if($current_page == 'services.php'){echo 'active';} ?>"><a href="services.php" class="nav-link"><i class="fa fa-cogs"></i> Services</a></li>
          <li class="nav-item <?php if($current_page == 'about.php'){echo 'active';} ?>"><a href="about.php" class="nav-link"><i class="fa fa-info-circle"></i> About</a></li>
          <li class="nav-item <?php if($current_page == 'contact.php'){echo 'active';} ?>"><a href="contact.php" class="nav-link"><i class="fa fa-envelope"></i> Contact</a></li>
          <li class="nav-item <?php if($current_page == 'admin/index.php'){echo 'active';} ?>"><a href="admin/index.php" class="nav-link"><i class="fa fa-user"></i> Admin</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <script>
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function() {
        document.querySelectorAll('.nav-item').forEach(item => item.classList.remove('active'));
        this.parentElement.classList.add('active');
      });
    });
  </script>
</body>
</html>
