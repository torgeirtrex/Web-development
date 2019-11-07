<?php
if (isset($_POST['bilklasse'])){
	  $bilklasse = $_POST['bilklasse'];
      $fradato = $_POST['fradato'];
      $fratid = $_POST['fratid'];
      $tildato = $_POST['tildato'];
	  $tiltid = $_POST['tiltid'];
	  $fradatotid = "$fradato $fratid";
	  $tildatotid = "$tildato $tiltid";
	  $periode = (strtotime($tildato) - strtotime($fradato))/(60*60*24);
	 	 	
	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "edwardmu", "u4ExES8i");
	mysqli_select_db($tilkobling, "edwardmu");
	mysqli_query($tilkobling, "SET NAMES 'utf8'");

	
		$sql = "SELECT b.id, b.bilnavn AS Bil, b.bilde, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje, b.storbagasje, b.transmisjon, b.aircondition, b.gps, b.dorer, p.pris_ukedag, p.pris_helg, p.pris_hoytid FROM biler b ";
		$sql .= "INNER JOIN bilklasse k ";
		$sql .= "INNER JOIN pris p ";
		$sql .= "ON b.bilklasse = k.bilklasse AND b.bilklasse = p.bilklasse  AND b.bilklasse = '$bilklasse' ";
		$sql .= "WHERE NOT EXISTS (Select * FROM bilbestilling WHERE b.id = bilbestilling.bilid AND bilbestilling.fra < '$fradatotid' AND bilbestilling.til > '$tildatotid')";
	
		$resultat = mysqli_query($tilkobling, $sql);
		$rowcount=mysqli_num_rows($resultat);
		If  ($rowcount == 0){
		echo "<strong>Ingen biler er ledige!</strong><br>Prøv en annen kategori eller en annen dato.";
		} else {
		echo '<div data-role="collapsibleset" id="soekeoversikt" data-content-theme="a" data-iconpos="right" data-theme="a" data-expanded-icon="carat-d" data-collapsed-icon="carat-r" data-inset="false">';
		//Behandle resultatet med PHP og HTML
		 $rowcount=mysqli_num_rows($resultat);
				
		while ( $rad = mysqli_fetch_array($resultat) ) {
			$bilnavn = $rad['Bil'];
			$klassenavn = $rad['Bilklasse'];
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
			$bilid = $rad['id'];
			$totalpris = $prisukedag * $periode;


				echo '<div data-role="collapsible">';
				echo "<h4>$bilnavn <span style='float:right;font-size: small;'>$periode dager - $totalpris poeng</span><br><span class='test2'>$klassenavn</span></h4>";
				echo "<form id='bestillbil' data-ajax='false' method='post' action='#'><input type='button' data-theme='b' name='$bilid' class='bestillknapp', id='bestillknapp' data-inline='true' class='ui-btn ui-btn-b ui-btn-inline ui-corner-all' value='Bestill'></form>";
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
		}
		//steg 4, databasetilkoblingen lukkes
		mysqli_close($tilkobling);

}
?>
