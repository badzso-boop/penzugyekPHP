<?php
require_once 'dbh.inc.php';
require_once "functions.inc.php";

$kuki = $_COOKIE["kdeleteKuki"];

$sql = "DELETE FROM kiadas WHERE id='$kuki'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}