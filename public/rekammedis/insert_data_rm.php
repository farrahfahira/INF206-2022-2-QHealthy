<?php

require '../config.php';

$_SESSION['no_rm'];

if (isset($_POST['submit'])) {
    $tgl_rawat = $_POST['Tgl_Rawat'];
    $newDate = date("Y-m-d", strtotime($tgl_rawat));
    $poliklinik = $_POST['Poliklinik'];
    $nama_dokter = $_POST['Nama_Dokter'];
    $periksa = $_POST['Periksa'];
    $diagnosis = $_POST['Diagnosis'];
    $tindakan = $_POST['Tindakan'];
    $obat = $_POST['Obat'];


    $query = "INSERT INTO rekam_medis (`No_RM`, `Tgl_Rawat`, `Poliklinik`, `Nama_Dokter`, `Periksa`, `Diagnosis`, `Tindakan`, `Obat`) VALUES ('" . $_SESSION['no_rm'] . "', '$newDate', '$poliklinik', '$nama_dokter', '$periksa', '$diagnosis', '$tindakan', '$obat')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved!"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Error!"); </script>';
    }
}
