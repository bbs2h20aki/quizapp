<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
  </head>
  <body>
    <?php
	  
	  /*
	  function pwzurueck()
	  {
	  	if($_POST["pw"] == $_POST["pw2"]){
	    $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
	  	$stmt = $mysql->prepare("UPDATE accounts SET password = ? WHERE username = ?");
	    $stmt->bind_param( $hash, $_POST["username"]);
		$stmt->execute();
		}
	  
	  }
	  
	  */
	  
	  
    if(isset($_POST["submit"])){
      require("mysql.php");
      // Vorbereitung der ganzen Daten
      $stmt = $mysql->prepare("SELECT * FROM users WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute(); // Ausführung
		
		// Variable befüllen mit den zurück gekommenen Daten
      $count = $stmt->rowCount();
      if($count == 0){
        //Username ist frei
		  
		  // Check das Passwort
        if($_POST["pw"] == $_POST["pw2"]){
			// dann ist das Passwort richtig angelegt
			
          //User anlegen
          $stmt = $mysql->prepare("INSERT INTO users (USERNAME, PASSWORD, EMAIL) VALUES (:user, :pw, :email)");
		
			
          $stmt->bindParam(":user", $_POST["username"]);
          $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT); // Passwort hashen
          $stmt->bindParam(":pw", $hash);
		  $stmt->bindParam(":email", $_POST["email"]);
          $stmt->execute(); // Ausführen und User wird angelegt
          echo "Dein Account wurde angelegt";
			
        } else {
          echo "Die Passwörter stimmen nicht überein";
        }
      } else {
        echo "Der Username ist bereits vergeben";
      }
    }
     ?>
    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
		<input type="text" name="email" placeholder="Email" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>
      <button type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="index.php">Zum Login</a>
  </body>
</html>
© 2022 Bilal Goekpinar