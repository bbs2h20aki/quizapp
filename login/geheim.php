<?php
// Starten um auf die Session variable zu gehen
session_start();
// ist der User angemeldet kontrolle wenn nicht -> weiterleitung auf index.php
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Sie haben sich erfolgreich Angemeldet</h1>
    <a href="logout.php">Abmelden</a>
  </body>
</html>