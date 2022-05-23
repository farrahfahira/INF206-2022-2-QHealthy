<?php

require '../../config.php';

$_SESSION['no_rm'];

if (isset($_POST['submit'])) {
    $tgl_pemeriksaan = $_POST['Tgl_Pemeriksaan'];
    $newDate = date("Y-m-d", strtotime($tgl_pemeriksaan));
    $jenis_lab = $_POST['Jenis_Lab'];
    $nama_laboran = $_POST['Nama_Laboran'];
    $hasil_lab = $_POST['Hasil_Lab'];

    $query = "INSERT INTO hasil_lab (`No_RM`, `Tgl_Pemeriksaan`, `Jenis_Lab`, `Nama_Laboran`, `Hasil_Lab`) VALUES ('" . $_SESSION['no_rm'] . "', '$newDate', '$jenis_lab', '$nama_laboran', '$hasil_lab')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved!"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Error!"); </script>';
    }
}
