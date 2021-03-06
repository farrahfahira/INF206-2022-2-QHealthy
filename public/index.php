<?php

if (!session_id()) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>QHealthy</title>
  <!-- My CSS -->
  <link rel="stylesheet" href="css/LandingPage.css" />
</head>

<body>
  <main>
    <div class="big-wrapper light">
      <img src="assets/shape.png" alt="" class="shape" />

      <header>
        <div class="container">
          <div class="logo">
            <img src="assets/logo.png" alt="Logo" />
            <h3>QHealthy</h3>
          </div>

          <div class="links">
            <ul>
              <li><a href="login.php" class="btn">Login</a></li>
            </ul>
          </div>

          <div class="overlay"></div>

          <div class="hamburger-menu">
            <div class="bar"></div>
          </div>
        </div>
      </header>

      <div class="showcase-area">
        <div class="container">
          <div class="left">
            <div class="big-title">
              <h1>Sekarang Hadir,</h1>
              <h1>Rekam Medis Elektronik QHealthy.</h1>
            </div>
            <p class="text">QHealthy memberikan rekam medis dan hasil periksa laboratorium secara praktis dan lengkap</p>
            <div class="cta">
              <a href="login.php" class="btn">Get started</a>
            </div>
          </div>

          <div class="right">
            <img src="assets/person.png" alt="Person Image" class="person" />
          </div>
        </div>
      </div>

      <div class="bottom-area">
        <div class="container">
          <button class="toggle-btn">
            <i class="far fa-moon"></i>
            <i class="far fa-sun"></i>
          </button>
        </div>
      </div>
    </div>
  </main>

  <!-- JavaScript Files -->

  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <script src="js/app.js"></script>
</body>

</html>