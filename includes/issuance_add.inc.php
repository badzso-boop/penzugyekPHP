<?php
session_start();

if(isset($_POST["submit"])) {

    //Először lekérjük az adatokat a form-ból
    $kname = $_POST["kname"];
    $kquantity = $_POST["kquantity"];
    $ktype = $_POST["ktype"];
    $kdate = $_POST["kdate"];
    $kuid = $_SESSION["userid"];
    
    require_once 'dbh.inc.php';
    require_once "functions.inc.php";

    //Üres mezők
    if(emptyInputIssuanceAdd($kname, $kquantity, $ktype, $kdate) == true) {
        header("location: ../issuance_add.php?error=emptyinput");
        exit();
    }
    //Rossz megnevezés
    if(badKname($kname) == true) {
        header("location: ../issuance_add.php?error=wrongkname");
        exit();
    }

    //Rossz mennyiség
    if(badKquantity($kquantity) == true) {
        header("location: ../issuance_add.php?error=wrongkquantity");
        exit();
    }

    //Be van e lepve a felhasznalo
    if(isset($_SESSION["useruid"]) == false) {
        header("location: ../issuance_add.php?error=login");
        exit();
    }

    //Rossz típus
    if(badKtype($ktype) == true) {
        header("location: ../issuance_add.php?error=wrongktype");
        exit();
    }

    //Itt már nem lehet hiba a feltöltésben úgyhogy feltöltjük
    issuance_upload($conn, $kname, $kquantity, $ktype, $kdate, $kuid);
} 
else {
    header("location: ../issuance_add.php");
    exit();
}