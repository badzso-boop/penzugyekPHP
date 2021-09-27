<?php

$uid = 0;

//Ellenőrzés üres mezőkre
function emptyInputIncomeAdd($bname, $bquantity, $btype, $bdate) {
    $result;
    if(empty($bname) ||empty($bquantity) ||empty($btype) || empty($bdate)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Ellenőrzés rossz megnevezésre
function badBname($bname) {
    $result;
    if(!preg_match("/^[a-zA-z0-9]*$/", $bname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Ellenörzés rossz mennyiségre
function badBquantity($bquantity) {
    $result;
    if($bquantity <= 0) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Ellenörzés rossz típusra
function badBtype($btype) {
    $result;
    if(!$btype == "wolt" || !$btype == "program" ||!$btype == "wordpress" ||!$btype == "zsebpenz" || !$btype == "egyeb") {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Bevétel feltöltés
function income_upload($conn, $bname, $bquantity, $btype, $bdate) {
    $sql = "INSERT INTO bevetelek (uid, tipus, megnevezes, mennyiseg, datum) VALUES ('$uid', '$btype', '$bname', '$bquantity', '$bdate')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header("location: ../index.php?error=none");
    exit();
}

/*----------------------Kiadás----------------------------------------------------------------------------------------------------------------------------------*/

//Ellenőrzés üres mezőkre
function emptyInputIssuanceAdd($kname, $kquantity, $ktype, $kdate) {
    $result;
    if(empty($kname) ||empty($kquantity) ||empty($ktype) || empty($kdate)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
//Ellenőrzés rossz megnevezésre
function badKname($kname) {
    $result;
    if(!preg_match("/^[a-zA-z0-9]/", $kname)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Ellenörzés rossz mennyiségre
function badKquantity($kquantity) {
    $result;
    if($kquantity <= 0) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Ellenörzés rossz típusra
function badKtype($ktype) {
    $result;
    if(!$ktype == "bevasarlas" || !$ktype == "csekkek" ||!$ktype == "telefonszamla" ||!$ktype == "tankolas" || !$ktype == "szorakozas"|| !$ktype == "zsebpenz"|| !$ktype == "egyeb") {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//Kiadás feltöltés
function issuance_upload($conn, $kname, $kquantity, $ktype, $kdate) {
    $sql = "INSERT INTO kiadas (uid, tipus, megnevezes, mennyiseg, datum) VALUES ('$uid', '$ktype', '$kname', '$kquantity', '$kdate')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header("location: ../index.php?error=none");
    exit();
}