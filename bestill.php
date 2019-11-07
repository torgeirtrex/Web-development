<?php
if (isset($_POST['loginname'])){
	//lagrer data for skjema
	$bestiltfradato = $_POST['bestiltfradato']; 
	$bestilttildato = $_POST['bestilttildato'];
	$bestiltfratid = $_POST['bestiltfratid'];
	$bestilttiltid = $_POST['bestilttiltid'];
	
	$loginname = $_POST['loginname'];
	$bilid = $_POST['bilid'];
	$dato = date("Y-m-d h:i"); //gir dato og tid på følgende format: 2016-09-30 12:09
	$fradatotid = "$bestiltfradato $bestiltfratid";
	$tildatotid = "$bestilttildato $bestilttiltid";
		
	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
	mysqli_select_db($tilkobling, "torgekro");

	//Finn kundenr
	$sql = "SELECT kundenr FROM kunder WHERE epost = '$loginname'";
	$resultat = mysqli_query($tilkobling, $sql);
	$rad = mysqli_fetch_array($resultat);
	$kundenr = $rad['kundenr'];

	//legger inn ny kunde om den ikke finnes
	
	$sql = "INSERT INTO bilbestilling"; //tabell som data skal legges inn i
	$sql .= " (kundenr, bilid, ordredato, fra, til)"; //hvilke kolonner som data skal legges inn i
	$sql .= " VALUES ";
	$sql .= " ('$kundenr', '$bilid', '$dato', '$fradatotid', '$tildatotid')"; //hvilke verdier som skal legges inn

	$resultat = mysqli_query($tilkobling, $sql);
	
	//steg 4, databasetilkoblingen lukkes
	mysqli_close($tilkobling);

	echo"<p><strong>Bestillingen er gjennomført.</strong><br>Du finner igjen bestillingen din på Min side</p>";

}
?>
