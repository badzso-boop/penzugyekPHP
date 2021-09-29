<?php
require_once 'dbh.inc.php';
require_once "functions.inc.php";

$kuki = $_COOKIE["keditKuki"];
$adatok = explode(",", $kuki);

$sql = "UPDATE kiadas SET tipus='$adatok[0]', megnevezes='$adatok[1]', mennyiseg='$adatok[2]', datum='$adatok[3]' WHERE id='$adatok[4]'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}