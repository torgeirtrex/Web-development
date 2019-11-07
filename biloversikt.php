<?php
if (isset($_POST['klasse'])){
	$klasse = $_POST['klasse']; //lager vedien av meldingen
	$dato = date("Y-m-d h:i"); //gir dato og tid på følgende format: 2016-09-30 12:09
	
	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
	mysqli_select_db($tilkobling, "torgekro");
	mysqli_query($tilkobling, "SET NAMES 'utf8'");

		$sql = "SELECT b.Bilnavn AS Bil, b. bilde, b.bilklasse, k.klassenavn, b.antallseter AS Seter, b.litenbagasje, b.storbagasje, b.transmisjon, b.aircondition, b.gps, b.dorer, p.pris_ukedag, p.pris_helg, p.pris_hoytid FROM biler b ";
		$sql .= "INNER JOIN bilklasse k ";
		$sql .= "INNER JOIN pris p ";
		$sql .= "ON b.bilklasse=k.bilklasse AND b.bilklasse = p.bilklasse  ";
		$sql .= "ORDER BY bilklasse";
		//$sql .= "WHERE b.bilklasse = '$bilklasse'";

$resultat = mysqli_query($tilkobling, $sql);
		echo '<div data-role="collapsibleset" data-content-theme="a" data-iconpos="right" data-theme="a" data-expanded-icon="carat-d" data-collapsed-icon="carat-r" data-inset="false">';


//Behandle resultatet med PHP og HTML
		while ( $rad = mysqli_fetch_array($resultat) ) {
			$bilnavn = $rad['Bil'];
			$klassenavn = $rad['klassenavn'];
			$antallseter = $rad['Seter'];
			$antalldorer = $rad['dorer'];
			$bilde = $rad['bilde'];
			$aircondition = $rad['aircondition'];
			$bag = $rad['litenbagasje'];
			$koffert = $rad['storbagasje'];
			$transmisjon = $rad['transmisjon'];
			$gps = $rad['gps'];
			$prisukedag = $rad['pris_ukedag'];
			$prishelg = $rad['pris_helg'];
			$prishoytid = $rad['pris_hoytid'];

		echo '<div data-role="collapsible">';
				echo "<h4>$bilnavn<br><span class='test2'>$klassenavn</span></h4>";
				echo "<p><strong>Leiepriser:</strong><br>";
				echo "Hverdag: $prisukedag poeng<br>";
				echo "Helg:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$prishelg poeng<br>";
				echo "Høytid:&nbsp;&nbsp;$prishoytid poeng</p>"; 
				echo "<figure><img src='icons/seats.png' alt='Antall seter' width='32'><figcaption>$antallseter</figcaption></figure>";
				echo "<figure><img src='icons/door.png' alt='Gir' width='28'><figcaption>$antalldorer</figcaption></figure>";				
				echo "<figure><img src='icons/gir.png' alt='Gir' width='28'><figcaption>$transmisjon</figcaption></figure>";
				echo "<figure><img src='icons/ac2.png' alt='Aircondition' width='28'><figcaption>$aircondition</figcaption></figure>";
				echo "<figure><img src='icons/gps.png' alt='GPS' width='28'><figcaption>$gps</figcaption></figure>";
				echo "<figure><img src='icons/sportsbag.png' alt='Sprtsbag' width='28'><figcaption>$bag</figcaption></figure>";
				echo "<figure><img src='icons/koffert.png' alt='Gir' width='28'><figcaption>$koffert</figcaption></figure>";
				echo "<img src='$bilde' width='90%'>";
			echo "</div>";
		}
		echo "</div>";

		//steg 4, databasetilkoblingen lukkes
		mysqli_close($tilkobling);

}
?>
