<?php
include 'config.php';
$result=mysqli_query($conn,"SELECT * FROM tarif");

 echo'<p> </p>';
 echo'<table border="1">';
 echo'<tr><td><B>NOM ET PRENOMS</B></td><td><B>COMPAGNIE</B></td><td><B>VILLE DE DEPART</B></td><td><B>VILLE ARRIVEE</B></td><td><B>DATE ET HEURE DE DEPART</B></td></tr>';
 
 while($tbtarif = mysqli_fetch_assoc($result)) { 
 
 $datedepart= $tbtarif['dateposte'];
 $departid = $tbtarif['villedepart'];
 $arriveeid = $tbtarif['villearrive'];
 $prix =$tbtarif['prix'];

 
 
 //afficher la ville de depart
 $depart = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$departid'");

 while($ville = mysqli_fetch_assoc($getVille)){
    $depart = $ville['ville'];
 }

 //afficher la ville d'arrivee
 $arrivee = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$arriveeid'");
 while($ville = mysqli_fetch_assoc($getVille)){
    $arrivee = $ville['ville'];
 }
   echo'<tr><td>' .$prix. '</td><td>' .$depart.'</td><td>' . $arrivee.'</td><td>' . $datedepart. '</td></tr>';
  }
  echo'<Br>';
  ?>
  