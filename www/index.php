<center style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="logins"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="passwords"><br><br>
    <input type="submit" name="submit" value="Inscription">
  </form>
</center>

<?php
  $logins = $_POST['logins'] ?? "";
  $passwords = password_hash($_POST['passwords'] ?? "", PASSWORD_DEFAULT);

  if(isset($_POST['submit'])){
    try{
      $pdo = new PDO('mysql:host=database:3306;dbname=connexion', 'root', 'tiger');
    }catch(PDOException $e){
      echo "Erreur : ".$e->getMessage();
    }

    try{
      $sql = "INSERT INTO identifiant(logins, passwd) VALUES (?, ?)";
      $id_statement = $pdo->prepare($sql);
      $id_statement->execute([$logins, $passwords]);  
      
      echo '<meta http-equiv="refresh" content="0;url=connexion.php">';
    }catch(PDOException){
      echo "<center>Ce nom est déja utilisé</center>";
    }

  }

?>