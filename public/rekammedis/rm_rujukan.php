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

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>


    <!--  CSS files -->

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <link rel="stylesheet" href="../css/hasilperiksa.css" />

</head>

<body>
    <nav>
        <div class="sidebar-top">
            <img src="../assets/logo.png" class="logo" alt="" />
            <h3 class="hide">QHealthy</h3>
        </div>

        <div class="search">
            <i class="bx bx-search"></i>
            <input type="text" class="hide" placeholder="Quick Search ..." />
        </div>

        <div class="sidebar-links">
            <ul>
                <li class="tooltip-element">
                    <a href="../daftarpasien/home.php" data-active="0">
                        <div class="icon">
                            <i class="bx bx-notepad"></i>
                            <i class="bx bxs-notepad"></i>
                        </div>
                        <span class="link hide">Daftar Pasien</span>
                    </a>
                </li>

                <li class="navbar-active-tab">
                    <a href="../rekammedis/rm.php" class="active" data-active="1">
                        <div class="icon-navbar">
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
                <!--sebelumnya ada data-tooltip="1"-->
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

        <!-- Modal Pop Up Insert Data -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rekam Medis (Hasil Pemeriksaan) - Input</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="../rekammedis/insert_data_rm.php" method="POST">


                            <div class="mb-3">
                                <label for="" class="tanggal-rawat">Tanggal Rawat</label>
                                <input type="date" class="form-control" name="Tgl_Rawat">
                            </div>
                            <div class="mb-3">
                                <label>Poliklinik</label>
                                <select class="form-select" name="Poliklinik">
                                    <option selected>Umum</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Demam">Demam</option>
                                    <option value="Penyakit Dalam">Penyakit Dalam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Nama Dokter</label>
                                <input type="text" class="form-control" name="Nama_Dokter">
                            </div>
                            <div class="mb-3">
                                <label>Periksa</label>
                                <textarea class="form-control" name="Periksa" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Diagnosis</label>
                                <textarea class="form-control" name="Diagnosis" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Tindakan</label>
                                <textarea class="form-control" name="Tindakan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Obat</label>
                                <textarea class="form-control" name="Obat" rows="3"></textarea>
                            </div>
                            <button type="reset" class="btn btn-danger">Clear</button>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Pop Up Insert Data -->

        <!-- Modal Pop Up Edit Data -->
        <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rekam Medis (Hasil Pemeriksaan) - Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="../rekammedis/updatedata.php" method="POST">

                            <input type="hidden" name="update_id" id="update_id">

                            <?php

                            $id = $_GET['id'];
                            $daftar_pasien = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE No_RM = '$id'");
                            while ($row = mysqli_fetch_array($daftar_pasien)) {
                                $id_rm = $row['id_rm'];
                                $_SESSION['id_rm'] = $id_rm;
                            }

                            ?>
                            <div class="mb-3">
                                <label for="" class="tanggal-rawat">Tanggal Rawat</label>
                                <input type="date" class="form-control" name="Tgl_Rawat" id="Tgl_Rawat">
                            </div>
                            <div class="mb-3">
                                <label>Poliklinik</label>
                                <select class="form-select" name="Poliklinik" id="Poliklinik">
                                    <option selected>Umum</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Demam">Demam</option>
                                    <option value="Penyakit Dalam">Penyakit Dalam</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Nama Dokter</label>
                                <input type="text" class="form-control" name="Nama_Dokter" id="Nama_Dokter">
                            </div>
                            <div class="mb-3">
                                <label>Periksa</label>
                                <textarea class="form-control" name="Periksa" id="Periksa" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Diagnosis</label>
                                <textarea class="form-control" name="Diagnosis" id="Diagnosis" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Tindakan</label>
                                <textarea class="form-control" name="Tindakan" id="Tindakan" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Obat</label>
                                <textarea class="form-control" name="Obat" id="Obat" rows="3"></textarea>
                            </div>

                            <button type="reset" class="btn btn-danger">Clear</button>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="updatedata" class="btn btn-success">Update Data</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Pop Up Edit Data -->

        <!-- Modal Pop Up Delete Data -->
        <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rekam Medis (Hasil Pemeriksaan) - Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="../rekammedis/deletedata.php" method="POST">

                            <?php

                            $id = $_GET['id'];
                            $daftar_pasien = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE No_RM = '$id'");
                            while ($row = mysqli_fetch_array($daftar_pasien)) {
                                $id_rm = $row['id_rm'];
                                $_SESSION['id_rm'] = $id_rm;
                            }

                            ?>

                            <h4>Apakah Anda yakin ingin menghapus data ini?</h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="deletedata" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Pop Up Delete Data -->

        <!-- Modal Pop Up View Data -->
        <div class="modal fade" id="viewmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Rekam Medis (Hasil Pemeriksaan) - View</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <form action="../rekammedis/deletedata.php" method="POST">

                            <h2>Hasil Pemeriksaan</h2>
                            <hr>

                            <?php

                            $id = $_GET['id'];
                            $daftar_pasien = mysqli_query($conn, "SELECT * FROM rekam_medis WHERE No_RM = '$id'");
                            while ($row = mysqli_fetch_array($daftar_pasien)) {
                                $id_rm = $row['id_rm'];
                                $_SESSION['id_rm'] = $id_rm;
                                $tgl_rawat = $row['Tgl_Rawat'];
                                $poliklinik = $row['Poliklinik'];
                                $nama_dokter  = $row['Nama_Dokter'];
                                $periksa = $row['Periksa'];
                                $diagnosis = $row['Diagnosis'];
                                $tindakan = $row['Tindakan'];
                                $obat = $row['Obat'];
                            }

                            echo "<b>Tanggal Rawat           : </b>" . $tgl_rawat;
                            echo "<br />";
                            echo "<b>Poliklinik              : </b>" . $poliklinik;
                            echo "<br />";
                            echo "<b>Nama Dokter             : </b>" . $nama_dokter;
                            echo "<br />";
                            echo "<b>Hasil Pemeriksaan       : </b>" . $periksa;
                            echo "<br />";
                            echo "<b>Diagnosis : </b>" . $diagnosis;
                            echo "<br />";
                            echo "<b>Tindakan yang diberikan : </b>" . $tindakan;
                            echo "<br />";
                            echo "<b>Obat yang diresepkan    : </b>" . $obat;
                            echo "<br />";
                            echo "<br />";

                            ?>

                            <div class="modal-footer">
                                <button onclick="window.print()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Print</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Pop Up View Data -->

        <div class="card text">
            <div class=" card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="Hasil Pemeriksaan" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Hasil Pemeriksaan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Hasil Laboratorium" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Hasil Laboratorium</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    
                    <!-- hasil Pemeriksaan -->
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        <div class="data_pasien" style='margin-bottom: 20px; margin-left: 15px;'>

                            <?php

                            $id = $_GET['id'];
                            $daftar_pasien = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE No_RM = '$id'");
                            while ($row = mysqli_fetch_array($daftar_pasien)) {
                                $no_rm = $row['No_RM'];
                                $_SESSION['no_rm'] = $no_rm;
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

                        <div class="container">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add Data
                            </button>
                        </div>

                        <!-- tabel hasil pemeriksaan -->
                        <div class="container" style="margin-left: 10px;">
                            <table id="tabel_pemeriksaan" class="ui celled table" style="width:100%; text-align: center;">
                                <thead>
                                    <tr>
                                        <th colspan="8">Riwayat Hasil Pemeriksaan</th>
                                    </tr>
                                    <tr>
                                        <th>Tgl Rawat</th>
                                        <th>Poliklinik</th>
                                        <th>Nama Dokter</th>
                                        <th>Periksa</th>
                                        <th>Diagnosis</th>
                                        <th>Tindakan</th>
                                        <th>Obat</th>
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
                                        <td>" . $row['Tgl_Rawat'] . "</td>
                                        <td>" . $row['Poliklinik'] . "</td>
                                        <td>" . $row['Nama_Dokter'] . "</td>
                                        <td>" . $row['Periksa'] . "</td>
                                        <td>" . $row['Diagnosis'] . "</td>
                                        <td>" . $row['Tindakan'] . "</td>
                                        <td>" . $row['Obat'] . "</td>"; ?>

                                        <td style="text-align: center;">

                                            <button type="button" class="btn btn-secondary viewbtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </button>
                                            <button type="button" class="btn btn-success editbtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn btn-danger deletebtn">
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
                        </div>
                    </div>
                    <!-- end  hasil pemeriksaan -->

                    <!-- hasil laboratorium-->
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="data_pasien" style='margin-bottom: 20px; margin-left: 15px;'>
                            <?php

                            $id = $_GET['id'];
                            $daftar_pasien = mysqli_query($conn, "SELECT * FROM daftar_pasien WHERE No_RM = '$id'");
                            while ($row = mysqli_fetch_array($daftar_pasien)) {
                                $no_rm = $row['No_RM'];
                                $_SESSION['no_rm'] = $no_rm;
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

                        <div class="container">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Add Data
                            </button>
                        </div>
                        
                        <!-- tabel hasil lab-->
                        <div class="container" style="margin-left: 10px;">
                            <table id="tabel_hasil_lab" class="ui celled table" style="width:100%; text-align: center;">
                                <thead>
                                    <tr>
                                        <th colspan="8">Hasil Pemeriksaan Laboratorium</th>
                                    </tr>
                                    <tr>
                                        <th>Tgl Pemeriksaan</th>
                                        <th>Jenis Laboratorium</th>
                                        <th>Nama Laboran</th>
                                        <th>Hasil Laboratorium</th>
                                        <th style="width:120px;">Action</p>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $id = $_GET['id'];
                                    $hasil_lab = mysqli_query($conn, "SELECT * from hasil_lab where No_RM='$id'");
                                    while ($row = mysqli_fetch_array($hasil_lab)) :
                                        echo
                                        "<tr>
                                        <td>" . $row['Tgl_Pemeriksaan'] . "</td>
                                        <td>" . $row['Jenis_Lab'] . "</td>
                                        <td>" . $row['Nama_Laboran'] . "</td>
                                        <td>" . $row['Hasil_Lab'] . "</td> "; ?>

                                        <td style="text-align: center;">

                                            <button type="button" class="btn btn-secondary viewbtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </button>
                                            <button type="button" class="btn btn-success editbtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                </svg>
                                            </button>
                                            <button type="button" class="btn btn-danger deletebtn">
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
                                    $('#tabel_hasil_lab').DataTable();
                                });
                            </script>
                        </div>

                        <!-- end tabel hasil laboratorium -->

                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $('.viewbtn').on('click', function() {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function(response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#Tgl_Rawat').val(data[0]);
                $('#Poliklinik').val(data[1]);
                $('#Nama_Dokter').val(data[2]);
                $('#Periksa').val(data[3]);
                $('#Diagnosis').val(data[4]);
                $('#Tindakan').val(data[5]);
                $('#Obat').val(data[6]);

            });
        });
    </script>



</body>

</html>