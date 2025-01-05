<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Student WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: disp.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>