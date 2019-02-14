
<section>
<form action="" method="POST">

<select name="numero" required>
    <?php 
    include 'config.php';
      $resu =mysqli_query($conn, "SELECT * FROM user");
    while($ri = mysqli_fetch_array($resu)) 
    { 
    ?>
      <option value="<?php echo $ri['tel'] ?>"> <?php echo $ri['tel']. '-- ' .$ri['nom'].' ' .$ri['prenom']  ?></option>
    <?php
    }
    ?>
    </select>
    <br><br>

<textarea  name='msg' rows='9' cols='55' maxlength='495'></textarea><br>
                <!-- envoyer a tout le monde-->
                
        <button type="submit" name = "envoyer">📩envoyer a tous📩</button> 
                <!-- envoyer a une personne-->

        <button type="submit" name = "indiv">📩</button>


    </form>
    </section>

<?php
 include 'config.php';
if (isset($_POST['envoyer']) && isset($_POST['msg'])!=='' ) {
   $msg=addslashes($_POST['msg']);
   $dateposte=date('D, d M Y H:i:s');
   $statut=0;
   mysqli_query($conn, "INSERT INTO message (sms,dateposte,statut) VALUES ('$msg','$dateposte',' $statut')");

   echo "<font color = 'green'>";
   echo'votre message a ete envoye avec succes';
   echo "</font>";
   echo "<br>";    
    }
else{
    echo'Pas de message';
}
?>

<?php
 include 'config.php';
if (isset($_POST['indiv']) && isset($_POST['msg'])!=='') {
    $msg=addslashes($_POST['msg']);
    $dateposte=date('D, d M Y H:i:s');
    $usertel=$_POST['numero'];
    $statut=1;
    mysqli_query($conn, "INSERT INTO message (sms,dateposte,statut,usertel) VALUES ('$msg','$dateposte','$statut','$usertel')");
    
    echo "<font color = 'green'>";
    echo'votre message a ete envoye avec succes';
    echo "</font>";
    echo "<br>"; 
}
 
  ?>
