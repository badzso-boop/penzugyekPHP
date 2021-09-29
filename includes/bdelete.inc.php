<?php
require_once 'dbh.inc.php';
require_once "functions.inc.php";

$kuki = $_COOKIE["bdeleteKuki"];

$sql = "DELETE FROM bevetelek WHERE id='$kuki'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}