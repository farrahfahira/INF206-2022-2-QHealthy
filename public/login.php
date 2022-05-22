<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: daftarpasien/home.php");
}
if (isset($_POST["submit"])) {
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($row['user'] == 'perekam medik') {
      if ($password == $row['password']) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: daftarpasien/home.php");
      } else {
        echo
        "<script> alert('Wrong Password'); </script>";
      }
    } else {
      if ($password == $row['password']) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: daftarpasien/home_dua.php");
      } else {
        echo
        "<script> alert('Wrong Password'); </script>";
      }
    }
  } else {
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

  <!-- Box Icon -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet" />

  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Poppins", sans-serif;
    }

    ::-webkit-scrollbar {
      width: 10px;
    }

    ::-webkit-scrollbar-track {
      /* background: transparent; */
      box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.18);
    }

    ::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
      transition: 0.8s;
      background: #555;
    }
  </style>
  <!-- My CSS -->
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login | QHealthy</title>
</head>

<body>
  <div class="d-flex align-items-center min-vh-100">
    <div class="container card-login">
      <div class="text-center">
        <h2 class="fw-bold mb-5 pb-2 logo">
          <a href="index.php" style="text-decoration: none; color: inherit;">Q<span class="fw-normal">Healthy</span></a>
        </h2>
        <form class="px-5" method="POST" action="" autocomplete="off">
          <div class="mb-5">
            <h6 class="fw-bold text-muted mb-3">Silakan Login</h6>
            <input type="text" name="usernameemail" id="usernameemail" class="form-control style-form" name="email" placeholder="Username or Email" required value="" />
          </div>
          <div class="mb-5">
            <input type="password" name="password" id="password" class="form-control style-form" id="password" placeholder="password" required value="" />
            <span>
              <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
            </span>
          </div>
          <button type="submit" name="submit" class="btn shadow-sm border-3 py-1 px-4 mb-5 fw-bold text-white">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="js/pop-up.js"></script>
  <script>
    var state = false;

    function toggle() {
      if (state) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye").style.color = '#71797e';
        state = false;
      } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye").style.color = '#64BCF4';
        state = true;
      }
    }
  </script>
</body>

</html>