<?php

// Herausholen der Daten aus Android
$name = $_POST['username'];
$password = $_POST['password'];

// Datenbdankeinstellungen festlegen
$tns = "quizzapp_high"; 
$user = "quizzteam3"; 
$passworddb = "QuizzApp2462";


$sql = "SELECT * FROM users WHERE username='$name' AND password='$password'";

// Verbindung mit der Datenbank
$db = new PDO("oci:dbname=".$tns, $user, $passworddb);	
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