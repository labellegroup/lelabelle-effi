<form  action="" method="post">
 
CODE DU BON: <input type="text" placeholder="Entrez CODE DU BON" name="codedebon" required>
    <button type="ok" name = "valider">VALIDER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>

</form>
<?php
include 'config.php';

if (isset($_POST['valider']) && isset($_POST['codedebon'])) {
    $codedebon = $_POST['codedebon'];

$result=mysqli_query($conn,"SELECT * FROM user WHERE iduser='2' ");
while($tbuser = mysqli_fetch_assoc($result)) { 
    $credit= $tbuser['solde'];
    $bon = 0;
    
 $getBons = mysqli_query($conn,"SELECT montant FROM bons WHERE code='$codedebon'");
 while($comp = mysqli_fetch_assoc($getBons)){
    $bon = $comp['montant'];
 }
  $credit=$credit+$bon;
  echo $credit;
  $UpdateQuery ="UPDATE user SET solde ='$credit'";
  $conn->query($UpdateQuery);

    }
  }

?>