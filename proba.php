<?php
/*
$servername = "localhost";
$username = "norbi";
$password = "Vanillia04";
$dbname = "koltsegvetes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$uid = 0;
$tipus = 'wolt';
$megnevezes = '12 ora munka';
$mennyiseg = 25000;
$datum = '20210923';
$sql = "INSERT INTO koltsegvetes2 (uid, tipus, megnevezes, mennyiseg, datum) VALUES ('$uid', '$tipus', '$megnevezes', '$mennyiseg', '$datum')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/
echo $_COOKIE["keditKuki"];
?>