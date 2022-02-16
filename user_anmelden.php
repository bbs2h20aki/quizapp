<?php

// Herausholen der Daten aus Android
$name = $_POST['username'];
$passwort = $_POST['passwort'];

// Datenbdankeinstellungen festlegen
$tns = "quizzapp_high"; 
$user = "quizzteam3"; 
$password = "QuizzApp2462";


$sql = "SELECT * FROM user WHERE username='$name' AND passwort='$passwort'";

// Verbindung mit der Datenbank
$db = new PDO("oci:dbname=".$tns, $user, $password);	
$result = $db->prepare($sql);
$result->execute();

// Konvertieren der Daten aus der Datenbank in ein Array
$zeilen = $result->fetchAll();

// Prüfen ob Array leer oder nicht.
if(count($zeilen)!=0){
	echo "true";
	echo $zeilen[0]['user_id'];
}
else{
	echo "false";
}
?>