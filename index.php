<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

    <h2>PHP Form Validation Example</h2>
    <form action='<?php echo htmlspecialchars('process.php');?>' method="post">
        Voornaam: <input type="text" name="voornaam" maxlength="25" placeholder="Henk">
        <br><br>
        Achternaam: <input type="text" name="achternaam" maxlength="128" placeholder="Henkie">
        <br><br>
        Straat: <input type="text" name="straat" maxlength="48" placeholder="Henkiestraat">
        Huisnummer: <input type="number" name="huisnummer" placeholder="10">
        <br><br>
        Postcode: <input type="number" name="postcode" placeholder="1500">
        <input type="text" name="postcode1" maxlength="2" placeholder="AA">
        <br><br>
        Woonplaats: <input type="text" name="woonplaats" maxlength="24" placeholder="Amsterdam">
        <br><br>
        E-mail: <input type="email" name="email" maxlength="254" placeholder="voorbeeld@voorbeeld.nl">
        <br><br>
        Mobiele Nummer: <input name="telefoonnummer" type="tel" placeholder="0612345678">
        <br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>