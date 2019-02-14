
<?php
    include 'config.php';
    $query = mysqli_query($conn, "SELECT * FROM user");
    $rows = mysqli_num_rows($query);
    if($rows!=0){
      while($user = mysqli_fetch_assoc($query)) {
      $nom = $user['nom'];
      $prenom = $user['prenom'];
      $mdp = $user['mdp'];
      $sexe = $user['sexe'];
      $registerdate=$user['registerdate'];     
      }
    }
?>

<form  action="" method="post">
<section>
<input type = "hidden" name = "id" value = "<?php echo $id; ?>">
  NOM:<input type = "text" name = "nom" value = "<?php echo $nom; ?>"><br/>
  PRENOMS:<input type = "text" name = "prenom" value = "<?php echo $prenom; ?>"><br/>
 NOUVEAU MOT DE PASS:<input type="mdp"name="mdp" value = "<?php echo $mdp; ?>"><br/>
  <input type="radio" name="sexe" value="<?php echo $sexe; ?>" checked> masculin<br>
<input type="radio" name="sexe" value="<?php echo $sexe; ?>"checked>feminin<br>

    <button type="ok" name = "modifier">MODIFIER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>
    </section>
</form>
<?php
 include 'config.php';
  if(isset($_POST['modifier'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = $_POST['mdp'];
    $sexe = $_POST['sexe'];
    $registerdate=date('d-m-y');
    // Check if field doesn't contain only white spaces
    $mdpCheck = str_replace(' ', '', $mdp);
    if($mdpCheck!=""){
    $mdp = md5($mdp);
    $UpdateQuery ="UPDATE user SET nom ='$nom',prenom ='$prenom', mdp = '$mdp', sexe='$sexe'
    registerdate= $registerdate,modif='📝',effacer='❌' WHERE id='$id'";
    $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("index.php")'; // -->
    echo ' </script>';
    }else{
    $UpdateQuery = "UPDATE user SET nom ='$nom',prenom ='$prenom', mdp = '$mdp', sexe='$sexe'
    registerdate= $registerdate,modif='📝',effacer='❌' WHERE id='$id'";
    $conn->query($UpdateQuery);
    echo '<script language="Javascript">';
    echo 'document.location.replace("index.php")'; // -->
    echo ' </script>';
    }
}
?>