<?php
// Session soll gestartet sein
session_start();

// Dann zerstören wir die
session_destroy();

// Weiterleitung zu index
header("Location: index.php");
 ?>