<?php

$servername = "localhost";
$dbUsername = "norbi";
$dbPassword = "Vanillia04";
$dbName = "koltsegvetes";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }