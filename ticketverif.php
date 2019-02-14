
 <form  action="" method="post">
code du ticket: <input type="text" name="codetk" required ><br>
<button class="btn" type="ok" name = "verifier">verifier </button>
</form>

<?php
include 'config.php';
    if (isset($_POST['verifier']) && isset($_POST['codetk'])) {
        $codeticket =addslashes($_POST['codetk']);

        $verif=mysqli_query($conn,"SELECT * FROM ticket WHERE codeticket='$codeticket'");    
        
         while($tbticket = mysqli_fetch_assoc($verif)) { 
          $prix= $tbticket['prix'];
          $ticketid = $tbticket['idticket'];
          $userid = $tbticket['iduser'];
      }

      $result=mysqli_query($conn,"SELECT * FROM user WHERE iduser='$userid' ");
      while($tbuser = mysqli_fetch_assoc($result)) { 
          $credit= $tbuser['solde'];
          $usernom = $tbuser['nom'];
          $userprenom = $tbuser['prenom'];
          
      $valeurticket = 0;
      $getPrix = mysqli_query($conn,"SELECT prix FROM ticket WHERE codeticket='$codeticket'");
      while($prx = mysqli_fetch_assoc($getPrix)){
         $valeurticket = $prx['prix'];
      }
       $credit=$credit-$valeurticket;
       $UpdateQuery ="UPDATE user SET solde ='$credit' WHERE iduser='$userid' ";
       $conn->query($UpdateQuery);
        //initialiser le prix du ticket
        $valeur=0;
        $UpdQuery ="UPDATE ticket SET prix ='$valeur' WHERE codeticket='$codeticket' ";
        $conn->query($UpdQuery);
    }
      
      
      echo "<font color = 'green'>";
      echo   $usernom.' '.$userprenom;
      echo "<B> Vous avez ete facture de: ".$valeurticket." F CFA , LE LABELLE TRANSPORT vous remercie</B>";
      echo "</font>";
      echo "<br>";   


    }
?>