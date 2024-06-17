<?php
include "../db/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cafe WHERE id = '$id'";

    $delete_komentar = "DELETE FROM komentar WHERE cafe = '$id'";
    $res = $conn->query($delete_komentar);

    if ($conn->query($sql) === TRUE) {
        header("Location: cafeAtmin.php");
        exit();
    } else {
        
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {

    echo "ID kafe tidak ditemukan.";
}

$conn->close();
?>