<?php
include '../connect.php';
global $conn;



$id = $_GET["d_id"];
$status = $_GET["status"];
$q = "UPDATE user_admin set status=$status where d_id=$id";
mysqli_query($conn, $q);
header('location:userAdmin.php');
