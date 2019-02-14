<form  action="" method="post">
      <section >
    numero du client: <input type="text" name="tel" required>
    <button type="ok" name = "montant" value="30000">30 000 </button>
    <button type="ok" name = "montant" value="50000">50 000 </button>
    <button type="ok" name = "montant" value="100000">100 000 </button><br>
  

</section>
</form>

<?php

include 'config.php';
  if(isset($_POST['montant']) && isset($_POST['tel'])  ){
      $montant = addslashes($_POST ['montant']);
      $code ='LB'.uniqid();
      $usertel =addslashes($_POST['tel']);
      $dateposte=date('D, d M Y H:i:s');

     $msg = 'VOTRE CODE DE RECHARGEMENT EST : ' . $code.' ,IL VOUS A COUTE: '.$montant. ' F CFA';
      $statut=1;
      
     mysqli_query($conn, "INSERT INTO message (sms,dateposte,statut,usertel) VALUES ('$msg','$dateposte','$statut','$usertel')");
      echo "<font color = 'green'>";
      echo'votre message a ete envoye avec succes';
      echo "</font>";
      echo "<br>"; 
  }
  else {
    echo "echec d'envoie";
  }
      ?>
