<?php

require '../config.php';

$_SESSION['id_rm'];

if (isset($_POST['deletedata'])) {
    $query = "DELETE FROM rekam_medis WHERE id_rm='" . $_SESSION['id_rm'] . "'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
