<?php

require '../../config.php';


if (isset($_POST['updatedata2'])) {
    $id = $_POST['update_id2'];

    $tgl_pemeriksaan = $_POST['Tgl_Pemeriksaan'];
    $newDate = date("Y-m-d", strtotime($tgl_pemeriksaan));
    $jenis_lab = $_POST['Jenis_Lab'];
    $nama_laboran = $_POST['Nama_Laboran'];
    $hasil_lab = $_POST['Hasil_Lab'];

    $query = "UPDATE hasil_lab SET Tgl_Pemeriksaan='$newDate', Jenis_Lab='$jenis_lab', Nama_Laboran='$nama_laboran', Hasil_Lab='$hasil_lab' WHERE id_rm='$id'  ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
