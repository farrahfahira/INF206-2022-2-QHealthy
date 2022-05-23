<?php
require '../config.php';
if(empty($_SESSION["id"])){
  header("Location: ../index.php");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM daftar_pasien WHERE No_RM = '$id'";
    $query = mysqli_query($conn, $sql);

    if($query) {
        header('Location: home.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang");
}

?>
