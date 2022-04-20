    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/login.css?v=<?php echo time(); ?>">

    <title>Login | QHealthy</title>
    </head>

    <body>
      <!-- cek session popup -->

      <div class="popup-login" data-popup_login="<?= isset($_SESSION['popup']['login']) ? $_SESSION['popup']['login'] : "null"; ?>"><?php unset($_SESSION['popup']['login']); ?></div>

      <div class="d-flex align-items-center min-vh-100">
        <div class="container card-login">
          <div class="text-center">
            <h2 class="fw-bold mb-5 pb-2 logo">
              <a href="<?= BASEURL; ?>/landingpage" style="text-decoration: none; color: inherit;">Q<span class="fw-normal">Healthy</span></a>
            </h2>
            <form class="px-5" method="POST" action="<?= BASEURL; ?>/dokter/masuk">
              <div class="mb-5">
                <h6 class="fw-bold text-muted mb-3">Silakan Login</h6>
                <input type="email" class="form-control style-form" name="email" placeholder="Email" required />
              </div>
              <div class="mb-5">
                <input type="password" class="form-control style-form" name="password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-orange shadow-sm border-3 py-1 px-4 mb-5 fw-bold text-white">Login</button>
            </form>
          </div>
        </div>
      </div>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="<?= BASEURL; ?>/js/pop-up.js"></script>
    </body>

    </html>