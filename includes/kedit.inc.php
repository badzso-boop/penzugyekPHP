<?php
require_once 'dbh.inc.php';
require_once "functions.inc.php";

$tipus = $_POST['ktipus'];
$megnevezes = $_POST['kmegnevezes'];
$ar = $_POST['kar'];
$datum = $_POST['kdatum'];
$id = $_POST['kid'];

$sql = "UPDATE kiadas SET tipus='$tipus', megnevezes='$megnevezes', mennyiseg='$ar', datum='$datum' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: ../index.php?error=none");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
    header("location: ../index.php?error=sqlerror");
    exit();
}