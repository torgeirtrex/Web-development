<h1>Bestilling av bil utført. Vi sender deg tilbake til hovedmenyen</h1>
<?php
$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
mysqli_select_db($tilkobling, "torgekro");

$sendepostadresse = $_POST['epostadresse'];
$sendstartdato = $_POST['startdato'];
$sendleveringsdato = $_POST['leveringsdato'];
$sendbil = $_POST['bil'];
$poeng = '100';


$sql = "INSERT INTO BKCars_Rental";
$sql .= " (CustomerEmail, FromDate, ToDate, CarId, Points)";
$sql .= " VALUES ";
$sql .= " ('$sendepostadresse', '$sendstartdato', '$sendleveringsdato', '$sendbil', '$poeng')";
//echo $sql; //skriver ut spørringen, kan med fordel fjernes hvis alt fungerer
//$resultat = mysqli_query($tilkobling, $sql);
echo "Skjemaet er sendt inn";

/*
//Kjører en SQL spørring mot databasen
$sql = "SELECT * FROM nyheter";
$resultat = mysqli_query($tilkobling, $sql);

//Behandler resutatet med PHP og HTML
if ($resultat) {
	echo "Du har laget innlegg:";//
    while ($rad = mysqli_fetch_array($resultat) ) {
        $tittel = $rad['overskrift'];
        $forfatter = $rad['forfatter'];
        $tekst = $rad['nyhet'];
        $dato = $rad['dato'];

        echo "<ul>";
        echo "<li>$forfatter</li>";
        echo "<li>$tittel</li>";
        echo "<li>$tekst</li>";
        echo "<li>$dato</li>";
        echo "</ul>";
        echo "<hr />";
    }
} else {
    die(mysqli_error());
}
*/

//Lukker tilkoblingen til databasen
mysqli_close($tilkobling);


?>
        <meta http-equiv="refresh" content="4;url=http://stud.iie.ntnu.no/~torgekro/wtr/E/#hjem" />
    <body>
        <h1>Trykk oppdater-knappen om bestillingen tar tid</h1>
    </body>

