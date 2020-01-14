<?php
session_start();
    require_once('connexion.php');



  if (isset($_GET["ID"])){  
      
    $ID=$_GET["ID"];
    mysql_query("delete from fonctionnaire where id = '$ID'");
    echo '<script type="text/javascript"> alert("fonctionnaire Supprimée avec succée")</script>';
    header("Location:../fonctionnaire.php");
  }

?>