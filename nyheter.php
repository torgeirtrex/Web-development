<?php
if (isset($_POST['nyheter'])){
	$nyheter = $_POST['nyheter']; //lager vedien av meldingen
	$dato = date("Y-m-d"); //gir dato og tid på følgende format: 2016-09-30
	
	//Kobler til database
	$tilkobling = mysqli_connect("mysql.stud.iie.ntnu.no", "edwardmu", "u4ExES8i");
	mysqli_select_db($tilkobling, "edwardmu");
	mysqli_query($tilkobling, "SET NAMES 'utf8'");
		
		//bygger opp spørring
		$sql = "SELECT * FROM bilklubbnyheter ";
		$sql .= "WHERE synligfra <= '$dato' AND synligtil >='$dato'";

		//Kjører spørring
		$resultat = mysqli_query($tilkobling, $sql);
		
		//Behandle resultatet med PHP og HTML
		echo '<div data-role="collapsibleset" data-content-theme="a" data-iconpos="right" data-theme="a" data-expanded-icon="carat-d" data-collapsed-icon="carat-r" data-inset="false">';
			while ( $rad = mysqli_fetch_array($resultat) ) {
			$tittel = $rad['tittel'];
			$ingress = $rad['ingress'];
			$tekst = $rad['tekst'];
			$bildelink = $rad['bildelink'];
			echo '<div data-role="collapsible">';
			echo "<h4><img src='$bildelink' width='80px' align='left' style='Padding:0 10px 0 0px'>$tittel<br><span class='test2'>$ingress</span></h4>";
			echo "<div id='picture' style='width: 80%;'>";
				echo "<img src='$bildelink' style='width: 100%;'>";
			echo "</div>";
			echo "$tekst";						
		echo "</div>";
	}
	echo "</div>";
		
	//steg 4, databasetilkoblingen lukkes
	mysqli_close($tilkobling);
}
?>
