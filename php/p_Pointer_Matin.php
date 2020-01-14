<?php

 session_start();
    require_once('connexion.php');

$id = $_POST['id'];

$radio = $_POST['rad'];

$date = date('Y-m-d');
$time = date('h:i:s');
$thattimemin = "08:00:00";
$thattimemax = "12:15:00";
$deadtime = "11:00:00";
$h = "12:00:00";

if($time < $thattimemin or $time > $thattimemax){
    echo '<script type="text/javascript"> alert("c\'est pas l\'heure de pointage")</script>';
    header("Refresh: 0; ../index2.php");
    
    }else{
    
if($radio == "" ){
    echo '<script type="text/javascript"> alert("Veuillez choisire la periode de pointage")</script>';
    header("Refresh: 0; ../pointageMatin.php");
}else{
    $sql=mysql_query("select * from fonctionnaire where id = '$id'");
    $nb = mysql_num_rows($sql); 
    if($nb == 0){
        echo '<script type="text/javascript"> alert("Fonctionnaire introuvable")</script>';
          header("Refresh: 0; ../pointageMatin.php");
        
    }else{
        
        $resultat = mysql_query("select * from fonctionnaire where id = '$id'");
        $fonc = mysql_fetch_array($resultat);
        $nom = $fonc['nom'];
        $prenom = $fonc['prenom'];

        
    $sql=mysql_query("select * from pointage where id_fonctionnaire = '$id'");
    $nb = mysql_num_rows($sql);
    if($nb == 0)
        mysql_query("insert into pointage (id_fonctionnaire, nom, prenom, date) value('$id', '$nom', '$prenom', '$date')");
    
    $poinatge=mysql_fetch_array($sql);
    if($radio == "entre" ){
      if($poinatge['entre_mat'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une entrée dans cette periode")</script>';
          header("Refresh: 0; ../pointageMatin.php");
      }else{
        if($poinatge['sortie_mat'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une une sortie pour cette periode")</script>';
          header("Refresh: 0; ../pointageMatin.php");
      }else{
         if($time > $deadtime){
             echo '<script type="text/javascript"> alert("c\'est trop tard pour une entrée")</script>';
          header("Refresh: 0; ../pointageMatin.php");
         }else{
             
             if($time > $thattimemin){
                 
                   $sql=mysql_query("select * from retard where id_fonctionnaire = '$id' and date ='$date'");
                $nb = mysql_num_rows($sql); 
                if($nb == 0){
                    mysql_query("INSERT INTO retard(id_fonctionnaire,nom,prenom,date)
                        VALUES('$id','$nom','$prenom','$date')");
                }
                 $diff_entre = $time - $thattimemin;
                 mysql_query("update retrd set retard_entre_mat = '$diff_entre' where id_fonctionnaire = '$id' and date = '$date'");
                 
             }
            mysql_query("update pointage set entre_mat = '$time' where id_fonctionnaire = '$id'");
          echo '<script type="text/javascript"> alert("Pointage reussie")</script>';
          header("Refresh: 0; ../pointageMatin.php");
        }}
      }
    }else{
        
        if($poinatge['sortie_mat'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une sortie dans cette periode")</script>';
          header("Refresh: 0; ../pointageMatin.php");
      }else{
        if($poinatge['entre_mat'] == ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire n\'a pas pointer pour une une entrée pour cette periode")</script>';
          header("Refresh: 0; ../pointageMatin.php");
      }else{
         
              if($time < $h){
                 
                   $sql=mysql_query("select * from retard where id_fonctionnaire = '$id' and date ='$date'");
                $nb = mysql_num_rows($sql); 
                if($nb == 0){
                    mysql_query("INSERT INTO retard(id_fonctionnaire,nom,prenom,date)
                        VALUES('$id','$nom','$prenom','$date')");
                }
                 $diff_sortie = $h - $time;
                 mysql_query("update retrd set retard_sortie_mat = '$diff_sortie' where id_fonctionnaire = '$id' and date = '$date'");
                 
             }
            mysql_query("update pointage set sortie_mat = '$time' where id_fonctionnaire = '$id'");
          echo '<script type="text/javascript"> alert("Pointage reussie")</script>';
          header("Refresh: 0; ../pointageMatin.php");
        }
      }

    }
}
}
}

?>