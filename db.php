<?php
$servername="localhost";
$username= "root";
$password= "";
$dbname= "student_admission_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Sorry the connection has been failed !!!". $conn->connect_error);
}
?>