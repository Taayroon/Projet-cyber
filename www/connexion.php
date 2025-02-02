<center style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
  <form action="cyber.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="logins"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="passwords"><br><br>
    <input type="submit" name="submit" value="Connexion">
  </form>
</center>

<?php
  $login = $_POST['logins'] ?? "";
  $password = $_POST['passwords'] ?? "";
  
  if(isset($_POST['submit'])){
    try{
      $pdo = new PDO('mysql:host=database:3306;dbname=connexion', 'root', 'tiger');
    }catch(PDOException $e){
      echo "Erreur". $e->getMessage();
    }
    
    $sql = "SELECT * FROM identifiant WHERE logins = ? ";
    $id_statement = $pdo->prepare($sql);
    $id_statement->execute([$login]);
    
    $user = $id_statement->fetch();
    
    if($user && password_verify($password, $user['passwd'])){
      echo '<center>Bonjour, vous avez un compte !.</center>';
    }else{
      echo '<center>Identifiant ou mot de passe incorrect.</center>';
    }
  }
?>