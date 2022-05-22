<?php
require '../config.php';
if(empty($_SESSION["id"])){
  header("Location: ../index.php");
}

if(isset($_POST['submit'])){

    $id = $_POST['NoRM'];
    $nama = $_POST["Nama"];
    $usia = $_POST["Usia"];
    $jeniskelamin = $_POST["JenisKelamin"];
    $goldar = $_POST["Gol_Darah"];
    $tb = $_POST["TB"];
    $bb = $_POST["BB"];
    $pekerjaan = $_POST["Pekerjaan"];
    $alamat = $_POST["Alamat"];
    $notelp = $_POST["NoTelp"];

    $sql = "UPDATE daftar_Pasien SET Nama='$nama', Usia='$usia', Jenis_Kelamin ='$jeniskelamin', Gol_Darah='$goldar', TB='$tb', BB='$bb', Pekerjaan='$pekerjaan', Alamat='$alamat', No_Telp='$notelp' WHERE No_RM='$id'";
    $query = mysqli_query($conn, $sql);

    if( $query ) {
        header('Location: home.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}


?>
