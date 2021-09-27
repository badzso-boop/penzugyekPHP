<?php

if(isset($_POST["submit"])) {

    //Először lekérjük az adatokat a form-ból
    $bname = $_POST["bname"];
    $bquantity = $_POST["bquantity"];
    $btype = $_POST["btype"];
    $bdate = $_POST["bdate"];
    
    require_once 'dbh.inc.php';
    require_once "functions.inc.php";

    //Üres mezők
    if(emptyInputIncomeAdd($bname, $bquantity, $btype, $bdate) == true) {
        header("location: ../income_add.php?error=emptyinput");
        exit();
    }
    //Rossz megnevezés
    if(badBname($bname) == true) {
        header("location: ../income_add.php?error=wrongbname");
        exit();
    }

    //Rossz mennyiség
    if(badBquantity($bquantity) == true) {
        header("location: ../income_add.php?error=wrongbquantity");
        exit();
    }

    //Rossz típus
    if(badBtype($btype) == true) {
        header("location: ../income_add.php?error=wrongbtype");
        exit();
    }
    
    //Itt már nem lehet hiba a feltöltésben úgyhogy feltöltjük
    income_upload($conn, $bname, $bquantity, $btype, $bdate);
} 
else {
    header("location: ../income_add.php");
    exit();
}