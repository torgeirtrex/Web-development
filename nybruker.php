<?php
if (isset($_POST['fornavn'],$_POST['etternavn'], $_POST['adresse'], $_POST['postnr'], $_POST['poststed'], $_POST['land'], $_POST['telefon'], $_POST['mobiltelefon'], $_POST['epost'], $_POST['passord'])){
	//lagrer data for skjema
	$fornavn = $_POST['fornavn']; 
	$etternavn = $_POST['etternavn'];
	$adresse = $_POST['adresse'];
	$postnr = $_POST['postnr'];
	$poststed = $_POST['poststed'];
	$land = $_POST['land'];
	$telefon = $_POST['telefon'];
	$mobiltelefon = $_POST['mobiltelefon'];
	$epost = $_POST['epost'];
	$kundetype = '1';
	$poengsaldo = '500';
	$passord = $_POST['passord'];

	$dato = date("Y-m-d h:i"); //gir dato og tid på følgende format: 2016-09-30 12:09

	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
	mysqli_select_db($tilkobling, "torgekro");

	//Sjekker om kunde finnes i databasen
	$sql = "SELECT * FROM kunder WHERE epost = '$epost'";
	$resultat = mysqli_query($tilkobling, $sql);
	
	//legger inn ny kunde om den ikke finnes
	if (mysqli_num_rows($resultat)==0) {  //Dersom det ikke returneres noen rader så finnes ikke brukeren
	$sql = "INSERT INTO kunder"; //tabell som data skal legges inn i
	$sql .= " (fornavn, etternavn, adresse, postnr, poststed, land, telefon, mobiltelefon, epost, kundetype, poengsaldo, passord)"; //hvilke kolonner som data skal legges inn i
	$sql .= " VALUES ";
	$sql .= " ('$fornavn', '$etternavn', '$adresse', '$postnr', '$poststed', '$land', '$telefon', '$mobiltelefon', '$epost', '$kundetype', '$poengsaldo', '$passord')"; //hvilke verdier som skal legges inn
	$resultat = mysqli_query($tilkobling, $sql);
		

	//echo '<a href="#dlg-sign-up-sent" data-rel="popup" data-transition="pop" data-position-to="window" id="btn-submit" class="ui-btn ui-btn ui-btn-inline ui-btn-b ui-corner-all">Opprett</a>
	        
				
	//        </div>';
	
	}
	
	//steg 4, databasetilkoblingen lukkes
	mysqli_close($tilkobling);

}
?>
