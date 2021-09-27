<?php
    session_start();
    include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <!--Navigation-->
    <nav>
        <a href="index.php"><h3>Költségvetés</h3></a>
        <div class="menusav">
            <div class="menuelem">
                <a href="income_add.php" class="link">Bevétel Hozzáadása</a>
            </div>
            <div class="menuelem">
                <a href="issuance_add.php" class="link">Kiadás hozzáadása</a>
            </div>
            <div class="menuelem">
                <a href="admin.php" class="link">Admin szerkesztés</a>
            </div>
        </div>
    </nav>
