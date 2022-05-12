<?php
require '../config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: ../login.php");
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="../css/home.css" />

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
                <li class="tooltip-element" data-tooltip="0">
                    <a href="../daftarpasien/home.php" data-active="0">
                        <div class="icon">
                            <i class="bx bx-notepad"></i>
                            <i class="bx bxs-notepad"></i>
                        </div>
                        <span class="link hide">Daftar Pasien</span>
                    </a>
                </li>
                <li class="active-tab" data-tooltip="1">
                    <a href="rm.php" class="active" data-active="1">
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
                        <h3>Admin</h3>
                        <h5>Fulan</h5>
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

    <main>
        <h1>Rekam Medis</h1>
        </br>
        <hr>

        <div class="data_pasien" style='margin-bottom: 20px'>
            <?php

            $id = $_GET['id'];
            $daftar_pasien = mysqli_query($conn, "SELECT * FROM dftr_pasien WHERE No_RM = '$id'");
            while ($row = mysqli_fetch_array($daftar_pasien)) {
                $no_rm = $row['No_RM'];
                $nama = $row['Nama'];
                $usia = $row['Usia'];
                $jk = $row['Jenis Kelamin'];
                $goldar = $row['Gol Darah'];
                $tb = $row['TB'];
                $bb = $row['BB'];
                $pekerjaan = $row['Pekerjaan'];
                $alamat = $row['Alamat'];
                $no_telp = $row['No Telp'];
            }

            echo "No RM : " . $no_rm;
            echo "<br />";
            echo "Nama : " . $nama;
            echo "<br />";
            echo "Usia : " . $usia;
            echo "<br />";
            echo "Jenis Kelamin : " . $jk;
            echo "<br />";
            echo "Gol. Darah : " . $goldar;
            echo "<br />";
            echo "TB / BB : " . $tb;
            echo " cm / " . $bb;
            echo " kg";
            echo "<br />";
            echo "Pekerjaan : " . $pekerjaan;
            echo "<br />";
            echo "Alamat : " . $alamat;
            echo "<br />";
            echo "No. Telp : " . $no_telp;

            ?>
        </div>

        <table id="tabel_pemeriksaan" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>Tgl Rawat</th>
                    <th>Nama Dokter</th>
                    <th>Periksa</th>
                    <th>Diagnosis</th>
                    <th>Tindakan</th>
                    <th>Obat</th>
                    <th>Poliklinik</th>
                    <th style="width:120px;">Action</p>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $id = $_GET['id'];
                $rekam_medis = mysqli_query($conn, "SELECT * from rekam_medis where No_RM='$id'");
                while ($row = mysqli_fetch_array($rekam_medis)) :
                    echo
                    "<tr>
                    <td>" . $row['Tgl Rawat'] . "</td>
                    <td>" . $row['Nama Dokter'] . "</td>
                    <td>" . $row['Periksa'] . "</td>
                    <td>" . $row['Diagnosis'] . "</td>
                    <td>" . $row['Tindakan'] . "</td>
                    <td>" . $row['Obat'] . "</td>
                    <td>" . $row['Poliklinik'] . "</td>"; ?>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                        </button>
                    </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $('#tabel_pemeriksaan').DataTable();
            });
        </script>





    </main>

    <script src="../js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>