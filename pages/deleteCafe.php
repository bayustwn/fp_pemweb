<?php
include "../db/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cafe WHERE id = '$id'";

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