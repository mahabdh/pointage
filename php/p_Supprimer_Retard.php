<?php
session_start();
    require_once('connexion.php');



  if (isset($_GET["ID"])){  
      
    $ID=$_GET["ID"];
    mysql_query("delete from retard where id = '$ID'");
    echo '<script type="text/javascript"> alert("Retard Supprimée avec succée")</script>';
    header("Location:../retard.php");
  }

?>