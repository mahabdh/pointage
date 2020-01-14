<?php
 session_start();
    require_once('connexion.php');

$id = $_POST['id'];

$radio = $_POST['rad'];

$date = date('Y-m-d');
$time = date('h:i:s');
$thattimemin = "13:00:00";
$thattimemax = "16:30:00";
$deadtime = "15:15:00";
$h = "16:15:00";
if($time > $thattimemin or $time< $thattimemax){
    echo '<script type="text/javascript"> alert("c\'est pas l\'heure du pointage")</script>';
    header("Refresh: 0; ../index2.php");
    
    
    }else{
if($radio == "" ){
    echo '<script type="text/javascript"> alert("Veuillez choisire la periode de pointage")</script>';
    header("Refresh: 0; ../pointageSoir.php");
}else{
    $sql=mysql_query("select * from fonctionnaire where id = '$id'");
    $nb = mysql_num_rows($sql); 
    if($nb == 0){
        echo '<script type="text/javascript"> alert("Fonctionnaire introuvable")</script>';
          header("Refresh: 0; ../pointageSoir.php");
        
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
      if($poinatge['entre_soire'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une entrée dans cette periode")</script>';
          header("Refresh: 0; ../pointageSoir.php");
      }else{
        if($poinatge['sortie_soire'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une une sortie pour cette periode")</script>';
          header("Refresh: 0; ../pointageSoir.php");
      }else{
         
            if($time >= $deadtime){
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
                 mysql_query("update retrd set retard_entre_soire = '$diff_entre' where id_fonctionnaire = '$id' and date = '$date'");
                 
             }
            mysql_query("update pointage set entre_soire = '$time' where id_fonctionnaire = '$id'");
          echo '<script type="text/javascript"> alert("Pointage reussie")</script>';
          header("Refresh: 0; ../pointageSoir.php");
        }}
      }
    }else{
        
        if($poinatge['sortie_soire'] != ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire a deja pointer pour une sortie dans cette periode")</script>';
          header("Refresh: 0; ../pointageSoir.php");
      }else{
        if($poinatge['entre_soire'] == ""){
          echo '<script type="text/javascript"> alert("ce fonctionnaire n\'a pas pointer pour une une entrée pour cette periode")</script>';
          header("Refresh: 0; ../pointageSoir.php");
      }else{
         
            
              if($time < $h){
                 
                   $sql=mysql_query("select * from retard where id_fonctionnaire = '$id' and date ='$date'");
                $nb = mysql_num_rows($sql); 
                if($nb == 0){
                    mysql_query("INSERT INTO retard(id_fonctionnaire,nom,prenom,date)
                        VALUES('$id','$nom','$prenom','$date')");
                }
                 $diff_sortie = $h - $time;
                 mysql_query("update retrd set retard_sortie_soire = '$diff_sortie' where id_fonctionnaire = '$id' and date = '$date'");
                 
             }
            mysql_query("update pointage set sortie_soire = '$time' where id_fonctionnaire = '$id'");
          echo '<script type="text/javascript"> alert("Pointage reussie")</script>';
          header("Refresh: 0; ../pointageSoir.php");
        }
      }

    }
  
}
    }
}

?>