<?php
    include 'config.php';
?>
 
  <form  action="" method="post">
      <section >
   
   MONTANT:
   <select name="prix" required> 
        <option value='2000'>2 000 </option>
        <option value='5000'>5 000 </option>
        <option value='6000'>6 000 </option>
   </select> 
<button name="">
    
<button>

    
    <button type="ok" name = "valider">VALIDER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>
</section>
</form>

<?php
  if(isset($_POST['valider']) && isset($_POST['prix'])){
      $prix = addslashes($_POST ['prix']);
      $codeticket ='TK'.uniqid();
    
      $result=mysqli_query($conn,"SELECT * FROM user WHERE iduser='2' ");
      $userid='';
      while($tbtiket = mysqli_fetch_assoc($result)) { 
          $userid = $tbtiket['iduser'];   
      }
    //insertion dans la table infos
      mysqli_query($conn, "INSERT INTO ticket (codeticket,prix,iduser) VALUES ('$codeticket','$prix','$userid')");
      echo "<font color = 'green'>";
      echo "<B>veuillez conserver Votre code de ticket qui est : ".$codeticket." montant: ".$prix." F CFA, LE LABELLE TRANSPORT vous remercie</B>";
      echo "</font>";
      echo "<br>";      
       }     
      else{
          echo"Aucun enregistrement";
          echo "<br><br><br>";

      } 
     
  ?>
