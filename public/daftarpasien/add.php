<?php
require '../config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: ../login.php");
}

$msg = '';
if (!empty($_POST)) {
  $id = isset($_POST['No RM']) && !empty($_POST['No RM']) && $_POST['No RM'] != '' ? $_POST['No RM'] : NULL;
  $nama = isset($_POST['Nama']) ? $_POST['Nama'] : '';
  $usia = isset($_POST['Usia']) ? $_POST['Usia'] : '';
  $jk = isset($_POST['Jenis Kelamin']) ? $_POST['Jenis Kelamin'] : '';
  $pekerjaan = isset($_POST['Pekerjaan']) ? $_POST['Pekerjaan'] : '';
  $alamat = isset($_POST['Alamat']) ? $_POST['Alamat'] : '';
  $notelp = isset($_POST['No. Telp']) ? $_POST['No. Telp'] : '';

  // insert new record ke tabel
  $stmt = $conn->prepare('INSERT INTO dftr_pasien VALUES (?, ?, ?, ?, ?, ?, ?)');
  $stmt->execute([$id, $nama, $usia, $jk, $pekerjaan, $alamat, $notelp]);

  // Output messages
  $msg = 'Data berhasil ditambahkan!';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QHealthy | Home</title>


    <!-- Javascript library files -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>


    <!--  CSS files -->

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="../css/style.css" />

</head>

<body>
    <nav>
        <div class="sidebar-top">
            <span class="shrink-btn">
                <i class="bx bx-chevron-left"></i>
            </span>
            <img src="../assets/logo.png" class="logo" alt="" />
            <h3 class="hide">QHealthy</h3>
        </div>

        <div class="search">
            <i class="bx bx-search"></i>
            <input type="text" class="hide" placeholder="Quick Search ..." />
        </div>

        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="home.php" class="active" data-active="0">
                        <div class="icon">
                            <i class="bx bx-notepad"></i>
                            <i class="bx bxs-notepad"></i>
                        </div>
                        <span class="link hide">Daftar Pasien</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="#" data-active="1">
                        <div class="icon">
                            <i class="bx bx-folder"></i>
                            <i class="bx bxs-folder"></i>
                        </div>
                        <span class="link hide">Rekam Medis</span>
                    </a>
                </li>

                <div class="tooltip">
                    <span class="show">Daftar Pasien</span>
                    <span>Rekam Medis</span>
                </div>
            </ul>
        </div>

        <div class="sidebar-footer">
            <a href="#" class="account tooltip-element" data-tooltip="0">
                <i class="bx bx-user"></i>
            </a>
            <div class="admin-user tooltip-element" data-tooltip="1">
                <div class="admin-profile hide">
                    <img src="../assets/foto1.png" alt="" />
                    <div class="admin-info">
                        <h3>John Doe</h3>
                        <h5>Admin</h5>
                    </div>
                </div>
                <a class="btn log-out" href="../logout.php">
                    <i class="bx bx-log-out"></i>
                </a>
            </div>
            <div class="tooltip">
                <span class="show">John Doe</span>
                <span>Logout</span>
            </div>
        </div>
    </nav>

    <div class="content update">
      <h2>Tambah Daftar Pasien</h2>
      <form action="add.php" method="post">
        <label for="id">No RM</label>
        <input type="text" name="id" value="" id="id" required></form></br>

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama"></br>

        <label for="usia">Usia</label>
        <input type="text" name="usia" id="usia"></br>

        <label for="jk">Jenis Kelamin</label>
        <input type="text" name="jk" id="jk"></br>

        <label for="notelp">No. Telp</label>
        <input type="text" name="notelp" id="notelp"></br>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat"></br>

        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" name="pekerjaan" id="pekerjaan"></br>

        <input type="submit" value="Tambah">
      </form>
      <?php if ($msg): ?>
      <p><?=$msg?></p>
      <?php endif; ?>
    </div>

    <script src="../js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>