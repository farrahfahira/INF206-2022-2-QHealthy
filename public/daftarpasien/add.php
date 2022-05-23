<?php

require '../config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
        $norm = $_POST["NoRM"];
        $nama = $_POST["Nama"];
        $usia = $_POST["Usia"];
        $jeniskelamin = $_POST["JenisKelamin"];
        $goldar = $_POST["GolDarah"];
        $tb = $_POST["TB"];
        $bb = $_POST["BB"];
        $pekerjaan = $_POST["Pekerjaan"];
        $alamat = $_POST["Alamat"];
        $notelp = $_POST["NoTelp"];

        $query = "INSERT INTO daftar_pasien VALUES('0','$norm','$nama','$usia','$jeniskelamin', '$goldar', '$tb', '$bb', '$pekerjaan','$alamat','$notelp')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Data Ditambahkan!'); </script>";
    }
} else {
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QHealthy | Daftar Pasien</title>


    <!-- Javascript library files -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>


    <!--  CSS files -->

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="../css/form.css" />
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
        </div>

        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element">
                    <a href="home.php" class="active" data-active="0">
                        <div class="icon">
                            <i class="bx bx-notepad"></i>
                            <i class="bx bxs-notepad"></i>
                        </div>
                        <span class="link hide">Daftar Pasien</span>
                    </a>
                </li>
                <li class="tooltip-element">
                    <a href="../rekammedis/rm.php" data-active="1">
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
            <div class="admin-user tooltip-element">
                <div class="admin-profile hide">
                    <img src="../assets/foto1.png" alt="" />
                    <div class="admin-info">
                        <?php echo '<h3>' . $row['user'] . '</h3>'; ?>
                        <?php echo '<h5>' . $row['name'] . '</h5>'; ?>
                    </div>
                </div>
                <a class="btn log-out" href="../logout.php">
                    <i class="bx bx-log-out"></i>
                </a>
            </div>
            <div class="tooltip">
                <span class="show">Fulan</span>
                <span>Logout</span>
            </div>
        </div>
    </nav>

    <!-- End Of Sidebar -->
    <main>
        <h1>Daftar Pasien</h1>
        </br>
        <hr>
        <h3>Tambah Data</h3>
        <form class="" action="" method="post" autocomplete="off">
            <label for="NoRM">No RM </label>
            <input type="text" class="field" name="NoRM" placeholder="e.g. 15-01-224" id="NoRM" required value=""> <br>
            <label for="Nama">Nama </label>
            <input type="text" class="field" name="Nama" placeholder="e.g. Syarifah Fathimah Azzahra" id="Nama" required value=""> <br>
            <label for="Usia">Usia </label>
            <input type="number" class="field" name="Usia" id="Usia" min="1" max="100" required value=""> <br>

            <!-- Select -->
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select id="JenisKelamin" name="JenisKelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <!-- End Select -->

            <!-- Select -->
            <label for="GolDarah">Golongan Darah</label>
            <select id="GolDarah" name="GolDarah">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
            <!-- End Select -->

            <label for="TB">Tinggi Badan </label>
            <input type="number" class="field" name="TB" id="TB" min="1" max="500" required value=""> <br>
            <label for="BB">Berat Badan </label>
            <input type="number" class="field" name="BB" id="BB" min="1" max="500" required value=""> <br>

            <label for="Pekerjaan">Pekerjaan </label>
            <input type="text" class="field" name="Pekerjaan" placeholder="e.g. Buruh" id="Perkerjaan" required value=""> <br>
            <label for="Alamat">Alamat </label>
            <input type="text" class="field" name="Alamat" placeholder="e.g. jl. Fulannah No.22, Perumahan Baroe, Banda Aceh" id="Alamat" required value=""> <br>
            <label for="NoTelp">No. Telp </label>
            <input type="text" class="field" name="NoTelp" placeholder="e.g. 08980017xxxx" id="NoTelp" required value=""> <br>
            <button type="submit" name="submit">Tambah</button>
        </form>
        </br>
    </main>

    <script src="../js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>