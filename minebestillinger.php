<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      
	   <link rel="stylesheet" href="css/styles.css" />
</head>
<body>

<h1>Bilklubbens ledige biler</h1>

<?php
//Steg 1: Tilkobling og valg av database
$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
mysqli_select_db($tilkobling, "torgekro");
//Steg 2: Kjør en SQL-spørring mot databasen
$sql = "SELECT * FROM BKCars";
$resultat = mysqli_query($tilkobling, $sql);
//Steg 3: Behandle resultatet med PHP og HTML
while ( $rad = mysqli_fetch_array($resultat) ) {

$Bilnummer = $rad['CarID'];
$Bilnavn = $rad['CarName'];
$Bilmodell = $rad['CarModel'];
$Baggasjekapasitet = $rad['LuggageCapacityLitres'];
$Antallseter = $rad['NumberOfSeats'];
$Ekstrautstyr = $rad['ExtraGear'];

echo "<ul>";
echo "<li>Bil nummer: $Bilnummer</li>"; 
echo "<li>Navn: $Bilnavn</li>";
echo "<li>Modell: $Bilmodell</li>";
echo "<li>Baggasjekapasitet: $Baggasjekapasitet</li>";
echo "<li>Antall seter: $Antallseter</li>";
echo "<li>Annet ekstrautstyr: $Ekstrautstyr</li>";

echo "</ul>";
echo "<hr />";
}
//steg 4, databasetilkoblingen lukkes
mysqli_close($tilkobling);
?>

<!-- <a href=Bestillingsskjema.html >Gå til bestilling av en bil</a> -->
</body>
</html>