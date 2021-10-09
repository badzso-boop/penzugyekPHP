<?php
/*-----------------Bevételek------------------------------------------------*/
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
function income_upload($conn, $bname, $bquantity, $btype, $bdate, $buid) {
    $sql = "INSERT INTO bevetelek (uid, tipus, megnevezes, mennyiseg, datum) VALUES ('$buid', '$btype', '$bname', '$bquantity', '$bdate')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header("location: ../index.php?error=none");
    exit();
}

function userLoggedIn($buid) {
    $result;
    if($buid < 1) {
        $result = false;
    } else {
        $result = true;
    }
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
function issuance_upload($conn, $kname, $kquantity, $ktype, $kdate, $kuid) {
    if($kuid < 1)
    {
        $kuid = -1;
    }
    $sql = "INSERT INTO kiadas (uid, tipus, megnevezes, mennyiseg, datum) VALUES ('$kuid', '$ktype', '$kname', '$kquantity', '$kdate')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header("location: ../index.php?error=none");
    exit();
}

/*------------------------------------Regisztracio--------------------------------------------------------*/

// Check for empty input signup
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function uidExists($conn, $username) {
  $sql = "SELECT * FROM felhasznalok WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Az adatok beszúrása az adatbázisba
function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO felhasznalok (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../signup.php?error=none");
	exit();
}

/*-----------------------------Belépés----------------------------------*/
// Ellenorizzuk le az ures mezoket
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Belépés a weboldalra
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		header("location: ../index.php?error=none");
		exit();
	}
}