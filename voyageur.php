<?php
    include 'config.php';
?>
<?php
  include 'config.php';
  $sql= mysqli_query($conn,"SELECT* FROM message WHERE statut=0 ");//
 $rows = mysqli_num_rows($sql);
 
 $sq= mysqli_query($conn,"SELECT* FROM message WHERE usertel=34343434 ");// creer une session numero qui va prendre le contact de l'utilisateur
 $rows = mysqli_num_rows($sq);

if ($sql) {

 echo'<table>';
 echo'<p> </p>';
 echo'<table border="1">';
 
 while($tbmsg = mysqli_fetch_assoc($sql)) {
  echo'<tr><td><B>MESSAGE</B></td><td><B>DATE RECEPTION</B></td></tr>';
    $idsms = $tbmsg['idmsg'];
    $sms = $tbmsg['sms'];
    $dateposte = $tbmsg['dateposte'];
    
   
    echo'<tr><td>'.$sms.'</td><td>'.$dateposte.' </td></tr>';

 }
}
?>

<?php
 include 'config.php';
 $sq= mysqli_query($conn,"SELECT* FROM message WHERE usertel=34343434 ");
 $rows = mysqli_num_rows($sq);

if ($sq) {
  echo'<table>';
  echo'<p> </p>';
  echo'<table border="1">';
  
  while($tbmsg = mysqli_fetch_assoc($sq)) {
   echo'<tr><td><B>MESSAGE</B></td><td><B>DATE RECEPTION</B></td></tr>';
     $idsms = $tbmsg['idmsg'];
     $sms = $tbmsg['sms'];
     $dateposte = $tbmsg['dateposte'];    
     echo'<tr><td>'.$sms.'</td><td>'.$dateposte.' </td></tr>';
 
  }
}

?>