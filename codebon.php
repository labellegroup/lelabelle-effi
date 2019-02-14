<?php
    include 'config.php';
?>
 
  <form  action="" method="post">
      <section >
    numero du client: <input type="text" name="tel" required>
    <button type="ok" name = "montant" value="30000">30 000 </button>
    <button type="ok" name = "montant" value="50000">50 000 </button>
    <button type="ok" name = "montant" value="100000">100 000 </button>
  
    <button class="btn" type="ok" name = "valider">valider </button>
</section>
</form>

<?php
  if(isset($_POST['montant']) ){
      $montant = addslashes($_POST ['montant']);
      $code ='LB'.uniqid();
      $tel =addslashes($_POST['tel']);
      $registerdate=date('d-m-y');
    //crediter compte du client
      $result=mysqli_query($conn,"SELECT * FROM user WHERE tel='$tel' ");
      while($tbuser = mysqli_fetch_assoc($result)) { 
          $credit= $tbuser['solde'];
          $usernom = $tbuser['nom'];
          $userprenom = $tbuser['prenom'];
      }
      mysqli_query($conn, "INSERT INTO bons (code,montant,editdate) VALUES ('$code','$montant','$registerdate')");
     
      $valeurbon = 0;
       $getBons = mysqli_query($conn,"SELECT montant FROM bons WHERE code='$code'");
       while($comp = mysqli_fetch_assoc($getBons)){
          $valeurbon = $comp['montant'];
       }
        $credit=$credit+$valeurbon;
        $UpdateQuery ="UPDATE user SET solde ='$credit' WHERE tel='$tel' ";
        $conn->query($UpdateQuery);

        //initialiser le prix du ticket
        $valeur=0;
        $UpdQuery ="UPDATE bons SET montant ='$valeur' WHERE code='$code' ";
        $conn->query($UpdQuery);
      
          } 

    //insertion dans la table infos
      //mysqli_query($conn, "INSERT INTO bons (code,montant,editdate) VALUES ('$code','$montant','$registerdate')");
      echo "<font color = 'green'>";
      echo   $usernom.' '.$userprenom;
      echo "<B>PHONE: ".$tel." montant: ".$montant." ".$registerdate.", a bien ete recharge</B>";
      echo "</font>";
      echo "<br>";      
     
  ?>
