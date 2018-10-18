<?php
/**
 * Created by IntelliJ IDEA.
 * User: joelt
 * Date: 12/10/2018
 * Time: 12:17
 */
require ('private/connection.php');


//Variabelen Declareren
$vNaam = filter_var($_POST['voornaam'], FILTER_SANITIZE_STRING);
$aNaam = filter_var($_POST['achternaam'], FILTER_SANITIZE_STRING);
$straat = filter_var($_POST['straat'], FILTER_SANITIZE_STRING);
$huisnummer = filter_var($_POST['huisnummer'], FILTER_SANITIZE_NUMBER_INT);
$postcodeCijfer = filter_var($_POST['postcode'], FILTER_SANITIZE_NUMBER_INT);
$postcodeLetter = filter_var($_POST['postcode1'], FILTER_SANITIZE_STRING);
$woonplaats = filter_var($_POST['woonplaats'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefoonNummer = filter_var($_POST['telefoonnummer'], FILTER_SANITIZE_NUMBER_INT);


// Voornaam valideren van aanwezigheid
if ($vNaam && !empty($vNaam) && $vNaam != '' && strlen($vNaam) != 0) {
    //Checken of het kleiner is dan 25
    if (strlen($vNaam) <= 25) {
        $vNaam1 = $vNaam;
    } else {
        echo 'Je hebt een te lange voornaam ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je voornaam ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

// Achternaam valideren van aanwezigheid
if ($aNaam && !empty($aNaam) && $aNaam != '' && strlen($aNaam) != 0) {
    //Checken of het kleiner is dan 128
    if (strlen($aNaam) <= 128) {
        $aNaam1 = $aNaam;
    } else {
        echo 'Je hebt een te lange achternaam ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je achternaam ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

// Straat valideren van aanwezigheid
if ($straat && !empty($straat) && $straat != '' && strlen($straat) != 0) {
    //Checken of het kleiner is dan 48
    if (strlen($aNaam) <= 48) {
        $straat1 = $straat;
    } else {
        echo 'Je hebt een te lange straatnaam ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je straatnaam ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

// Huisnummer valideren van aanwezigheid
if ($huisnummer && !empty($huisnummer) && $huisnummer != '' && settype($huisnummer, "integer") && intval($huisnummer) && gettype($huisnummer) == 'integer' && is_int($huisnummer) ) {
    //Checken of het kleiner is dan 1500
    if ($huisnummer <= 1500) {
        $huisnummer1 = $huisnummer;
    } else {
        echo 'Je hebt een te lange Huisnummer (boven de 1500) ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je huisnummer ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

// Postcode valideren van aanwezigheid
    //Postcode cijfers valideren van aanwezigheid
    if ($postcodeCijfer && !empty($postcodeCijfer) && $postcodeCijfer != '' ) {
        //Checken of het wel cijfers bevat
        if (settype($postcodeCijfer, "integer") && intval($postcodeCijfer) && gettype($postcodeCijfer) == 'integer' && is_int($postcodeCijfer)) {
            //Checken of het tussen de 1000 en 9999 is
            if ($postcodeCijfer >= 1000 && $postcodeCijfer <= 9999) {
                //Postcode letters valideren van aanwezigheid
                if ($postcodeLetter && !empty($postcodeLetter) && $postcodeLetter != '' && strlen($postcodeLetter) != 0) {
                    //Checken het precies 2 letters bevat
                    if (strlen($postcodeLetter) == 2) {
                        //Checken de Postcode letters ook echt letters zijn
                        if (!preg_match('~[0-9]+~', $postcodeLetter)) {
                            $postcodeCijferString = "$postcodeCijfer";
                            $postcode = $postcodeCijferString . $postcodeLetter;
                        } else {
                            echo 'Je 2 Postcode "Letters" zijn cijfers ipv Letters. Probeer het opnieuw';
                            echo '<br> <a href="index.php">Terug</a>';
                            exit();
                        }
                    } else {
                        echo 'Je hebt te weinig of teveel letters ingetypt in je Postcode. Probeer het opnieuw';
                        echo '<br> <a href="index.php">Terug</a>';
                        exit();
                    }
                } else {
                    echo 'Je hebt niet de letters ingetypt van je Postcode. Probeer het opnieuw';
                    echo '<br> <a href="index.php">Terug</a>';
                    exit();
                }
            } else {
                echo 'Je Postcode cijfers zitten niet tussen de 1000 en 9999. Probeer het opnieuw';
                echo '<br> <a href="index.php">Terug</a>';
                exit();
            }
        } else {
            echo 'Je 2 Postcode "Cijfers" zijn letters ipv Cijfers. Probeer het opnieuw';
            echo '<br> <a href="index.php">Terug</a>';
            exit();
        }
    } else {
        echo 'Je hebt geen Postcode ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }



// Woonplaats valideren van aanwezigheid
if ($woonplaats && !empty($woonplaats) && $woonplaats != '' && strlen($woonplaats) != 0) {
    //Checken of het kleiner is dan 24
    if (strlen($woonplaats) <= 24) {
        $woonplaats1 = $woonplaats;
    } else {
        echo 'Je hebt een te lange woonplaats ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je woonplaats ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

// Email valideren van aanwezigheid
if ($email && !empty($email) && $email != '' && strlen($woonplaats) != 0) {
    //Checken of het echt een email is
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Checken of het kleiner is dan 24
        if (strlen($email) <= 254) {
            $email1 = $email;
        } else {
            echo 'Je hebt een te lange email ingetypt. Probeer het opnieuw';
            echo '<br> <a href="index.php">Terug</a>';
            exit();
        }
    }
    else {
        echo 'Je hebt geen geldige email ingetypt. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je email ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

//Telefoonnummer valideren van aanwezigheid
if ($telefoonNummer && !empty($postcodeCijfer) && $postcodeCijfer != '' ) {
    //Checken of het wel cijfers bevat
    if (settype($telefoonNummer, "integer") && intval($telefoonNummer) && gettype($telefoonNummer) == 'integer' && is_int($telefoonNummer)) {
        //Checken of de eerste cijfer een nul is
        if (substr($telefoonNummer, -3, 1) == 0) {
            //Checken het precies 10 cijfers bevat
            if (strlen($telefoonNummer) == 9) {
                $telefoonNummer1 = $telefoonNummer;
            } else {
                echo 'Je hebt te weinig of teveel cijfers gebruikt. Probeer het opnieuw.';
                echo '<br> <a href="index.php">Terug</a>';
                exit();
            }
        } else {
            echo 'Je telefoonnummer begint niet met de cijfer "0". Probeer het opnieuw';
            echo '<br> <a href="index.php">Terug</a>';
            exit();
        }
    } else {
        echo 'De telefoonnummer bevat letters. Probeer het opnieuw';
        echo '<br> <a href="index.php">Terug</a>';
        exit();
    }
} else {
    echo 'Je hebt niet je telefoonnummer ingetypt. Probeer het opnieuw';
    echo '<br> <a href="index.php">Terug</a>';
    exit();
}

//Gegevens toevoegen in database
$query = "INSERT INTO validate VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query)  or die ("Error preparing");
$stmt->bind_param('sssisssi', $vNaam1, $aNaam1, $straat1, $huisnummer1, $postcode, $woonplaats1, $email1, $telefoonNummer1)  or die ("Error bind3");
$result = $stmt->execute() or die ('Error inserting user.');
echo 'Het is gelukt!';



