<?php

require '../config.php';

$_SESSION['id_rm'];

if (isset($_POST['updatedata'])) {
    $tgl_rawat = $_POST['Tgl_Rawat'];
    $newDate = date("Y-m-d", strtotime($tgl_rawat));
    $poliklinik = $_POST['Poliklinik'];
    $nama_dokter = $_POST['Nama_Dokter'];
    $periksa = $_POST['Periksa'];
    $diagnosis = $_POST['Diagnosis'];
    $tindakan = $_POST['Tindakan'];
    $obat = $_POST['Obat'];

    $query = "UPDATE rekam_medis SET Tgl_Rawat='$newDate', Poliklinik='$poliklinik', Nama_Dokter='$nama_dokter', Periksa='$periksa', Diagnosis='$diagnosis', Tindakan='$tindakan', Obat='$obat' WHERE id_rm='" . $_SESSION['id_rm'] . "'  ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
