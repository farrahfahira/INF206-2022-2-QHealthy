<?php

require '../../config.php';


if (isset($_POST['deletedata'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM rekam_medis WHERE id_rm='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted"); </script>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}
