<?php
include 'config.php';
?>
<br><br>
VILLE DE DEPART:
  <select name="depart" required>
    <?php 
      $result =mysqli_query($conn, "SELECT id, ville FROM ville");
    while($ri = mysqli_fetch_array($result)) 
    { 
    ?>
      <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['ville'] ?></option>
    <?php
    }
    ?>
    </select>
    <br><br>
  VILLE D'ARRIVEE: <select name="arrive" required>
    <?php 
      $result =mysqli_query($conn, "SELECT id, ville FROM ville");
    while($ri = mysqli_fetch_array($result)) 
    { 
    ?>
      <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['ville'] ?></option>
<?php
}
 ?>
</select>
<br><br>

  DATE DE DEPART:<input type="date" placeholder="Enter date de depart" name="departdate" required><br/>

    <button type="ok" name = "valider">ENREGISTRER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>
</section>
</form>
<br><br>

<?php
  if(isset($_POST['valider'])){
      $depart = addslashes($_POST ['depart']);
      $arrivee = addslashes($_POST ['arrive']);
      $departdate=($_POST['departdate']);
      $ticket=tk.uniqid();

      $res=mysqli_query($conn,"SELECT * FROM user WHERE iduser='2' ");
      $idUser ='';
      while($tbuser = mysqli_fetch_assoc($res)) { 
    $idUser= $tbuser['iduser'];
   
    //insertion dans la table infos
      mysqli_query($conn, "INSERT INTO historique (depart,arrivee,departdate,ticket,iduser)
       VALUES ('$depart','$arrivee','$departdate','$ticket','$idUser')");
      echo "<font color = 'green'>";
      echo "noms: ".$depart." prenoms: ".$arrivee."  ".$departdate." ".$ticket." ".$idUser.", a bien ete enregistre";
      echo "</font>";
      echo "<br>";      
       }     
      "<br><br><br>";
      }
?>


<?php
include 'config.php';

 echo'<p> </p>';
 echo'<table border="1">';
 echo'<tr><td><B>NOM ET PRENOMS</B></td><td><B>COMPAGNIE</B></td><td><B>VILLE DE DEPART</B></td><td><B>VILLE ARRIVEE</B></td><td><B>DATE ET HEURE DE DEPART</B></td></tr>';
 $rest=mysqli_query($conn,"SELECT * FROM historiques");
 while($tbhistorique = mysqli_fetch_assoc($rest)) { 

 $datedepart= $tbhistorique['datedepart'];
 $departid = $tbhistorique['depart'];
 $arriveeid = $tbhistorique['arrive'];
 $ticket = $tbhistorique['ticket'];
 $userid = $tbhistorique['idsuer'];

 //afficher la ville de depart
 $depart = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$departid'");

 while($ville = mysqli_fetch_assoc($getVille)){
    $depart = $ville['ville'];
 }

 $nom = '';
 $getNom= mysqli_query($conn,"SELECT * FROM user WHERE id='$userid'");
 while($nm = mysqli_fetch_assoc($getNom)){
    $nom = $nm['nom'];
 }

 //afficher la ville d'arrivee
 $arrive = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$arriveeid'");
 while($ville = mysqli_fetch_assoc($getVille)){
    $arrive = $ville['ville'];
 }
   echo'<tr><td>' .$nom.' '.$ticket. '</td><td>' .$depart.'</td><td>' . $arrivee.'</td><td>' . $datedepart. '</td></tr>';
  }
  echo'<Br>';
  ?>