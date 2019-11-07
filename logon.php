<?php
if (isset($_POST['username'], $_POST['password']) ) {
    $username = $_POST['username'];
    $password = $_POST['password']; 

	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "torgekro", "mkKNq4s0");
	mysqli_select_db($tilkobling, "torgekro");

	//Søker etter kunde
	$sql = "SELECT * FROM kunder WHERE epost = '$username'";
	$resultat = mysqli_query($tilkobling, $sql);

	$rad = mysqli_fetch_array($resultat);
	$poengsaldo = $rad['poengsaldo']; 

	//sjekker om brukernavn og passord er korrekt
	if ($rad['epost'] == $username and $rad['passord'] == $password) {
	echo "<script>loginname='$username'; poengsaldo='$poengsaldo';loggedin=true;</script>";
	//echo 'Korrekt passord';
		} else {
	echo "<script>loginname='';loggedin=false;</script>";
	//echo "Brukernavn eller passord er feil. Prøv på nytt"; 
	}
	//Lukk databasetilkobling



		mysqli_close($tilkobling);
}     
?>
