<?php

require '../config.php';

if (isset($_POST['submit'])) {
    $poliklinik = $_POST['Poliklinik'];
    $nama_dokter = $_POST['Nama_Dokter'];
    $periksa = $_POST['Periksa'];
    $diagnosis = $_POST['Diagnosis'];
    $tindakan = $_POST['Tindakan'];
    $obat = $_POST['Obat'];

    $query = "INSERT INTO rekam_medis (`id_rm`, `No_RM`, `Poliklinik`, `Nama_Dokter`, `Periksa`, `Diagnosis`, `Tindakan`, `Obat`) VALUES ('3', '15-08-01', '$poliklinik', '$nama_dokter', '$periksa', '$diagnosis', '$tindakan', '$obat')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved!"); </script>';
        header('Location: ../rekammedis/rm_rujukan.php');
    } else {
        echo '<script> alert("Error!"); </script>';
    }
}
